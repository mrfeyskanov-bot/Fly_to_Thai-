// Валидация форм для Bootstrap версии

document.addEventListener('DOMContentLoaded', function() {
    const mainForm = document.querySelector('#contact-form form');
    const secondForm = document.getElementById('secondForm');
    
    // Маска для телефона
    function initPhoneMask(input) {
        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length > 0) {
                if (!value.startsWith('7')) {
                    value = '7' + value;
                }
                value = '+7' + value.substring(1);
            }
            
            let formattedValue = '';
            
            if (value.length > 1) {
                formattedValue = value.substring(0, 2);
            }
            
            if (value.length > 2) {
                formattedValue += ' (' + value.substring(2, 5);
            }
            
            if (value.length > 5) {
                formattedValue += ') ' + value.substring(5, 8);
            }
            
            if (value.length > 8) {
                formattedValue += '-' + value.substring(8, 10);
            }
            
            if (value.length > 10) {
                formattedValue += '-' + value.substring(10, 12);
            }
            
            e.target.value = formattedValue;
        });
    }
    
    // Инициализация масок
    const phoneInputs = document.querySelectorAll('input[type="tel"]');
    phoneInputs.forEach(input => initPhoneMask(input));
    
    // Валидация формы
    function validateForm(form) {
        const nameInput = form.querySelector('input[name="name"], #name, #name2');
        const phoneInput = form.querySelector('input[type="tel"]');
        const emailInput = form.querySelector('input[type="email"]');
        const agreementCheckbox = form.querySelector('input[type="checkbox"]');
        
        let isValid = true;
        
        // Валидация имени
        if (!nameInput || !nameInput.value.trim()) {
            showError(nameInput, 'Пожалуйста, введите ваше имя');
            isValid = false;
        } else if (nameInput.value.trim().length < 2) {
            showError(nameInput, 'Имя должно содержать минимум 2 символа');
            isValid = false;
        } else {
            clearError(nameInput);
        }
        
        // Валидация телефона
        if (!phoneInput || !phoneInput.value.trim()) {
            showError(phoneInput, 'Пожалуйста, введите ваш телефон');
            isValid = false;
        } else {
            const phoneRegex = /^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/;
            if (!phoneRegex.test(phoneInput.value)) {
                showError(phoneInput, 'Пожалуйста, введите корректный номер телефона');
                isValid = false;
            } else {
                clearError(phoneInput);
            }
        }
        
        // Валидация email (если заполнен)
        if (emailInput && emailInput.value.trim()) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value)) {
                showError(emailInput, 'Пожалуйста, введите корректный email');
                isValid = false;
            } else {
                clearError(emailInput);
            }
        }
        
        // Валидация чекбокса
        if (!agreementCheckbox || !agreementCheckbox.checked) {
            showError(agreementCheckbox, 'Необходимо согласие с политикой конфиденциальности');
            isValid = false;
        } else {
            clearError(agreementCheckbox);
        }
        
        return isValid;
    }
    
    // Показать ошибку
    function showError(input, message) {
        if (!input) return;
        
        clearError(input);
        
        // Добавляем класс Bootstrap is-invalid
        if (input.type !== 'checkbox') {
            input.classList.add('is-invalid');
        }
        
        const errorDiv = document.createElement('div');
        errorDiv.className = 'invalid-feedback d-block';
        errorDiv.textContent = message;
        
        // Для чекбокса добавляем к родителю
        if (input.type === 'checkbox') {
            const parentDiv = input.closest('.form-check');
            if (parentDiv) {
                parentDiv.appendChild(errorDiv);
            }
        } else {
            input.parentNode.appendChild(errorDiv);
        }
        
        // Анимация shake
        input.classList.add('shake');
        setTimeout(() => {
            input.classList.remove('shake');
        }, 500);
    }
    
    // Очистить ошибку
    function clearError(input) {
        if (!input) return;
        
        input.classList.remove('is-invalid');
        
        const parent = input.closest('.form-check') || input.parentNode;
        const errorDiv = parent.querySelector('.invalid-feedback');
        
        if (errorDiv) {
            parent.removeChild(errorDiv);
        }
    }
    
    // Обработка отправки формы
    function handleFormSubmit(e, form) {
        e.preventDefault();
        
        if (validateForm(form)) {
            const submitButton = form.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            
            // Показываем состояние загрузки
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Отправка...';
            submitButton.disabled = true;
            
            // Имитация отправки
            setTimeout(() => {
                // Показываем Bootstrap alert
                const successAlert = document.createElement('div');
                successAlert.className = 'alert alert-success alert-dismissible fade show mt-4';
                successAlert.innerHTML = `
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>Спасибо!</strong> Ваша заявка принята. Наш менеджер свяжется с вами в течение 15 минут.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                
                form.parentNode.insertBefore(successAlert, form.nextSibling);
                
                // Скрываем alert через 5 секунд
                setTimeout(() => {
                    const bsAlert = bootstrap.Alert.getOrCreateInstance(successAlert);
                    bsAlert.close();
                }, 5000);
                
                // Сбрасываем форму
                form.reset();
                
                // Возвращаем кнопку
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
                
            }, 1500);
        }
    }
    
    // Навешиваем обработчики
    if (mainForm) {
        mainForm.addEventListener('submit', function(e) {
            handleFormSubmit(e, this);
        });
    }
    
    if (secondForm) {
        secondForm.addEventListener('submit', function(e) {
            handleFormSubmit(e, this);
        });
    }
    
    // Очистка ошибок при вводе
    document.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', function() {
            clearError(this);
        });
    });
    
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            clearError(this);
        });
    });
});