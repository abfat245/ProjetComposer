<?php
// PARTIE DONNES -----------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référençant la classe DialogueBD
    $undlg = new DialogueBD();
    $id=$_GET['id'];
    $monFournisseur = $undlg->getFournisseurparid($id);
    $mesProduits =$undlg->getProduitparid($id);

} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<! PARTIE AFFICHAGE ------------------------------------------------ >
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"
          media="screen">
    <link rel="stylesheet" href="../design.css"/>
    <title>Détails des fournisseurs </title>
</head>
<body>
<?php
if (isset($msgErreur)) {
    echo "Erreur : $msgErreur";
}
?>
<h1> Détails sur les produits</h1>

<div class="container" >
    <table class="table table-bordered table-striped table-responsive">
        <tbody>
<p>
    <?php echo "Le ".$monFournisseur['nom_fournisseur']." vend des";?>
</p>

<?php foreach ($mesProduits as $tabmat) {?>
<tr>

    <td><?php echo $tabmat['description']; ?></td>
    <td><?php echo $tabmat['prix']; ?></td>
</tr>
<?php } ?>

</body>
</html>