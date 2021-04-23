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
    require_once "../view/ViewUser.php";
    require_once "../view/ViewSocial.php";
    require_once "../view/ViewTemplate.php";
    require_once "../model/ModelUser.php";
    require_once "../model/ModelSocial.php";
    require_once "../utils/Utils.php";


    ViewTemplate::menu();




    function upload($extensions)
    {
        // ctrl de nom ==> regex (pas de caract speciaux)
        // ne pas ecraser un fichier existant
        // ctrl de taille
        if (isset($_FILES['fichier'])) {
            $errors = "";
            $file_name = $_FILES['fichier']['name'];
            $file_size = $_FILES['fichier']['size'];
            $file_tmp = $_FILES['fichier']['tmp_name'];
            $file_type = $_FILES['fichier']['type'];
            $fileExplode = explode('.', $_FILES['fichier']['name']);
            $file_ext = strtolower(end($fileExplode));
            $uploadOk = false;

            $pattern = "/^[\w\s\-\.]{4,}$/";
            if (!preg_match($pattern, $file_name)) {
                $errors .= "Nom de fichier non valide. <br/>";
            }

            if (!in_array($file_ext, $extensions)) {
                $errors .= "extension not allowed. <br/>";
            }

            if ($file_size > 3000000) {
                $errors .= "File size must be excately 3 MB. <br/>";
            }

            $file_name=substr( md5($file_name),10).".$file_ext";
            while (file_exists("../../photos/$file_name")) {
                $file_name = substr(md5($file_name), 10) . ".$file_ext";
            }

            if ($errors === "") {
                move_uploaded_file($file_tmp, "../../photos/" . $file_name);
                $uploadOk = true;
            }
            return ["uploadOk" => $uploadOk,"file_name" => $file_name, "errors" => $errors];
        }
        return ["uploadOk" => false, "file_name"=> "", "errors" => "Aucun fichier n'est uploadé"];
    }


    if (isset($_POST['upload'])) {
        echo "test";
        $extensions=["jpg","jpeg", "png"];
        $upload=upload($extensions);
        var_dump($upload);
    }
    ?>

    

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="fichier" />
        <input type="submit" name="upload"/>
    </form>


    <?php
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