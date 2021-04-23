<?php
require_once "../model/ModelSocial.php";
require_once "../model/ModelTypeSoc.php";

class ViewSocial
{
    public static function ajoutRS()
    {
        $typesRS = ModelTypeSoc::listeTypeSoc();
?>
        <div class="container">
            <form name="ajout_social" id="ajout_social" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <select name="type_soc_id" class="form-control" required>
                    <option value="" selected>Sélectionnez un type de réseau</option>
                    <?php
                    foreach ($typesRS as $typeRS) {
                    ?>
                        <option value="<?php echo $typeRS['id'] ?>"><?php echo $typeRS['type_soc'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <div class=" form-group">
                    <input type="url" name="lien" id="lien" class="form-control" aria-describedby="lien" placeholder="Lien" required>
                </div>
                <button type="submit" class="btn btn-primary" name="ajout">Ajouter</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
            </form>
        </div>
    <?php
    }

    public static function listeRS()
    {
        $listeRS = ModelSocial::listeRS();
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Type du réseau</th>
                    <th scope="col">Lien</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listeRS as $rs) {
                ?>
                    <tr>
                        <td><?php echo $rs['user_id'] ?></td>
                        <td><?php echo $rs['nom'] ?></td>
                        <td><?php echo $rs['prenom'] ?></td>
                        <td><?php echo $rs['type_soc'] ?></td>
                        <td><?php echo $rs['lien'] ?></td>
                        <td>
                            <a class="btn btn-info" href="ModifRS.php?id=<?php echo $rs['social_id'] ?>" role="button">Modifier</a>
                            <a class="btn btn-danger" href="SuppressionRS.php?id=<?php echo $rs['social_id'] ?>" role="button">Supprimer</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    public static function modifRS($id)
    {
        $typesRS = ModelTypeSoc::listeTypeSoc();
        $selectedRS = ModelSocial::getSocById($id);
    ?>
        <div class="container">
            <form name="modif_social" id="modif_social" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type="hidden" name="id" name="id" value="<?php echo $id; ?>" />
                <select name="type_soc_id" class="form-control" required>
                    <?php
                    foreach ($typesRS as $typeRS) {
                    ?>
                        <option value="<?php echo $typeRS['id'] ?>" <?php echo $typeRS['id'] == $selectedRS['type_soc_id'] ? "selected" : "" ?>>
                            <?php echo $typeRS['type_soc'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
                <div class=" form-group">
                    <input type="url" name="lien" id="lien" value="<?php echo $selectedRS['lien'] ?>" class="form-control" aria-describedby="lien" placeholder="Lien" required>
                </div>
                <button type="submit" class="btn btn-primary" name="modif">Modifier</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
            </form>
        </div>
    <?php
    }
    
   
}
