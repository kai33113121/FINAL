
    function selectEstado(estado, element) {
        document.querySelectorAll('.estado-option').forEach(opt => {
            opt.classList.remove('active');
        });
        element.classList.add('active');
        document.getElementById('estadoInput').value = estado;
    }
    document.getElementById('fileInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const customDiv = document.querySelector('.file-input-custom');
        if (file) {
            customDiv.style.background = 'linear-gradient(135deg, #c8e6c9, #a5d6a7)';
            customDiv.querySelector('.file-input-text').textContent = `Archivo seleccionado: ${file.name}`;
            customDiv.querySelector('.file-input-icon i').className = 'bi bi-check-circle';
        }
    });
    document.getElementById('bookForm').addEventListener('submit', function(e) {
        const titulo = document.querySelector('input[name="titulo"]').value;
        const precio = document.querySelector('input[name="precio"]').value;
        const genero = document.querySelector('select[name="genero"]').value;
        const imagen = document.querySelector('input[name="imagen"]').files[0];
        if (!titulo || !precio || !genero || !imagen) {
            e.preventDefault();
            alert('Por favor completa todos los campos obligatorios');
            return;
        }
        if (precio <= 0) {
            e.preventDefault();
            alert('El precio debe ser mayor a 0');
            return;
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        const sections = document.querySelectorAll('.form-section');
        sections.forEach((section, index) => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            setTimeout(() => {
                section.style.transition = 'all 0.6s ease';
                section.style.opacity = '1';
                section.style.transform = 'translateY(0)';
            }, index * 200);
        });
    });
