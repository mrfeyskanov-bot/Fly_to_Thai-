// Валидация и отправка форм
document.addEventListener('DOMContentLoaded', function() {
    console.log('form-validation.js загружен');
    
    const mainForm = document.querySelector('#contact-form form');
    const secondForm = document.getElementById('secondForm');
    
    // Функция отправки
    async function submitForm(form) {
        const formData = new FormData(form);
        const submitButton = form.querySelector('button[type="submit"]');
        const originalText = submitButton.textContent;
        
        submitButton.innerHTML = 'Отправка...';
        submitButton.disabled = true;
        
        try {
            const response = await fetch('save_booking.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            
            const alertDiv = document.createElement('div');
            alertDiv.className = data.success ? 'alert alert-success mt-3' : 'alert alert-danger mt-3';
            alertDiv.innerHTML = data.message;
            form.parentNode.insertBefore(alertDiv, form.nextSibling);
            
            if (data.success) {
                form.reset();
            }
            
            setTimeout(() => alertDiv.remove(), 5000);
        } catch (error) {
            console.error('Ошибка:', error);
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-danger mt-3';
            alertDiv.innerHTML = 'Ошибка отправки. Попробуйте позже.';
            form.parentNode.insertBefore(alertDiv, form.nextSibling);
            setTimeout(() => alertDiv.remove(), 5000);
        } finally {
            submitButton.innerHTML = originalText;
            submitButton.disabled = false;
        }
    }
    
    // Привязываем обработчики
    if (mainForm) {
        mainForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Форма 1 отправлена');
            submitForm(this);
        });
    }
    
    if (secondForm) {
        secondForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Форма 2 отправлена');
            submitForm(this);
        });
    }
});