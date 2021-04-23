<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>Modification de Type de référence</title>
</head>

<body>

    <?php
    require_once "../view/ViewTypeRef.php";
    require_once "../view/ViewTemplate.php";
    require_once "../model/ModelTypeRef.php";


    ViewTemplate::menu();

    if (isset($_GET['id'])) {
        if (ModelTypeRef::getTypeRef($_GET['id'])) {
            ViewTypeRef::modifTypeRef($_GET['id']);
        } else {
            ViewTemplate::alert("Le type de référence n'existe pas.", "danger", "ListeTypeRef.php");
        }
    } else {
        if (isset($_POST['modif'])) {
            if (isset($_POST['id']) && ModelTypeRef::getTypeRef($_POST['id'])) {
                ModelTypeRef::modifTypeRef($_POST['id'], $_POST['type_ref'], $_POST['support']);
                ViewTemplate::alert("La modification a été faite avec succès.", "success", "ListeTypeRef.php");
            } else {
                ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeTypeRef.php");
            }
        } else {
            ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeTypeRef.php");
        }
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