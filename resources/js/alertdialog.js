function showAlert(message) {

    var modal = document.getElementById("myalertdialogwarning");
    var alertText = modal.querySelector(".alertText");
    var alertDiv = modal.querySelector(".alert");

    // texto de alerta con el mensaje de éxito
    alertText.textContent = message;
    // clase 'success' al div de alerta
    alertDiv.classList.remove('error');
    alertDiv.classList.add('warning');
    // Muestra el modal
    modal.style.display = "block";
    modal.classList.remove('fade-out');

    setTimeout(function() {
        modal.classList.add('fade-out');
        setTimeout(function() {
            modal.style.display = "none";
        }, 2000);
    }, 5000);
}
