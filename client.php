<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Client - Paiement et Téléchargement</title>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            color: #333;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
            padding: 40px; /* Augmenté pour donner plus d'espace interne */
            display: flex;
            flex-direction: column;
            gap: 25px; /* Espacement uniforme entre sections */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px; /* Augmenté pour créer plus d'espace sous le titre */
        }

        h3 {
            text-align: center;
            margin-bottom: 15px;
        }

        .payment-section, .download-section {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Espacement supplémentaire entre les éléments */
        }

        .payment-form label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .payment-form input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
            margin-bottom: 15px; /* Ajouté pour espacer les champs */
        }

        button {
            background-color: #6a11cb;
            color: #fff;
            padding: 14px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-top: 20px; /* Ajout d'espace entre les boutons et les autres contenus */
        }

        button:hover {
            background-color: #2575fc;
        }

        .download-button {
            display: inline-block;
            text-align: center;
            background-color: #2575fc;
            color: #fff;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px; /* Alignement visuel cohérent avec les boutons */
        }

        .download-button:hover {
            background-color: #6a11cb;
        }

        video {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 20px; /* Ajouté pour séparer la vidéo du bouton */
        }

        .loading {
            font-size: 18px;
            color: #666;
            text-align: center;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Effectuer un Paiement</h1>
        
        <!-- Section Paiement -->
        <div class="payment-section">
         
            <form action="" method="POST" class="payment-form">
                <label for="phone">Numéro Airtel Money :</label>
                <input type="text" id="phone" name="phone" value="0999999999" readonly>
                
                <label for="amount">Montant :</label>
                <input type="number" id="amount" name="amount" required placeholder="Entrez le montant">

                <div class="center">
                    <button type="submit" name="payment" value="success">Payer Maintenant</button>
                </div>
            </form>
        </div>

        <!-- Message de chargement -->
        <?php if (isset($_POST['payment']) && $_POST['payment'] === 'success'): ?>
            <p class="loading">Paiement validé. Préparation de votre vidéo... veillez clic sur le bouton "Telecharger"</p>
            <script>
                setTimeout(() => {
                    window.location.reload();
                }, 3000);
            </script>
        <?php endif; ?>

        <!-- Section de téléchargement -->
        <?php if (isset($_POST['payment']) && $_POST['payment'] === 'success' && file_exists("videos/traites/video_traitee_invité.mp4")): ?>
            <div class="download-section">
              
                <div class="center">
                    <a href="videos/traites/video_traitee_invité.mp4" download="video_traitee_invité.mp4" class="download-button">
                        Télécharger la Vidéo
                    </a>
                </div>
                <video controls>
                    <source src="videos/traites/video_traitee_invité.mp4" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture des vidéos.
                </video>
            </div>
        <?php elseif (isset($_POST['payment']) && $_POST['payment'] === 'success'): ?>
            <p class="loading">Votre vidéo n'est pas encore prête. Merci de patienter.</p>
        <?php endif; ?>
    </div>
</body>
</html>
