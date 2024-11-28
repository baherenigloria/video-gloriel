<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Gloriel - Transformez vos vidéos</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">
                <h1>Video Gloriel</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#home">Accueil</a></li>
                    <li><a href="#upload">Televerser</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="login.php">Tableau de bord</a></li>
                    <li><a href="client.php">Echange</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <h2>Transformez vos videos en moments inoubliables</h2>
            <p>Découvrez notre service de traitement video.</p>
        </div>
    </section>

<!-- Section des Exemples de Vidéos -->
<section id="examples" class="examples">
        <style>
        /* Conteneur principal */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        /* Conteneur pour le défilement horizontal */
        .video-marquee {
            position: relative;
            height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .video-line {
            display: flex;
            flex-wrap: nowrap;
            animation: marquee-vertical 10s linear infinite;
        }

        .video-item {
            flex: 0 0 20%; /* Ajuster pour garder 5 vidéos visibles dans une ligne */
            padding: 5px;
        }

        .video-item video {
            width: 100%;
            border-radius: 8px;
        }

        @keyframes marquee-vertical {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-100%);
            }
        }
        </style>
    <div class="container">
        <h2>Popular Services</h2>
        <div class="video-marquee">
            <div class="video-line">
                <!-- Ligne 1 -->
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/lv_0_20240702212832.mp4" type="video/mp4">
                    </video>
                    <p>Video Anniversaire<br/><strong>5$</strong></p>
                </div>
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/lv_0_20240701081510.mp4" type="video/mp4">
                    </video>
                    <p>Video Mariage<br/><strong>50$</strong></p>
                </div>
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/424e5e94acf01a6f85e570276da916ca.mp4" type="video/mp4">
                    </video>
                    <p>Video Anime<br/><strong>10$</strong></p>
                </div>
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/lv_0_20240705163656.mp4" type="video/mp4">
                    </video>
                    <p>Video Conference<br/><strong>30$</strong></p>
                </div>
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/lv_0_20240703163927.mp4" type="video/mp4">
                    </video>
                    <p>Video Personnel<br/><strong>5$</strong></p>
                </div>
            </div>
            <div class="video-line">
                <!-- Ligne 2 -->
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/424e5e94acf01a6f85e570276da916ca.mp4" type="video/mp4">
                    </video>
                    <p>Video Anime<br/><strong>10$</strong></p>
                </div>
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/lv_0_20240705163656.mp4" type="video/mp4">
                    </video>
                    <p>Video Conference<br/><strong>30$</strong></p>
                </div>
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/lv_0_20240703163927.mp4" type="video/mp4">
                    </video>
                    <p>Video Personnel<br/><strong>5$</strong></p>
                </div>
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/lv_0_20240702212832.mp4" type="video/mp4">
                    </video>
                    <p>Video Anniversaire<br/><strong>5$</strong></p>
                </div>
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/lv_0_20240701081510.mp4" type="video/mp4">
                    </video>
                    <p>Video Mariage<br/><strong>50$</strong></p>
                </div>
            </div>
            <div class="video-line">
                <!-- Ligne 3 -->
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/lv_0_20240703163927.mp4" type="video/mp4">
                    </video>
                    <p>Video Personnel<br/><strong>5$</strong></p>
                </div>
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/lv_0_20240702212832.mp4" type="video/mp4">
                    </video>
                    <p>Video Anniversaire<br/><strong>5$</strong></p>
                </div>
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/lv_0_20240701081510.mp4" type="video/mp4">
                    </video>
                    <p>Video Mariage<br/><strong>50$</strong></p>
                </div>
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/424e5e94acf01a6f85e570276da916ca.mp4" type="video/mp4">
                    </video>
                    <p>Video Anime<br/><strong>10$</strong></p>
                </div>
                <div class="video-item">
                    <video muted autoplay loop>
                        <source src="videos/lv_0_20240705163656.mp4" type="video/mp4">
                    </video>
                    <p>Video Conference<br/><strong>30$</strong></p>
                </div>
            </div>
        </div>
    </div> 
</section>
<section>
    <div class="paragraph">
        <h3>Immortalisez Vos Moments Précieux Avec Style</h3>
        <p>
            Chez <strong>Video_Gloriel</strong>, nous croyons que chaque instant mérite d’être immortalisé avec style et émotion. 
            🎥 Que ce soit un anniversaire joyeux,un mariage <br/> féérique, une conférence inspirante ou même des moments 
            personnels précieux, nos services de création vidéo transforment vos souvenirs en véritables œuvres d'art visuelles. 
            🌟 Laissez-nous capturer l'essence de vos événements avec une qualité exceptionnelle et une touche artistique unique. <br><br>
            💬 <strong>Pourquoi nous choisir ?</strong> Parce que nous nous engageons à offrir des vidéos qui parlent au cœur, 
            alliant créativité, innovation et professionnalisme. Que vous soyez un particulier ou une entreprise, nous avons des 
            solutions sur mesure adaptées à vos besoins. <br><br>
            📞 Contactez-nous dès aujourd'hui pour un service qui dépassera vos attentes. Faites de vos moments des souvenirs 
            éternels grâce à nos vidéos uniques !
        </p>
        <style>
            .paragraph {
                padding: 100px;
                margin: 100px;
                text-align: left;
                background-color: #f9f9f9; /* Couleur d'arrière-plan douce */
                border: 1px solid #ddd; /* Bordure subtile */
                border-radius: 10px; /* Coins arrondis */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre douce */
                font-family: Arial, sans-serif; /* Police moderne */
                line-height: 1.6; /* Meilleure lisibilité */
            }

            .paragraph h3 {
                font-size: 24px; /* Taille du titre */
                color: #333; /* Couleur sombre pour contraste */
                margin-bottom: 15px;
                text-align: center;
            }

            .paragraph p {
                font-size: 16px; /* Taille du texte */
                color: #555; /* Couleur neutre pour le texte */
            }
        </style>
    </div>
