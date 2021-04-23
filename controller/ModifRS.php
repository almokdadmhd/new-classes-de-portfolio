<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>Modif RS</title>
</head>

<body>

    <?php
    require_once "../view/ViewSocial.php";
    require_once "../view/ViewTemplate.php";
    require_once "../model/ModelSocial.php";


    ViewTemplate::menu();

    if(isset($_GET['id']))
    {
        if (ModelSocial::getSocById($_GET['id'])) {
            ViewSocial::modifRS($_GET['id']);
        } else {
            ViewTemplate::alert("Le réseau social n'existe pas.", "danger", "ListeRS.php");
        }
        
    }
    else{
        if(isset($_POST['modif'])){
            if(isset($_POST['id']) && ModelSocial::getSocById($_POST['id']))
            {
                ModelSocial::modifRS($_POST['id'], $_POST['type_soc_id'], $_POST['lien']);
                ViewTemplate::alert("Modif faite avec succès.", "success", "ListeRS.php");
            }
            else
            {
                ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeRS.php");
            }
        }
        else
        ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeRS.php");
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