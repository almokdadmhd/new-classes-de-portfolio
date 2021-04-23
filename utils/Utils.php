<?php
require_once "../view/ViewTemplate.php";
class Utils
{
    public static function validation($str, $type)
    {
        $valide = false;
        //https://www.php.net/manual/fr/regexp.reference.unicode.php
        $tabRegex = [
            "non" => "//",
            "test" => '/[\w]123/',
            "nom" => "/^[\p{L}\s]{2,}$/u",
            "prenom" => "/^[\p{L}\s]{2,}$/u",
            "tel" => "/^[\+]?[0-9]{8,}$/",
            "photo" => "/^[\w\s\-\.]{1,}(.jpg|.jpeg|.png|.gif)$/",
            
        ];

        $str = strip_tags(trim((string)$str));

        //https://www.php.net/manual/fr/filter.filters.validate.php
        switch ($type) {
            case "email":
                if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
                    $valide = true;
                }
                break;
            case "url":
                if (filter_var($str, FILTER_VALIDATE_URL)) {
                    $valide = true;
                }
                break;
            case "non":
                $valide = true;
            default:
                if (preg_match($tabRegex[$type], $str)) {
                    $valide = true;
                }
        }

        $valide === true ? $message = "" : $message = "Le champ $type n'est pas au format demandé.<br/>";

        $errorsTab[] = $str;
        $errorsTab[] = $message;
        return $errorsTab;
    }

    public static function valider($donnees, $types)
    {
        $erreurs = "";
        $donneesValides = [];
        for ($i = 0; $i < count($donnees); $i++) {
            $tab = Utils::validation($donnees[$i], $types[$i]);
            if ($tab[1]) {
                $erreurs .= $tab[1];
            }
            $donneesValides[] = $tab[0];
        }
        if ($erreurs) {
            ViewTemplate::alert($erreurs, "danger", null);
            return false;
        }
        return
            $donneesValides;
    }
    public static function upload($extensions)
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

            $file_name = substr(md5($file_name), 10) . ".$file_ext";
            while (file_exists("../../photos/$file_name")) {
                $file_name = substr(md5($file_name), 10) . ".$file_ext";
            }

            if ($errors === "") {
                move_uploaded_file($file_tmp, "../../photos/" . $file_name);
                $uploadOk = true;
            }
            return ["uploadOk" => $uploadOk, "file_name" => $file_name, "errors" => $errors];
        }
        return ["uploadOk" => false, "file_name" => "", "errors" => "Aucun fichier n'est uploadé"];
    }
}
