document.addEventListener('DOMContentLoaded', function() {
    const togglePasswords = document.querySelectorAll('.toggle-password');

    togglePasswords.forEach(function(togglePassword) {
        const passwordInputId = togglePassword.dataset.target;
        const passwordInput = document.getElementById(passwordInputId);

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        }
    });
});