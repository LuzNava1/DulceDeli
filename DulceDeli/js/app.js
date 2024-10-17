if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('js/sw.js')
    .then(reg => console.log('Registro de SW exitoso', reg))
    .catch(err => console.warn('Error al tratar de registrar el sw', err));
}

// Escuchar mensajes del Service Worker
navigator.serviceWorker.addEventListener('message', function(event) {
if (event.data === 'offline-alert') {
  alert('Estás sin conexión a Internet. Algunos recursos no estarán disponibles.');
}
});
