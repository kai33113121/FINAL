document.querySelector("form").addEventListener("submit", function(e) {
    e.preventDefault(); 
    const form = e.target;
    const datos = new FormData(form);
    const respuesta = document.getElementById("respuestaContacto");
    fetch("/procesar_contacto.php", {
    method: "POST", 
    body: datos
})
    .then(res => res.text())
    .then(mensaje => {
        respuesta.innerHTML = `
            <div style="background: #e6ffed; border: 1px solid #b2f5ea; padding: 15px; border-radius: 10px; color: #2f855a; font-weight: 500;">
                ${mensaje}
            </div>
        `;
        form.reset(); 
    })
    .catch(error => {
        respuesta.innerHTML = `
            <div style="background: #ffe6e6; border: 1px solid #feb2b2; padding: 15px; border-radius: 10px; color: #c53030; font-weight: 500;">
                ❌ Error al enviar el mensaje. Intenta nuevamente.
            </div>
        `;
        console.error("Error:", error);
    });
});
  let currentSlideIndexEpic = 0;
        const slidesEpic = document.querySelectorAll('.book-slide-epic');
        const indicatorsEpic = document.querySelectorAll('.indicator-epic');
        const totalSlidesEpic = slidesEpic.length;
        function updateSlidesEpic() {
            slidesEpic.forEach((slide, index) => {
                slide.className = 'book-slide-epic';
                if (index === currentSlideIndexEpic) {
                    slide.classList.add('active');
                } else if (index === (currentSlideIndexEpic - 1 + totalSlidesEpic) % totalSlidesEpic) {
                    slide.classList.add('prev');
                } else if (index === (currentSlideIndexEpic + 1) % totalSlidesEpic) {
                    slide.classList.add('next');
                } else {
                    slide.classList.add('hidden');
                }
            });
            indicatorsEpic.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentSlideIndexEpic);
            });
        }
        function nextSlideEpic() {
            currentSlideIndexEpic = (currentSlideIndexEpic + 1) % totalSlidesEpic;
            updateSlidesEpic();
        }
        function previousSlideEpic() {
            currentSlideIndexEpic = (currentSlideIndexEpic - 1 + totalSlidesEpic) % totalSlidesEpic;
            updateSlidesEpic();
        }
        function currentSlideEpic(index) {
            currentSlideIndexEpic = index;
            updateSlidesEpic();
        }
        setInterval(nextSlideEpic, 5000);
        slidesEpic.forEach((slide, index) => {
            slide.addEventListener('click', () => {
                if (index !== currentSlideIndexEpic) {
                    currentSlideIndexEpic = index;
                    updateSlidesEpic();
                }
            });
        });
        updateSlidesEpic();
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, observerOptions);
        document.querySelectorAll('.scroll-reveal').forEach(el => {
            observer.observe(el);
        });
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const background = document.querySelector('.hero-background');
            if (background) {
                const rate = scrolled * -0.2;
                background.style.transform = `translateY(${rate}px)`;
            }
        });
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
