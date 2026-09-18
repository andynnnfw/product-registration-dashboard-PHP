const inputFile = document.getElementById('foto-upload');
const previewContainer = document.getElementById('preview-container');

    inputFile.addEventListener('change', function() {
        previewContainer.innerHTML = '';
        for (const file of this.files) {
            if (file) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.classList.add('preview-image');
                previewContainer.appendChild(img);
            }
        }
    });