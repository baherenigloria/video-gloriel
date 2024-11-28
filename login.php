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

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['admin_logged_in'])) {
    // L'administrateur est connecté, afficher le tableau de bord
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['video']) && !empty($_POST['instructions'])) {
        // Ajouter une vidéo
        $instructions = htmlspecialchars($_POST['instructions']);
        $video = $_FILES['video']['name'];

        // Déplacer le fichier vidéo téléchargé dans le dossier 'uploads'
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($video);
        if (move_uploaded_file($_FILES['video']['tmp_name'], $target_file)) {
            // Insérer les informations dans la base de données
            $stmt = $conn->prepare("INSERT INTO videos (instructions, video) VALUES (?, ?)");
            $stmt->bind_param("ss", $instructions, $video);
            if ($stmt->execute()) {
                echo "Vidéo ajoutée avec succès!";
            } else {
                echo "Erreur lors de l'ajout de la vidéo.";
            }
        } else {
            echo "Erreur lors du téléchargement de la vidéo.";
        }
    }

    // Récupérer toutes les vidéos
    $query = "SELECT video, instructions, email, username FROM videos";
    $result = $conn->query($query);
    
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tableau de Bord Administrateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            padding: 20px;
            width: 100%;
            max-width: 1000px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="file"],
        textarea {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            width: 100%;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #218838;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        
        table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f1f1f1;
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .actions a {
            margin: 0 10px;
            color: #007bff;
            text-decoration: none;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: 40px;
        }

        footer a {
            color: #28a745;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Tableau de Bord Administrateur</h1>
    </header>

    <div class="form-container">
        <h2>Ajouter une Vidéo</h2>
        <br/>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="video">Sélectionnez une vidéo :</label>
            <input type="file" name="video" required><br>

            <label for="instructions">Instructions :</label>
            <textarea name="instructions" required></textarea><br>

            <button type="submit">Téléverser</button>
        </form>
    </div>

    <div class="form-container">
        <h3>Liste des Vidéos</h3>
        <table>
            <thead>
                <tr>
                    <th>Vidéo</th>
                    <th>Instructions</th>
                    <th>Actions</th>
                    <th> Email</th>
                    <th> Nom </th>
                </tr>
            </thead>
            <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><a href="uploads/<?php echo $row['video']; ?>" target="_blank"><?php echo $row['video']; ?></a></td>
            <td><?php echo $row['instructions']; ?></td>
            <td class="actions">
                <a href="edit-video.php?id=<?php echo isset($row['id']) ? $row['id'] : ''; ?>">Modifier</a> <br/>
                <a href="delete-video.php?id=<?php echo isset($row['id']) ? $row['id'] : ''; ?>">Supprimer</a>
            </td>

            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['username']; ?></td>
        </tr>
    <?php endwhile; ?>
</tbody>

        </table>
    </div>

    <footer>
        <p><a href="logout.php">Déconnexion</a></p>
    </footer>
</body>
</html>

<?php
} else {
    // Si l'administrateur n'est pas connecté, afficher le formulaire de connexion
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $admin_username = $_POST['username'];
        $admin_password = $_POST['password'];

        // Vérification des informations de connexion dans la base de données
        $sql = "SELECT * FROM admins WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $admin_username, $admin_password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Connexion réussie, démarrer la session
            $_SESSION['admin_logged_in'] = true;
            $admin = $result->fetch_assoc();
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];

            // Rediriger vers le tableau de bord
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            // Si les informations sont incorrectes
            echo "<p class='error-message'>Nom d'utilisateur ou mot de passe incorrect.</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            width: 100%;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Connexion Administrateur</h2>

        <form action="" method="POST">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="username" required><br>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" required><br>

            <button type="submit">Se connecter</button>
        </form>
    </div>

</body>
</html>

<?php
}
$conn->close();
?>







