document.addEventListener('DOMContentLoaded', function () {
    function showLoginAlert() {
        const alertDiv = document.createElement('div');
        alertDiv.classList.add('login-alert');
        alertDiv.innerHTML = `
            <div class="alert-content">
                <p>Debes iniciar sesión para añadir productos al carrito.</p>
                <button id="login-button">Iniciar Sesión</button>
            </div>
        `;
        document.body.appendChild(alertDiv); // Asegura que el modal se añada directamente al body

        document.getElementById('login-button').addEventListener('click', function () {
            window.location.href = `${BASE_URL}login`;
        });

        // Mostrar animación de entrada
        setTimeout(() => {
            alertDiv.classList.add('show');
        }, 10);

        // Cerrar el modal al hacer clic fuera de él (opcional)
        alertDiv.addEventListener('click', function (e) {
            if (e.target === alertDiv) {
                closeLoginAlert(alertDiv);
            }
        });
    }

    function closeLoginAlert(alertDiv) {
        alertDiv.classList.remove('show');
        setTimeout(() => {
            alertDiv.remove();
        }, 300);
    }

    // Añadir el script para los botones de incremento y decremento
    document.querySelectorAll('.quantity-selector').forEach(selector => {
        const decrementButton = selector.querySelector('.decrement');
        const incrementButton = selector.querySelector('.increment');
        const quantityInput = selector.querySelector('.quantity-input');

        decrementButton.addEventListener('click', () => {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        incrementButton.addEventListener('click', () => {
            const currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });
    });

    // Función para vaciar el carrito
    function vaciarCarrito() {
        if (confirm('¿Estás seguro de que deseas vaciar el carrito?')) {
            fetch(`${BASE_URL}carrito/vaciar`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Hubo un problema al vaciar el carrito.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }

    // Añadir el evento al botón de vaciar carrito
    const emptyCartButton = document.getElementById('empty-cart-button');
    if (emptyCartButton) {
        emptyCartButton.addEventListener('click', vaciarCarrito);
    }
});