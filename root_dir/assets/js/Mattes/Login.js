document.addEventListener('DOMContentLoaded', function() {
    // Esperar un poco a que el DOM esté completamente cargado
    setTimeout(function() {
        const form = document.querySelector('.account_form');
        
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const email = document.querySelector('input[name="email"]').value;
                const password = document.querySelector('input[name="password"]').value;

                if (!email || !password) {
                    Toastify({
                        text: "Por favor completa todos los campos",
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#ef5350",
                    }).showToast();
                    return;
                }

                const btnSubmit = document.getElementById('btnLoginSubmit');
                if (!btnSubmit) {
                    console.error('Botón con ID btnLoginSubmit no encontrado');
                    return;
                }

                const btnOriginalText = btnSubmit.innerHTML;
                btnSubmit.innerHTML = 'Ingresando...';
                btnSubmit.disabled = true;

                // Hacer fetch POST
                fetch(baseUrl + '/Login/verify_login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Restaurar botón
                    btnSubmit.innerHTML = btnOriginalText;
                    btnSubmit.disabled = false;

                    if (data.success) {
                        Toastify({
                            text: data.message || "¡Bienvenido!",
                            duration: 2000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4caf50",
                        }).showToast();

                        // Redirigir después de 1.5 segundos
                        setTimeout(() => {
                            window.location.href = data.redirect || baseUrl + 'inicio';
                        }, 1500);
                    } else {
                        Toastify({
                            text: data.message || "Error en el login",
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#ef5350",
                        }).showToast();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Restaurar botón
                    btnSubmit.innerHTML = btnOriginalText;
                    btnSubmit.disabled = false;

                    Toastify({
                        text: "Error en la conexión",
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#ef5350",
                    }).showToast();
                });
            });
        } else {
            console.error('Formulario .account_form no encontrado');
        }
    }, 100); // Esperar 100ms para asegurar que el DOM está listo
});
