
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.libro-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('show');
                }, index * 100);
            });
        });
        document.getElementById('libro-search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const libros = document.querySelectorAll('.libro-item');
            libros.forEach(libro => {
                const titulo = libro.dataset.titulo || '';
                const autor = libro.dataset.autor || '';
                const genero = libro.dataset.genero || '';
                if (titulo.includes(searchTerm) || 
                    autor.includes(searchTerm) || 
                    genero.includes(searchTerm)) {
                    libro.style.display = 'block';
                } else {
                    libro.style.display = 'none';
                }
            });
        });
        function filtrarPor(filtro) {
            const libros = document.querySelectorAll('.libro-item');
            libros.forEach(libro => {
                if (filtro === 'todos') {
                    libro.style.display = 'block';
                } else if (filtro === 'nuevo' || filtro === 'usado') {
                    if (libro.dataset.estado === filtro) {
                        libro.style.display = 'block';
                    } else {
                        libro.style.display = 'none';
                    }
                } else if (filtro === 'oficial') {
                    if (libro.dataset.origen !== 'usuario') {
                        libro.style.display = 'block';
                    } else {
                        libro.style.display = 'none';
                    }
                } else if (filtro === 'usuario') {
                    if (libro.dataset.origen === 'usuario') {
                        libro.style.display = 'block';
                    } else {
                        libro.style.display = 'none';
                    }
                }
            });
            document.querySelectorAll('.filter-chip').forEach(chip => {
                chip.style.background = 'linear-gradient(135deg, #e3f2fd, #bbdefb)';
                chip.style.color = 'var(--purple)';
            });
            event.target.style.background = 'var(--gradient-primary)';
            event.target.style.color = 'white';
        }
