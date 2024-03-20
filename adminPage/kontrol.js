
document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        var nameField = document.querySelector('input[name="name"]');
        var passwordField = document.querySelector('input[name="password"]');
        var emailField = document.querySelector('input[name="email"]');
        var userTypeField = document.querySelector('select[name="user_type"]');

        var errorMessages = [];

        if (nameField.value.trim() === '') {
            errorMessages.push('Kullanıcı Ad Soyad alanı boş olamaz ! ');
        }

        if (passwordField.value.trim() === '') {
            errorMessages.push('Kullanıcı şifre alanı boş olamaz !');
        }

        if (emailField.value.trim() === '') {
            errorMessages.push('Kullanıcı mail alanı boş olamaz !');
        } else if (!isValidEmail(emailField.value)) {
            errorMessages.push('Geçerli bir email adresi giriniz !');
        }

        if (userTypeField.value.trim() === '') {
            errorMessages.push('Kullanıcı tipi seçilmelidir !');
        }

        if (errorMessages.length > 0) {
            event.preventDefault(); 
            alert(errorMessages.join('\n')); 
        }
    });

    function isValidEmail(email) {
        // Use a simple email validation regex
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
