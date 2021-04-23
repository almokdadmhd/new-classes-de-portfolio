<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>Suppression type référence</title>
</head>

<body>


    <?php
    require_once "../view/ViewUser.php";
    require_once "../view/ViewTemplate.php";
    require_once "../model/ModelTypeRef.php";


    ViewTemplate::menu();

    if (isset($_GET['id'])) {
        if (ModelTypeRef::getTypeRef($_GET['id'])) {
            ModelTypeRef::SuppressionTypeRef($_GET['id']);
            ViewTemplate::alert("Le type de référence a été supprimé avec succès.", "success", "ListeTypeRef.php");
        } else {
            ViewTemplate::alert("Le type de référence n'existe pas.", "danger", "ListeTypeRef.php");
        }
    } else {
        ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeTypeRef.php");
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