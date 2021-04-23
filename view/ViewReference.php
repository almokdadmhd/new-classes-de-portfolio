<?php
require_once "../model/ModelReference.php";
require_once "../model/ModelTypeRef.php";

class ViewReference
{
    public static function ajoutReference()
    {
        $typesRef = ModelTypeRef::listeTypeRef();
?>
        <div class="container">
            <form name="ajout_reference" id="ajout_reference" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <select name="type_soc_id" class="form-control" required>
                    <option value="" selected>Sélectionnez un type de référence</option>
                    <?php
                    foreach ($typesRef as $typeRef) {
                    ?>
                        <option value="<?php echo $typeRef['id'] ?>">
                            <?php echo $typeRef['type_ref']."-". $typeRef['support'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
                
                <div class=" form-group">
                    <input type="text" name="xxxx" id="xx" class="form-control" aria-describedby="xxx" placeholder="xxxx" >
                </div>
                <button type="submit" class="btn btn-primary" name="ajout">Ajouter</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
            </form>
        </div>
<?php
    }
}
