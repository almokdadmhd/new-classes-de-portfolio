<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>Liste RS</title>
</head>

<body>

    <?php
    require_once "../view/ViewSocial.php";
    require_once "../view/ViewTemplate.php";
    require_once "../model/ModelSocial.php";


    ViewTemplate::menu();
    ViewSocial::listeRS();
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