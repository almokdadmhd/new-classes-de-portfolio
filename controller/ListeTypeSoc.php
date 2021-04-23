<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>Liste des types de reseaux</title>
</head>

<body>


    <?php
    require_once "../view/ViewTypeSoc.php";
    require_once "../view/ViewTemplate.php";
    require_once "../utils/Utils.php";

    ViewTemplate::menu();
    ViewTypeSoc::listeTypeSoc();
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