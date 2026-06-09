// Основной JavaScript файл для Bootstrap версии

document.addEventListener('DOMContentLoaded', function() {
    console.log('Fly to Thai - Bootstrap версия загружена');
    
    // Переменная для хранения туров из БД
    let tourData = {};
    let currentTourId = null;
    
    // Загрузка туров из PostgreSQL
    async function loadToursFromDB() {
        try {
            const response = await fetch('get_tours.php');
            const tours = await response.json();
            tourData = tours;
            console.log('Туры загружены из БД:', tourData);
            renderTours();
        } catch (error) {
            console.error('Ошибка загрузки туров:', error);
        }
    }
    
    // Отображение туров на странице с кнопкой "Купить"
    function renderTours() {
        const toursContainer = document.getElementById('toursContainer');
        if (!toursContainer) return;
        
        toursContainer.innerHTML = '';
        let index = 0;
        for (const [id, tour] of Object.entries(tourData)) {
            const delayClass = `delay-${(index % 3) + 1}`;
            const tourCard = `
                <div class="col-md-6 col-lg-4">
                    <div class="tour-card rounded overflow-hidden shadow h-100 slide-up ${delayClass}">
                        <div class="tour-image position-relative">
                            <img src="${tour.image}" class="img-fluid w-100" alt="${tour.title}" style="height: 200px; object-fit: cover;">
                            <div class="tour-price position-absolute top-0 end-0 m-3">
                                ${tour.price}
                            </div>
                        </div>
                        <div class="tour-content p-4">
                            <h3 class="tour-title mb-2">${tour.title}</h3>
                            <p class="tour-duration text-primary-teal mb-3">${tour.duration}</p>
                            <p class="tour-description mb-4">${tour.description.substring(0, 100)}...</p>
                            <div class="tour-features mb-4">
                                <div class="d-flex flex-wrap gap-3">
                                    <span class="d-flex align-items-center">
                                        <i class="fas fa-hotel me-2 text-primary-teal"></i>
                                        Отель
                                    </span>
                                    <span class="d-flex align-items-center">
                                        <i class="fas fa-plane me-2 text-primary-teal"></i>
                                        Перелёт
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline w-100 tour-details-btn" data-tour="${id}" data-bs-toggle="modal" data-bs-target="#tourModal">Подробнее</button>
                                <button class="btn btn-success w-100 tour-buy-btn" data-tour="${id}">Купить</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            toursContainer.innerHTML += tourCard;
            index++;
        }
        
        // Перепривязываем обработчики после рендера
        attachTourButtonHandlers();
        attachBuyButtonHandlers();
    }
    
    // Обработчики для кнопок "Подробнее"
    function attachTourButtonHandlers() {
        const tourButtons = document.querySelectorAll('.tour-details-btn');
        const modalBody = document.getElementById('modalBody');
        
        tourButtons.forEach(button => {
            button.removeEventListener('click', handleTourClick);
            button.addEventListener('click', handleTourClick);
        });
        
        function handleTourClick() {
            const tourId = this.getAttribute('data-tour');
            currentTourId = tourId;
            const tour = tourData[tourId];
            
            if (tour && modalBody) {
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
                        <li>Проживание в отеле</li>
                        <li>Авиаперелет Москва-Таиланд-Москва</li>
                        <li>Трансферы аэропорт-отель-аэропорт</li>
                        <li>Медицинская страховка</li>
                        <li>Русскоговорящий гид</li>
                    </ul>
                    
                    <h6>Особенности:</h6>
                    <ul>
                        <li>Бесплатный Wi-Fi</li>
                        <li>Экскурсионная программа</li>
                    </ul>
                    
                    <hr>
                    <div id="tourReviewsBlock">
                        <h6>Отзывы о туре</h6>
                        <div id="tourReviewsList"></div>
                        <div id="addReviewBlock"></div>
                    </div>
                `;
                loadTourReviews(tourId);
                checkAuthForReview(tourId);
            }
        }
    }
    
    // Обработчики для кнопок "Купить"
    function attachBuyButtonHandlers() {
        const buyButtons = document.querySelectorAll('.tour-buy-btn');
        
        buyButtons.forEach(button => {
            button.removeEventListener('click', handleBuyClick);
            button.addEventListener('click', handleBuyClick);
        });
        
        function handleBuyClick() {
            const tourId = this.getAttribute('data-tour');
            // Проверяем, авторизован ли пользователь
            fetch('check_auth.php')
                .then(response => response.json())
                .then(data => {
                    if (data.logged_in) {
                        // Если авторизован - переходим к оплате
                        window.location.href = `order.php?tour_id=${tourId}`;
                    } else {
                        // Если не авторизован - предлагаем войти или зарегистрироваться
                        if (confirm('Для покупки тура необходимо войти в аккаунт. Перейти на страницу входа?')) {
                            window.location.href = 'login.php';
                        }
                    }
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                    window.location.href = `order.php?tour_id=${tourId}`;
                });
        }
    }
    
    // Загрузка отзывов для тура
    async function loadTourReviews(tourId) {
        try {
            const response = await fetch(`get_reviews.php?tour_id=${tourId}`);
            const reviews = await response.json();
            const reviewsList = document.getElementById('tourReviewsList');
            
            if (reviews.length === 0) {
                reviewsList.innerHTML = '<p class="text-muted">Пока нет отзывов. Будьте первым!</p>';
            } else {
                reviewsList.innerHTML = reviews.map(review => `
                    <div class="border-bottom pb-2 mb-2">
                        <div class="d-flex justify-content-between">
                            <strong>${escapeHtml(review.full_name || review.username)}</strong>
                            <span class="text-warning">${'★'.repeat(review.rating)}${'☆'.repeat(5-review.rating)}</span>
                        </div>
                        <small class="text-muted">${new Date(review.created_at).toLocaleDateString()}</small>
                        <p class="mt-1 mb-0">${escapeHtml(review.comment)}</p>
                    </div>
                `).join('');
            }
        } catch (error) {
            console.error('Ошибка загрузки отзывов:', error);
        }
    }
    
    // Проверка авторизации для добавления отзыва
    async function checkAuthForReview(tourId) {
        try {
            const response = await fetch('check_auth.php');
            const data = await response.json();
            const addReviewBlock = document.getElementById('addReviewBlock');
            
            if (data.logged_in) {
                addReviewBlock.innerHTML = `
                    <button class="btn btn-sm btn-primary mt-2" onclick="window.showReviewModal(${tourId})">
                        <i class="fas fa-star me-1"></i>Оставить отзыв
                    </button>
                `;
            } else {
                addReviewBlock.innerHTML = `
                    <div class="alert alert-info mt-2 py-2">
                        <small><a href="login.php" class="text-primary">Войдите в аккаунт</a>, чтобы оставить отзыв</small>
                    </div>
                `;
            }
        } catch (error) {
            console.error('Ошибка проверки авторизации:', error);
        }
    }
    
    // Проверка авторизации для шапки сайта + отображение админ-панели
    async function checkAuth() {
        try {
            const response = await fetch('check_auth.php');
            const data = await response.json();
            const authBlock = document.getElementById('authBlock');
            const userBlock = document.getElementById('userBlock');
            const userNameSpan = document.getElementById('userName');
            
            if (data.logged_in) {
                if (authBlock) authBlock.style.display = 'none';
                if (userBlock) userBlock.style.display = 'inline-block';
                if (userNameSpan) userNameSpan.textContent = data.full_name || data.username;
                
                // Если пользователь — администратор, показываем ссылку на админ-панель
                if (data.role === 'admin') {
                    const adminLinkSpan = document.getElementById('adminLinkSpan');
                    if (adminLinkSpan) {
                        adminLinkSpan.style.display = 'inline-block';
                    }
                }
            } else {
                if (authBlock) authBlock.style.display = 'inline-block';
                if (userBlock) userBlock.style.display = 'none';
            }
        } catch (error) {
            console.error('Ошибка проверки авторизации:', error);
        }
    }
    
    // Глобальная функция для показа модалки отзыва
    window.showReviewModal = function(tourId) {
        document.getElementById('reviewTourId').value = tourId;
        document.getElementById('reviewRating').value = 5;
        document.getElementById('reviewComment').value = '';
        const reviewModal = new bootstrap.Modal(document.getElementById('reviewModal'));
        reviewModal.show();
    };
    
    // Отправка отзыва
    async function submitReview(tourId, rating, comment) {
        try {
            const formData = new FormData();
            formData.append('tour_id', tourId);
            formData.append('rating', rating);
            formData.append('comment', comment);
            
            const response = await fetch('add_review.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            
            if (data.success) {
                alert('Отзыв успешно добавлен!');
                bootstrap.Modal.getInstance(document.getElementById('reviewModal')).hide();
                loadTourReviews(tourId);
            } else {
                alert(data.message);
            }
        } catch (error) {
            console.error('Ошибка:', error);
            alert('Не удалось отправить отзыв');
        }
    }
    
    // Обработчик формы отзыва
    document.getElementById('reviewForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const tourId = document.getElementById('reviewTourId').value;
        const rating = document.getElementById('reviewRating').value;
        const comment = document.getElementById('reviewComment').value;
        if (comment.trim()) {
            submitReview(tourId, rating, comment);
        } else {
            alert('Введите текст отзыва');
        }
    });
    
    // Анимация элементов при скролле
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
    
    // Анимация шапки при скролле
    function handleHeaderScroll() {
        const header = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
    
    // Плавный скролл для якорей
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#' || href.startsWith('#modal')) return;
            e.preventDefault();
            const targetElement = document.querySelector(href);
            if (targetElement) {
                const header = document.querySelector('.navbar');
                const headerHeight = header ? header.offsetHeight : 76;
                const targetPosition = targetElement.offsetTop - headerHeight - 30;
                window.scrollTo({ top: Math.max(0, targetPosition), behavior: 'smooth' });
            }
        });
    });
    
    // Инициализация
    loadToursFromDB();
    checkAuth();
    
    window.addEventListener('load', animateOnScroll);
    window.addEventListener('scroll', animateOnScroll);
    window.addEventListener('scroll', handleHeaderScroll);
    handleHeaderScroll();
    
    // Задержки для анимации
    const slideUpElements = document.querySelectorAll('.slide-up');
    slideUpElements.forEach((element, index) => {
        element.classList.add(`delay-${(index % 4) + 1}`);
    });
    
    // Фикс для hero на мобильных
    function setHeroHeight() {
        const hero = document.querySelector('.hero');
        if (hero && window.innerWidth < 768) {
            hero.style.minHeight = window.innerHeight + 'px';
        }
    }
    setHeroHeight();
    window.addEventListener('resize', setHeroHeight);
    
    // Предзагрузка фонового изображения
    const hero = document.querySelector('.hero');
    if (hero) {
        const bgImage = new Image();
        bgImage.src = 'images/hero/background.jpg';
        bgImage.onerror = function() {
            hero.style.background = 'linear-gradient(135deg, #1A4F8C 0%, #2AA4B0 100%)';
        };
    }
});

// Функция для экранирования HTML
function escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}