</section>

<!-- Section des Catégories de Images -->
<section id="categories" class="categories">
    <div class="container">
        <h2>Categories d'Images</h2>
        <div class="category-list">
        <style>
               .categories {
                    padding: 10px;
                    text-align: center;
                }

                /* Liste des catégories */
                .category-list {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    gap: 20px;
                }

                /* Style pour chaque carte */
                .card {
                    width: 150px; /* Taille fixe pour les cartes */
                    height: 350px; /* Taille fixe pour assurer l'uniformité */
                    border-radius: 10px;
                    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                    background-color: white;
                }

                .card:hover {
                    transform: scale(1.05);
                    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
                }

                /* Image dans la carte */
                .card-image {
                    width: 100%;
                    height: 50%; /* Hauteur de 50% de la carte */
                    object-fit: cover; /* Maintient les proportions de l'image */
                }

                /* Contenu de la carte */
                .card-content {
                    padding: 10px;
                    text-align: center;
                }

                /* Boutons */
                .card-content button {
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    padding: 5px 20px;
                    font-size: 14px;
                    font-weight: bold;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background-color 0.3s ease, transform 0.2s ease;
                    margin-top: 10px;
                }

                .card-content button:hover {
                    background-color: #45a049;
                    transform: scale(1.05);
                }

                .card-content button:active {
                    background-color: #388e3c;
                    transform: scale(0.98);
                }
            </style>
             <div class="category-item">
                <div class="card">
                    <img src="images/IMG_0622.jpeg" alt="Anniversaire" class="card-image">
                    <div class="card-content">
                        <p>Anniversaire<br /><strong>1$</strong></p>
                        <a href="#upload" onclick="setCategory('Anniversaire')">
                            <button>Utilisez ce modèle</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="category-item">
                <div class="card">
                    <img src="images/IMG_1219~3.jpg" alt="Personnel" class="card-image">
                    <div class="card-content">
                        <p>Personnel<br /><strong>0,5$</strong></p>
                        <a href="#upload" onclick="setCategory('Personnel')">
                            <button>Utilisez ce modèle</button>
                        </a>
                    </div>
                </div>
            </div>
           
            <div class="category-item">
                <div class="card">
                    <img src="images/Gold Luxury Initial Logo.png" alt="Logos" class="card-image">
                    <div class="card-content">
                        <p>Logos<br /><strong>10$</strong></p>
                        <a href="#upload" onclick="setCategory('Logos')">
                            <button>Utilisez ce modèle</button>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="category-item">
                <div class="card">
                    <img src="images/IMG-20241014-WA0059.jpg" alt="Post" class="card-image">
                    <div class="card-content">
                        <p>Post<br /><strong>5$</strong></p>
                        <a href="#upload" onclick="setCategory('Post')">
                            <button>Utilisez ce modèle</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Fonction pour transmettre la catégorie sélectionnée
    function setCategory(categoryName) {
        console.log("Modèle sélectionné :", categoryName);
        // Vous pouvez ajouter du code ici pour gérer la catégorie dans le formulaire de téléversement
    }
</script>

  <!-- Section de Téléversement -->
<section id="upload" class="upload">
    <div class="container">
        <h2>Televerser votre Video & Image </h2><br/>
        <h4>Vous avez selectionne le modele : 
        video(<span id="selected-video-name">Aucun</span>) &
        image(<span id="selected-category-name">Aucun</span>)
        </h4>

        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="email" name="email" placeholder="Email" required>
            <textarea name="instructions" placeholder="Instructions Specifiques" required></textarea>
            <input type="file" name="video" accept="video/*" required>
            <button type="submit">Televerser</button>
        </form>
        <div id="upload-feedback"></div>
    </div>    
</section>

<!-- Affichage d'un message de chargement -->
    <section>
        <div class="loading">Traitement en cours...</div> <br/>
    </section>

    <script>
        // Simulation de traitement de la vidéo (3 secondes pour la démo)
        setTimeout(() => {
            // Masquer le message de chargement et afficher le bouton de téléchargement
            document.querySelector('.loading').style.display = 'none';
            document.getElementById('downloadButton').style.display = 'inline-block';
        }, 3000); // Temps de simulation, ajustez selon le traitement réel

        // Fonction pour le téléchargement de la vidéo traitée
        function downloadVideo() {
            // Remplacez l'URL avec l'URL réelle du fichier vidéo traité
            const videoURL = 'videos/traitée_video.mp4';
            window.location.href = videoURL;
        }
    </script>   
    
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const gallery = document.querySelector(".video-gallery");
    const items = Array.from(gallery.children);

    // Dupliquer les vidéos pour un défilement infini
    items.forEach(item => {
        const clone = item.cloneNode(true);
        gallery.appendChild(clone);
    });

    // Ajuster la hauteur de la galerie pour éviter les interruptions
    gallery.style.height = `${gallery.scrollHeight}px`;
});
</script>


    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <p>Contactez-nous : baherenigloria@gmail.com</p>
            <p>&copy; 2024 Video Gloriel. Tous droits reserves.</p>
        </div>
    </footer>

</body>
</html>

