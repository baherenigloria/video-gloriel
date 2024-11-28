<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "video_gloriel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données.");
}

// Démarrer la session
session_start();

// Vérifiez si l'utilisateur n'est pas connecté
if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Votre demande est bien reçue. Veuillez attendre un email qui vous signalera quand votre vidéo sera prête à télécharger.');
        window.location.href = 'page-daccueil.php'; // Redirigez vers la page d'accueil ou une autre page
    </script>";
    exit();
}

// L'utilisateur est connecté, gérer l'upload
if (isset($_FILES['video']) && !empty($_POST['instructions'])) {
    $videoUsername = $_SESSION['username']; // Utiliser le nom d'utilisateur de la session
    $email = $_SESSION['email']; // Utiliser l'email stocké dans la session
    $instructions = htmlspecialchars($_POST['instructions']);
    
    // Vérifier l'extension du fichier
    $allowed_extensions = ['mp4', 'avi', 'mov', 'wmv'];
    $file_extension = strtolower(pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION));

    if (!in_array($file_extension, $allowed_extensions)) {
        die("Type de fichier non pris en charge. Veuillez téléverser une vidéo en format MP4, AVI, MOV, ou WMV.");
    }

    // Vérifier la taille du fichier (limite de 50 Mo)
    $max_file_size = 50 * 1024 * 1024; // 50 Mo
    if ($_FILES['video']['size'] > $max_file_size) {
        die("Le fichier est trop volumineux. La taille maximale est de 50 Mo.");
    }

    // Générer un nom unique pour le fichier vidéo
    $video = uniqid() . '-' . basename($_FILES['video']['name']);
    
    // Spécifier le répertoire où les vidéos seront stockées
    $target_dir = "uploads/";
    $target_file = $target_dir . $video;

    // Vérifier si le répertoire existe, sinon le créer
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Déplacer le fichier téléchargé vers le répertoire cible
    if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
        // Utilisation d'une requête préparée pour insérer les données dans la base
        $stmt = $conn->prepare("INSERT INTO videos (username, email, instructions, video) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $videoUsername, $email, $instructions, $video);

        // Exécution de la requête préparée
        if ($stmt->execute()) {
            echo "Votre vidéo a été téléversée avec succès.";
            echo '<script>setTimeout(function(){ window.location.href = "index.php"; }, 2000);</script>'; // Redirection après 2 secondes
        } else {
            echo "Une erreur est survenue lors de l'enregistrement.";
        }

        // Fermer la requête préparée
        $stmt->close();
    } else {
        echo "Erreur lors du téléchargement du fichier.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de vidéo</title>
</head>
<body>

<h2>Upload de vidéo</h2>
<form method="POST" enctype="multipart/form-data">
    <label for="video">Sélectionnez une vidéo :</label>
    <input type="file" name="video" required><br>

    <label for="instructions">Instructions :</label>
    <textarea name="instructions" required></textarea><br>

    <button type="submit">Téléverser</button>
</form>

<p><a href="logout.php">Déconnexion</a></p>

</body>
</html>

<?php
// Fermer la connexion à la base de données
$conn->close();
?>




