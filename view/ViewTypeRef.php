<?php
require_once "../model/ModelTypeRef.php";

class ViewTypeRef
{
    public static function ajoutTypeRef()
    { ?>
        <div class="container">
            <form name="ajout_type_ref" id="ajout_type_ref" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="form-group">
                    <input type="text" name="type_ref" id="type_ref" class="form-control" aria-describedby="type_ref" placeholder="Type de la référence" required>
                </div>
                <div class="form-group">
                    <input type="text" name="support" id="support" class="form-control" aria-describedby="support" placeholder="Support" required>
                </div>
                <button type="submit" name="ajout" class="btn btn-primary">Ajouter</button>
                <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
            </form>
        </div>
    <?php
    }

    public static function listeTypeRef()
    {
        $types = ModelTypeRef::listeTypeRef();
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Type de référence</th>
                    <th scope="col">Support</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($types as $type) {
                ?>
                    <tr>
                        <th scope="row"> <?php echo $type['id'] ?></th>
                        <td><?php echo $type['type_ref'] ?></td>
                        <td><?php echo $type['support'] ?></td>
                        <td>
                            <a class="btn btn-info" href="ModifTypeRef.php?id=<?php echo $type['id'] ?>" role="button">Modif Type ref</a>
                            <a class="btn btn-danger" href="SuppressionTypeRef.php?id=<?php echo $type['id'] ?>" role="button">Suppression Type Ref </a>
                        </td>
                    </tr>
                <?php
                }     ?>
            </tbody>
        </table>
    <?php
    }
    public static function modifTypeRef($id)
    {
        $type = ModelTypeRef::getTypeRef($id);
    ?>
        <div class="container">
            <form name="modif_type_soc" id="modif_type_soc" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $type['id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control" id="type_soc" name="type_ref" value="<?php echo $type['type_ref'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="support" name="support" value="<?php echo $type['support'] ?>" required>
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
