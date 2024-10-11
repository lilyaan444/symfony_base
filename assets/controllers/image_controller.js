// Sélectionner le sélecteur d'images
const imageSelect = document.querySelector('[data-image-preview-target="select"]');
const imagePreview = document.getElementById('image-preview');
// Ajouter un écouteur d'événements pour le changement de sélection
imageSelect.addEventListener('change', (event) => {
    // Récupérer l'option sélectionnée
    const selectedOption = event.target.options[event.target.selectedIndex];
    // Récupérer l'URL de l'image à partir de l'attribut data-image-url
    const imageUrl = selectedOption.getAttribute('data-image-url');
    // Afficher l'aperçu de l'image
    imagePreview.src = imageUrl;
    imagePreview.style.display = 'block'; // Afficher l'image si elle était masquée
});