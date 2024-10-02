<?php
// PARTIE DONNES -----------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référençant la classe DialogueBD
    $undlg = new DialogueBD();
    $mesFournisseurs = $undlg->getFournisseur();
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
    <title>Tableau des fournisseurs</title>
</head>
<body>
<?php
if (isset($msgErreur)) {
    echo "Erreur : $msgErreur";
}
?>
<h1>Tableau des fournisseurs</h1>

<div class="container" >
    <table class="table table-bordered table-striped table-responsive">
        <tbody>
        <?php
        $nbemployes = 0;
        foreach ($mesFournisseurs as $tabmat) {?>
            <tr>
                <?php $id =$tabmat['id']; ?>
                <td><?php echo $tabmat['id']; ?></td>
                <td><?php echo $tabmat['nom_fournisseur']; ?></td>
                <td><?php echo $tabmat['adresse']; ?></td>
                <td><?php echo $tabmat['email']; ?></td>
                <td><?php echo $tabmat['telephone']; ?></td>
                <td><?php echo " <a href='/presentation/detailFournisseur.php?id=$id'> Voir détail "?></td>

            </tr>
            <?php $nbemployes++; } ?>
        </tbody>
    </table>
</div>
<?php echo "Total : $nbemployes fournisseurs"; ?>
</body>
</html>

