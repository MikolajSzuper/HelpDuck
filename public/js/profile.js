function openModal() {
    document.getElementById('emailChangeModal').style.display = 'none';
    document.getElementById('passwordChangeModal').style.display = 'block';
}

function openEmailModal() {
    document.getElementById('emailChangeModal').style.display = 'block';
    document.getElementById('passwordChangeModal').style.display = 'none';
}

function closeModal() {
    document.getElementById('passwordChangeModal').style.display = 'none';
    document.getElementById('emailChangeModal').style.display = 'none';
    resetForms();
}

function resetForms() {
    document.getElementById('passwordChangeForm').reset();
    document.getElementById('emailChangeModal').reset();
}

window.onclick = function (event) {
    const passwordChangeModal = document.getElementById('passwordChangeModal');
    const emailChangeModal = document.getElementById('emailChangeModal');
    if (event.target == passwordChangeModal) {
        passwordChangeModal.style.display = 'none';
        resetForms();
    }
    if (event.target == emailChangeModal) {
        emailChangeModal.style.display = 'none';
        resetForms();
    }
}

function changeErrorColor() {
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