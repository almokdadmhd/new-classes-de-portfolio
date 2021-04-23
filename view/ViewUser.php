<?php
require_once "../model/ModelUser.php";

class ViewUser
{
    public static function ajoutUser()
    {
        isset($_POST['ajout']) ? $formSubmit = true : $formSubmit = false;
?>
        <div class="container">
            <form name="ajout_user" id="ajout_user" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="form-group">
                    <input type="text" name="nom" id="nom" value="<?php echo $formSubmit ?  $_POST['nom'] : '' ?>" class="form-control" aria-describedby="nom" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <input type="text" name="prenom" id="prenom" value="<?php echo $formSubmit ?  $_POST['prenom'] : '' ?>" class="form-control" aria-describedby="prenom" placeholder="Prénom" required>
                </div>
                <div class="form-group">
                    <input type="email" name="mail" id="mail" value="<?php echo $formSubmit ?  $_POST['mail'] : '' ?>" class="form-control" aria-describedby="mail" placeholder="Adresse mail" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="tel" id="tel" value="<?php echo $formSubmit ?  $_POST['tel'] : '' ?>" class="form-control" aria-describedby="tel" placeholder="Tel" required>
                </div>
                <div class="form-group">
                    <input type="text" name="adresse" id="adresse" value="<?php echo $formSubmit ?  $_POST['adresse'] : '' ?>" class="form-control" aria-describedby="adresse" placeholder="Adresse" required>
                </div>
                <div class="form-group">
                    <input type="text" name="photo" id="photo" value="<?php echo $formSubmit ?  $_POST['photo'] : '' ?>" class="form-control" aria-describedby="photo" placeholder="Photo" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" aria-describedby="description" required><?php echo  $formSubmit ?  nl2br($_POST['description']) : '' ?></textarea>
                </div>

                <button type="submit" name="ajout" class="btn btn-primary">Ajouter</button>
                <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
            </form>
        </div>
    <?php
    }
    public static function listeUsers()
    {
        $users = ModelUser::listeUsers();
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <th scope="row"> <?php echo $user['id'] ?></th>
                        <td><img src="../../photos/<?php echo $user['photo'] ?>" /> </td>
                        <td><?php echo $user['nom'] ?></td>
                        <td><?php echo $user['prenom'] ?></td>
                        <td><?php echo $user['mail'] ?></td>
                        <td><?php echo $user['tel'] ?></td>
                        <td><?php echo $user['adresse'] ?></td>
                        <td><?php echo $user['description'] ?></td>
                        <td>
                            <a class="btn btn-info" href="VoirProfil.php?id=<?php echo $user['id'] ?>" role="button">Voir profil</a>
                            <a class="btn btn-info" href="ModifProfil.php?id=<?php echo $user['id'] ?>" role="button">Modif profil</a>
                            <a class="btn btn-danger" href="SuppressionUser.php?id=<?php echo $user['id'] ?>" role="button">Suppression user </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    public static function voirUser($id)
    {
        $user = ModelUser::getUser($id);
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Description</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"> <?php echo $user['id'] ?></th>
                    <td><img src="../../photos/<?php echo $user['photo'] ?>" /> </td>
                    <td><?php echo $user['nom'] ?></td>
                    <td><?php echo $user['prenom'] ?></td>
                    <td><?php echo $user['mail'] ?></td>
                    <td><?php echo $user['tel'] ?></td>
                    <td><?php echo $user['adresse'] ?></td>
                    <td><?php echo $user['description'] ?></td>
                </tr>
            </tbody>
        </table>
    <?php
    }

    public static function modifUser($id)
    {
        $user = ModelUser::getUser($id)

    ?>
        <div class="container">
            <form name="modif_user" id="modif_user" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user['id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $user['nom'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $user['prenom'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="mail" name="mail" value="<?php echo $user['mail'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" id="tel" name="tel" value="<?php echo $user['tel'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $user['adresse'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="photo" name="photo" value="<?php echo $user['photo'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" required> <?php echo nl2br($user['description']) ?> </textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="modif">Confirmer la modification</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
            </form>
        </div>
        </div>
        </div>
    <?php
    }

    public static function ajoutUserTest()
    {
        isset($_POST['ajout']) ? $formSubmit = true : $formSubmit = false;
    ?>
        <div class="container">
            <form name="ajout_user" id="ajout_user" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="form-group">
                    <input type="text" name="nom" id="nom" value="<?php echo $formSubmit ?  $_POST['nom'] : '' ?>" class="form-control" aria-describedby="nom" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <input type="text" name="prenom" id="prenom" value="<?php echo $formSubmit ?  $_POST['prenom'] : '' ?>" class="form-control" aria-describedby="prenom" placeholder="Prénom" required>
                </div>
                <div class="form-group">
                    <input type="email" name="mail" id="mail" value="<?php echo $formSubmit ?  $_POST['mail'] : '' ?>" class="form-control" aria-describedby="mail" placeholder="Adresse mail" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="tel" id="tel" value="<?php echo $formSubmit ?  $_POST['tel'] : '' ?>" class="form-control" aria-describedby="tel" placeholder="Tel" required>
                </div>
                <div class="form-group">
                    <input type="text" name="adresse" id="adresse" value="<?php echo $formSubmit ?  $_POST['adresse'] : '' ?>" class="form-control" aria-describedby="adresse" placeholder="Adresse" required>
                </div>
                <div class="form-group">
                    <input type="file" name="fichier" id="fichier" value="<?php echo $formSubmit ?  $_POST['fichier'] : '' ?>" class="form-control" aria-describedby="photo" placeholder="Photo" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" aria-describedby="description" required><?php echo  $formSubmit ?  nl2br($_POST['description']) : '' ?></textarea>
                </div>

                <button type="submit" name="ajout" class="btn btn-primary">Ajouter</button>
                <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
            </form>
        </div>
<?php
    }
}
