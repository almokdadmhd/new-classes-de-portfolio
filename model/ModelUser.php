<?php
require_once "connexion.php";
class ModelUser
{
    public static function ajoutUser($nom, $prenom, $mail, $tel, $adresse, $photo, $description)
    {
        $idcon = connexion();

        $requete = $idcon->prepare("
                    INSERT INTO user VALUES (null,:nom, :prenom, :mail, :tel, :adresse, :photo, :description)
                    
                ");
        $requete->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':mail' => $mail,
            ':tel' => $tel,
            ':adresse' => $adresse,
            ':photo' => $photo,
            ':description' => $description
        ]);
    }
    public static function listeUsers()
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        SELECT * FROM user
        ");
        $requete->execute();
        return $requete->fetchAll();
    }
    public static function getUser($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        SELECT * FROM user where id=:id
        ");
        $requete->execute([':id' => $id,]);
        return $requete->fetch();
    }
    public static function modifUser($id, $nom, $prenom, $mail, $tel, $adresse, $photo, $description)
    {
        $idcon = connexion();
        $requetModif = $idcon->prepare("UPDATE user SET nom = :nom, prenom = :prenom, mail = :mail, tel = :tel,
         adresse = :adresse, photo = :photo, description = :descriptions WHERE id = :id");
        $requetModif->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':mail' => $mail,
            ':tel' => $tel,
            ':adresse' => $adresse,
            ':photo' => $photo,
            ':descriptions' => $description

        ]);
    }
    public static function SuppressionUser($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("DELETE FROM user WHERE id  = :id");
        $requete->execute([":id" => $id]);
    }
}
