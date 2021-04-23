<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>Suppression user</title>
</head>

<body>


    <?php
    require_once "../view/ViewUser.php";
    require_once "../view/ViewTemplate.php";
    require_once "../model/ModelUser.php";
    //    require_once "../utils/Utils.php";


    ViewTemplate::menu();

    if (isset($_GET['id'])) {
        if (ModelUser::getUser($_GET['id'])) {
            ModelUser::SuppressionUser($_GET['id']);
            ViewTemplate::alert("L'utilsateur a été supprimé avec succès.", "success", "ListeUsers.php");
        } else {
            ViewTemplate::alert("L'utilisateur n'existe pas.", "danger", "ListeUsers.php");
        }
    } else {
        ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeUsers.php");
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