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