<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>Creation d'un utilisateur</title>
</head>

<body>


    <?php
    require_once "../view/ViewUser.php";
    require_once "../view/ViewTemplate.php";
    require_once "../model/ModelUser.php";
    require_once "../utils/Utils.php";

    ViewTemplate::menu();

    if (isset($_POST['ajout'])) {
        $donnees = [$_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'], $_POST['adresse'], $_POST['photo'], $_POST['description']];
        $types = ["nom", "prenom", "email", "tel", "non", "photo", "non"];

        $data = Utils::valider($donnees, $types);

        if ($data) {
            //ModelUser::ajoutUser($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6]);
            ViewTemplate::alert("Les données sont insérées avec succès", "success", "listeusers.php");
        } else {
            ViewUser::ajoutUser();
        }
    ?>

    <?php
    } else {
        ViewUser::ajoutUser();
    }
    ViewTemplate::footer();
    ?>





    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/all.min.js"></script>
    <script src="../../js/ctrl.js"></script>
    <script>

    </script>
</body>

</html>