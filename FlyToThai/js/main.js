// Основной JavaScript файл для Bootstrap версии

document.addEventListener('DOMContentLoaded', function() {
    console.log('Fly to Thai - Bootstrap версия загружена');
    
    // Данные для туров
    const tourData = {
        1: {
            title: "Тур на Пхукет",
            image: "images/tours/phuket.jpg",
            price: "от 45 000 ₽",
            duration: "10 дней / 9 ночей",
            description: "Райские пляжи, лазурное море и незабываемые экскурсии по острову. Идеальный тур для тех, кто хочет насладиться пляжным отдыхом и экскурсиями.",
            includes: [
                "Проживание в отеле 4* с завтраками",
                "Авиаперелет Москва-Пхукет-Москва",
                "Трансферы аэропорт-отель-аэропорт",
                "Медицинская страховка",
                "Экскурсия по острову",
                "Русскоговорящий гид"
            ],
            features: [
                "Бесплатный Wi-Fi в отеле",
                "Бассейн с видом на море",
                "Спа-центр со скидкой 20%",
                "Детский клуб"
            ]
        },
        2: {
            title: "Тур Бангкок + Паттайя",
            image: "images/tours/bankok.jpg",
            price: "от 55 000 ₽",
            duration: "14 дней / 13 ночей",
            description: "Экскурсии по Бангкоку и отдых на пляжах Паттайи. Комбинированный тур для тех, кто хочет увидеть столицу Таиланда и отдохнуть на море.",
            includes: [
                "Проживание в отелях 4-5*",
                "Авиаперелет Москва-Бангкок-Москва",
                "Все трансферы",
                "Завтраки в отелях",
                "Экскурсия по Бангкоку",
                "Медицинская страховка"
            ],
            features: [
                "Посещение Королевского дворца",
                "Экскурсия на плавучий рынок",
                "Шоу трансвеститов в Паттайе",
                "Бесплатные лежаки на пляже"
            ]
        },
        3: {
            title: "Тур в Краби",
            image: "images/tours/krabi.jpg",
            price: "от 38 000 ₽",
            duration: "7 дней / 6 ночей",
            description: "Скалы, пещеры и уединённые пляжи для ценителей природы. Идеально для активного отдыха и любителей фотографии.",
            includes: [
                "Проживание в отеле 3*",
                "Авиаперелет Москва-Краби-Москва",
                "Трансферы",
                "Завтраки",
                "Экскурсия по островам",
                "Медицинская страховка"
            ],
            features: [
                "Посещение острова Пода",
                "Экскурсия в Тигра-Кейв",
                "Снорклинг с маской и трубкой",
                "Фотосессия на фоне знаменитых скал"
            ]
        }
    };
    
    // 1. Заполнение модального окна тура
    const tourButtons = document.querySelectorAll('.tour-details-btn');
    const modalBody = document.getElementById('modalBody');
    
    tourButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tourId = this.getAttribute('data-tour');
            const tour = tourData[tourId];
            
            if (tour) {
                modalBody.innerHTML = `
                    <h4>${tour.title}</h4>
                    <div class="modal-tour-image">
                        <img src="${tour.image}" alt="${tour.title}" class="img-fluid rounded">
                        <div class="modal-tour-price">${tour.price}</div>
                    </div>
                    <p><strong>Длительность:</strong> ${tour.duration}</p>
                    <p class="mb-3">${tour.description}</p>
                    
                    <h6>Включено в тур:</h6>
                    <ul class="mb-3">
                        ${tour.includes.map(item => `<li>${item}</li>`).join('')}
                    </ul>
                    
                    <h6>Особенности:</h6>
                    <ul>
                        ${tour.features.map(item => `<li>${item}</li>`).join('')}
                    </ul>
                `;
            }
        });
    });
    
    // 2. Анимация элементов при скролле
    function animateOnScroll() {
        const elements = document.querySelectorAll('.slide-up');
        const windowHeight = window.innerHeight;
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            
            if (elementTop < windowHeight - 100) {
                element.classList.add('animate');
            }
        });
    }
    
    window.addEventListener('load', animateOnScroll);
    window.addEventListener('scroll', animateOnScroll);
    
    // Добавляем задержки для анимации
    const slideUpElements = document.querySelectorAll('.slide-up');
    slideUpElements.forEach((element, index) => {
        const delayClass = `delay-${(index % 4) + 1}`;
        element.classList.add(delayClass);
    });
    
    // 3. Анимация шапки при скролле
    function handleHeaderScroll() {
        const header = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
    
    window.addEventListener('scroll', handleHeaderScroll);
    handleHeaderScroll();
    
    // 4. Плавное появление при загрузке
    setTimeout(() => {
        document.querySelectorAll('.fade-in').forEach((el, index) => {
            setTimeout(() => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, index * 200);
        });
    }, 300);
    
    // 5. Фикс для высоты hero на мобильных
    function setHeroHeight() {
        const hero = document.querySelector('.hero');
        if (hero && window.innerWidth < 768) {
            hero.style.minHeight = window.innerHeight + 'px';
        }
    }
    
    setHeroHeight();
    window.addEventListener('resize', setHeroHeight);
    
    // 6. ОБРАБОТЧИК ДЛЯ ЗАКРЫТИЯ МОДАЛКИ ПРИ НАЖАТИИ "ЗАБРОНИРОВАТЬ ТУР"
    document.addEventListener('click', function(event) {
        // Проверяем, нажали ли на кнопку "Забронировать тур" в модалке
        const target = event.target;
        const isBookButton = target.classList.contains('btn-primary') && 
                            target.textContent.includes('Забронировать тур');
        const isLinkToForm = target.tagName === 'A' && 
                           target.getAttribute('href') === '#contact-form' &&
                           target.closest('.modal-footer');
        
        if ((isBookButton || isLinkToForm) && target.closest('.modal')) {
            event.preventDefault();
            
            // Закрываем модальное окно
            const modalElement = document.getElementById('tourModal');
            if (modalElement) {
                const modal = bootstrap.Modal.getInstance(modalElement);
                if (modal) {
                    modal.hide();
                }
            }
            
            // Чистим backdrop через небольшую задержку
            setTimeout(() => {
                document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
                document.body.classList.remove('modal-open');
                document.body.style.cssText = '';
            }, 150);
            
            // Скроллим к форме
            setTimeout(() => {
                const formSection = document.getElementById('contact-form');
                if (formSection) {
                    const header = document.querySelector('.navbar');
                    const headerHeight = header ? header.offsetHeight : 76;
                    
                    window.scrollTo({
                        top: formSection.offsetTop - headerHeight - 120,
                        behavior: 'smooth'
                    });
                }
            }, 200);
        }
    });
    
    // 7. Плавный скролл для остальных якорей
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href === '#' || href.startsWith('#modal')) return;
            
            e.preventDefault();
            
            const targetElement = document.querySelector(href);
            if (targetElement) {
                const header = document.querySelector('.navbar');
                const headerHeight = header ? header.offsetHeight : 76;
                
                let additionalOffset = 30;
                if (href === '#contact-form') {
                    additionalOffset = -10;
                }
                
                const targetPosition = targetElement.offsetTop - headerHeight - additionalOffset;
                
                window.scrollTo({
                    top: Math.max(0, targetPosition),
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // 8. Предзагрузка фонового изображения
    const hero = document.querySelector('.hero');
    if (hero) {
        const bgImage = new Image();
        bgImage.src = 'images/hero/background.jpg';
        
        bgImage.onload = function() {
            console.log('Фоновое изображение загружено');
        };
        
        bgImage.onerror = function() {
            console.log('Ошибка загрузки фонового изображения');
            hero.style.background = 'linear-gradient(135deg, #1A4F8C 0%, #2AA4B0 100%)';
        };
    }
});