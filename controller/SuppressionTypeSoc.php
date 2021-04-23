<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>Suppression type social</title>
</head>

<body>


    <?php
    require_once "../view/ViewUser.php";
    require_once "../view/ViewTemplate.php";
    require_once "../model/ModelTypeSoc.php";
    //    require_once "../utils/Utils.php";


    ViewTemplate::menu();

    if (isset($_GET['id'])) {
        if (ModelTypeSoc::getTypeSoc($_GET['id'])) {
            ModelTypeSoc::SuppressionTypeSoc($_GET['id']);
            ViewTemplate::alert("Le type social a été supprimé avec succès.", "success", "ListeTypeSoc.php");
        } else {
            ViewTemplate::alert("Le type social n'existe pas.", "danger", "ListeTypeSoc.php");
        }
    } else {
        ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeTypeSoc.php");
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