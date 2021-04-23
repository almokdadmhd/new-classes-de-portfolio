<?php
require_once "../model/ModelTypeSoc.php";

class ViewTypeSoc
{
    public static function ajoutTypeSoc()
    { ?>
        <div class="container">
            <form name="ajout_type_soc" id="ajout_type_soc" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="form-group">
                    <input type="text" name="type_soc" id="type_soc" class="form-control" aria-describedby="type" placeholder="Nom du réseau social" required>
                </div>
                <button type="submit" name="ajout" class="btn btn-primary">Ajouter</button>
                <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
            </form>
        </div>
    <?php
    }

    public static function listeTypeSoc()
    {
        $types = ModelTypeSoc::listeTypeSoc();
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Type du réseau</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($types as $type) {
                ?>
                    <tr>
                        <th scope="row"> <?php echo $type['id'] ?></th>
                        <td><?php echo $type['type_soc'] ?></td>
                        <td>
                            <a class="btn btn-info" href="ModifTypeSoc.php?id=<?php echo $type['id'] ?>" role="button">Modif TypeSoc</a>
                            <a class="btn btn-danger" href="SuppressionTypeSoc.php?id=<?php echo $type['id'] ?>" role="button">Suppression TypeSoc </a>
                        </td>
                    </tr>
                <?php
                }     ?>

            </tbody>
        </table>
    <?php
    }

    public static function modifTypeSoc($id)
    {
        $type = ModelTypeSoc::getTypeSoc($id);
    ?>
        <div class="container">
            <form name="modif_type_soc" id="modif_type_soc" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $type['id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control" id="type_soc" name="type_soc" value="<?php echo $type['type_soc'] ?>" required>
                </div>

                <button type="submit" class="btn btn-primary" name="modif">Confirmer la modification</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
            </form>
        </div>
        </div>
        </div>
<?php
    }
}
