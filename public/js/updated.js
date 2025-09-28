
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('.success-container');
            setTimeout(() => {
                container.style.animationPlayState = 'running';
            }, 100);
            createConfetti();
        });
        function createConfetti() {
            const colors = ['#4caf50', '#81c784', '#6a11cb', '#9c88ff', '#f093fb'];

            for (let i = 0; i < 50; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';
                    confetti.style.animationDelay = Math.random() * 2 + 's';
                    document.body.appendChild(confetti);
                    setTimeout(() => {
                        confetti.remove();
                    }, 5000);
                }, i * 100);
            }
        }
        document.querySelector('.btn-login').addEventListener('mouseenter', function () {
            this.style.transform = 'translateY(-3px) scale(1.05)';
        });
        document.querySelector('.btn-login').addEventListener('mouseleave', function () {
            this.style.transform = 'translateY(0) scale(1)';
        });
        document.querySelector('.btn-login').addEventListener('mousedown', function () {
            this.style.transform = 'translateY(-1px) scale(1.02)';
        });
        document.querySelector('.btn-login').addEventListener('mouseup', function () {
            this.style.transform = 'translateY(-3px) scale(1.05)';
        });
        let countdown = 10;
        const redirectTimer = setInterval(() => {
            countdown--;
            if (countdown <= 0) {
                clearInterval(redirectTimer);
                window.location.href = 'index.php?c=UsuarioController&a=login';
            }
        }, 1000);
        document.addEventListener('click', () => {
            clearInterval(redirectTimer);
        });
        document.addEventListener('keydown', () => {
            clearInterval(redirectTimer);
        });