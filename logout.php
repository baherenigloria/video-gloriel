<?php
// Démarrer la session
session_start();

// Détruire la session pour se déconnecter
session_unset();
session_destroy();

// Rediriger vers la page de connexion
header('Location: login.php');
exit();
?>
