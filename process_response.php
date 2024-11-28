<?php
// process_response.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer la réponse envoyée par l'utilisateur
    $response = htmlspecialchars($_POST['response']);

    // Vous pouvez ici enregistrer la réponse dans une base de données ou effectuer une autre action
    // Exemple de simple confirmation
    echo "<h2>Votre réponse a bien été envoyée :</h2>";
    echo "<p><strong>Réponse:</strong> $response</p>";
    // Vous pouvez également rediriger ou afficher un message de succès
    // header("Location: confirmation.php");
}
?>

