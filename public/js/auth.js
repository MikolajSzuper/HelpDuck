function openModal() {
    document.getElementById('loginModal').style.display = 'block';
}

function openRegisterModal() {
    document.getElementById('registerModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('loginModal').style.display = 'none';
    document.getElementById('registerModal').style.display = 'none';
    resetForms();
}

function resetForms() {
    document.getElementById('loginForm').reset();
    document.getElementById('registerForm').reset();
}

window.onclick = function(event) {
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    if (event.target == loginModal) {
        loginModal.style.display = 'none';
        resetForms();
    }
    if (event.target == registerModal) {
        registerModal.style.display = 'none';
        resetForms();
    }
}

function changeErrorColor(){
    document.getElementById('errorContainer').style.backgroundColor = 'green';
}

function showError(message) {
    const errorContainer = document.getElementById('errorContainer');
    errorContainer.textContent = message;
    errorContainer.style.display = 'block';
    setTimeout(() => {
        errorContainer.classList.add('show');
        setTimeout(() => {
            errorContainer.classList.remove('show');
            errorContainer.classList.add('hide');
            setTimeout(() => {
                errorContainer.classList.remove('hide');
                errorContainer.style.display = 'none';
                document.getElementById('errorContainer').style.backgroundColor = '#f44336';
            }, 500); 
        }, 3000); 
    }, 10); 
}

// Execute error handling based on PHP data
document.addEventListener('DOMContentLoaded', () => {
    const error = document.body.dataset.error;
    if (error) {
        if (error === 'userExists') {
            showError("Taki użytkownik już istnieje");
        } else if (error === 'userNoExists') {
            showError("Nie ma takiego użytkownika");
        } else if (error === 'wrongPassword') {
            showError("Niepoprawne hasło");
        } else if (error === 'registerSuccess') {
            changeErrorColor();
            showError("Zarejestrowano pomyślnie");
        }
    }
});