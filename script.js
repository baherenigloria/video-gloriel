// Exemple de code JavaScript pour gérer certaines interactions
document.addEventListener('DOMContentLoaded', function() {
    const uploadForm = document.querySelector('form');
    const feedbackDiv = document.getElementById('upload-feedback');

    uploadForm.addEventListener('submit', function(e) {
        feedbackDiv.textContent = 'La vidéo est en cours de téléchargement...';
    });
});
function setExemples(exemples) {
    // Mettre à jour le nom du modèle dans la section de téléversement
    document.getElementById("selected-exemples-name").textContent = exemples;

    // Rediriger l'utilisateur vers la section de téléversement
    window.location.hash = 'upload';
}
function setCategory(category) {
    // Mettre à jour le nom du modèle dans la section de téléversement
    document.getElementById("selected-category-name").textContent = category;

    // Rediriger l'utilisateur vers la section de téléversement
    window.location.hash = 'upload';
}
// Fonction pour transmettre la catégorie sélectionnée
function setCategory(categoryName) {
    console.log("Modèle sélectionné :", categoryName);
    // Mettez à jour le texte de l'élément HTML
    document.getElementById('selected-category-name').innerText = categoryName;
}
function setExemples(videoName) {
    console.log("Modèle vidéo sélectionné :", videoName);
    // Mettre à jour l'élément HTML pour la vidéo
    document.getElementById('selected-video-name').innerText = videoName;
}
document.getElementById("upload-section").style.display = "block";

