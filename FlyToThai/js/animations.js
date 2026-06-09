// Дополнительные анимации

document.addEventListener('DOMContentLoaded', function() {
    console.log('Animations loaded');
    
    
    // Observer для анимации при появлении в viewport
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                
                // Анимация для счетчиков (если понадобятся)
                if (entry.target.classList.contains('counter')) {
                    animateCounter(entry.target);
                }
            }
        });
    }, observerOptions);
    
    // Наблюдаем за элементами
    document.querySelectorAll('.slide-up, .fade-in, .advantage-card, .tour-card, .expert-card, .review-card').forEach(el => {
        observer.observe(el);
    });
    
    // Анимация наведения для карточек с улучшениями
    const cards = document.querySelectorAll('.advantage-card, .tour-card, .expert-card, .review-card');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            
            // Подсветка для карточек туров
            if (this.classList.contains('tour-card')) {
                const price = this.querySelector('.tour-price');
                if (price) {
                    price.style.transform = 'scale(1.1)';
                    price.style.transition = 'transform 0.3s ease';
                }
            }
        });
        
        card.addEventListener('mouseleave', function() {
            if (this.classList.contains('tour-card')) {
                const price = this.querySelector('.tour-price');
                if (price) {
                    price.style.transform = 'scale(1)';
                }
            }
        });
    });
    
    // Анимация логотипа при скролле
    const header = document.querySelector('.header');
    const logo = document.querySelector('.logo');
    
    window.addEventListener('scroll', function() {
        if (!header || !logo) return;
        
        const scrolled = window.scrollY;
        
        if (scrolled > 100) {
            header.style.padding = '10px 0';
            header.style.boxShadow = '0 4px 20px rgba(0,0,0,0.15)';
            logo.style.transform = 'scale(0.95)';
        } else {
            header.style.padding = '15px 0';
            header.style.boxShadow = '0 4px 6px rgba(0,0,0,0.1)';
            logo.style.transform = 'scale(1)';
        }
    });
    
    // Анимация для иконок преимуществ
    const advantageIcons = document.querySelectorAll('.advantage-icon');
    advantageIcons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'rotate(15deg) scale(1.1)';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'rotate(0) scale(1)';
        });
    });
    
    // Анимация для кнопок "Подробнее" в турах
    const detailButtons = document.querySelectorAll('.tour-details-btn');
    detailButtons.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.05)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Плавное появление секций при загрузке
    setTimeout(() => {
        const sections = document.querySelectorAll('section');
        sections.forEach((section, index) => {
            setTimeout(() => {
                section.style.opacity = '1';
                section.style.transform = 'translateY(0)';
            }, index * 200);
        });
    }, 500);
    
    // Инициализация начальных стилей
    document.querySelectorAll('section').forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(20px)';
        section.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
    });
    
    // Анимация для социальных иконок
    const socialIcons = document.querySelectorAll('.social-links a');
    socialIcons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) rotate(5deg)';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) rotate(0)';
        });
    });
    
    // Функция для счетчиков (если понадобится)
    function animateCounter(counterElement) {
        const target = parseInt(counterElement.getAttribute('data-count') || 0);
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            counterElement.textContent = Math.floor(current).toLocaleString();
        }, 16);
    }
    
    // Добавляем анимацию для навигации
    const navLinks = document.querySelectorAll('.nav-menu a');
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Анимация для поля ввода при фокусе
    const inputs = document.querySelectorAll('.form-group input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentNode.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentNode.classList.remove('focused');
            }
        });
    });
    
    // Добавляем стили для focused состояния
    const style = document.createElement('style');
    style.textContent = `
        .form-group.focused label {
            color: var(--primary-teal);
            transform: translateY(-5px);
            font-size: 0.9rem;
        }
        
        .form-group.focused input {
            border-color: var(--primary-teal);
            box-shadow: 0 0 0 3px rgba(42, 164, 176, 0.1);
        }
        
        .form-group {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .form-group label {
            transition: all 0.3s ease;
        }
    `;
    document.head.appendChild(style);
});