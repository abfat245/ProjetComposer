<?php
require_once 'connexion.php';

class DialogueBD
{
    public function verifFournisseur($id, $nom_fournisseur)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT Count() as Fournisseur FROM fournisseurs where id=? and nom_fournisseur=? ";
            $sth = $conn->prepare($sql);
            $sth->execute(array($id, $nom_fournisseur));
            $ligne = $sth->fetch(PDO::FETCH_ASSOC);
            $nb = $ligne['Fournisseur'];
            return ($nb == 1);
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getFournisseur()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "Select * from fournisseurs";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $mesFournisseurs = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $mesFournisseurs;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getFournisseurparid($id)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "Select * from fournisseurs where id=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($id));
            $mesFournisseurs = $sth->fetch(PDO::FETCH_ASSOC);
            return $mesFournisseurs;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getProduitparid($id)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "Select * from produits where id=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($id));
            $mesFournisseurs = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $mesFournisseurs;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}
?>