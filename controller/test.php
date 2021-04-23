<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>TEST</title>
</head>

<body>

    <?php
    require_once "../model/ModelUser.php";
    require_once "../model/ModelSocial.php";
    require_once "../model/ModelTypeRef.php";

    require_once "../view/ViewUser.php";
    require_once "../view/ViewSocial.php";
    require_once "../view/ViewTypeRef.php";

    require_once "../view/ViewTemplate.php";
    
    require_once "../utils/Utils.php";


    ViewTemplate::menu();


    if(isset($_GET['id']))
    {
        if(ModelTypeRef::getTypeRef($_GET['id'])){
            ViewTypeRef::modifTypeRef($_GET['id']);
        }
        else {
            ViewTemplate::alert("type n existe pas", "danger", "ListeTypeRef.php");
        }
    }
    else{
        if(isset($_POST['modif'])){
            //test si input existe ET valide
            if( isset($_POST['id']) &&  ModelTypeRef::getTypeRef($_POST['id'])){
               ModelTypeRef::ModifTypeRef($_POST['id'],$_POST['type_ref'], $_POST['support']);
                ViewTemplate::alert("maj avec succes", "success", "ListeTypeRef.php");
            }
            else{
                ViewTemplate::alert("comportement frauduleux", "danger", "ListeTypeRef.php");
            }
        }
        else{
            ViewTemplate::alert("Aucune donnée n'a été transmise", "danger", "ListeTypeRef.php");
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