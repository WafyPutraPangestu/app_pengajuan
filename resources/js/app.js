import './bootstrap';

document.getElementById('imageInput').addEventListener('change', function() {
    const file = this.files[0];
    const previewContainer = document.getElementById('previewContainer');
    const imagePreview = document.getElementById('imagePreview');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            previewContainer.classList.remove('hidden');
            previewContainer.classList.add('inline-block');
        };
        reader.readAsDataURL(file);
    } else {
        imagePreview.src = '';
        previewContainer.classList.remove('inline-block');
        previewContainer.classList.add('hidden');
    }
});
