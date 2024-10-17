// Asignar un nombre y versión al cache
const CACHE_NAME = 'v1_pwa_app_cache',
  urlsToCache = [
    /* './',
    'index.php',
    'css/rec.css',
    'js/sw.js',
    'js/app.js',
    'inc/conexion.php',
    'inc/mensaje.php',
    'inc/privilegio.php',
    'imagenes/Assets/icon/favicon.png',
    'offline.html',  // Página para modo sin conexión
    'about.php',
    'ayuda.php',
    'barra.php',
    'barras.php',
    'cierreSesion.php',
    'galletas.php',
    'indes.php',
    'login.php',
    'validar.php',
    'metodosBorrar.php',
    'msotrar_mensajes.php',
    'user.php',
    'pie.php',
    'procesar_formulario.php',
    'registro.php',
    'respuesta.php',
    'contacto.php',*/
  ];

// Durante la fase de instalación, generalmente se almacena en caché los activos estáticos
self.addEventListener('install', e => {
  e.waitUntil(
      caches.open(CACHE_NAME)
          .then(cache => {
              return Promise.all(
                  urlsToCache.map(url => {
                      return fetch(url).then(response => {
                          if (!response.ok) {
                              throw new Error(`Error al cargar ${url}: ${response.status}`);
                          }
                          return cache.add(url);
                      });
                  })
              );
          })
          .then(() => self.skipWaiting())
          .catch(err => console.log('Falló registro de cache', err))
  );
});


// Una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
self.addEventListener('activate', e => {
  const cacheWhitelist = [CACHE_NAME];

  e.waitUntil(
    caches.keys()
      .then(cacheNames => {
        return Promise.all(
          cacheNames.map(cacheName => {
            // Eliminamos lo que ya no se necesita en cache
            if (cacheWhitelist.indexOf(cacheName) === -1) {
              return caches.delete(cacheName);
            }
          })
        );
      })
      // Le indica al SW activar el cache actual
      .then(() => self.clients.claim())
  );
});

// Cuando el navegador recupera una url
self.addEventListener('fetch', e => {
  e.respondWith(
    caches.match(e.request)
      .then(response => {
        // Si el recurso está en el caché, lo devolvemos
        if (response) {
          return response;
        }
        // Si no está en el caché, intentamos obtenerlo de la red
        return fetch(e.request)
          .catch(() => {
            // Si la solicitud de red falla, mostramos la página de modo sin conexión
            return caches.match('offline.html'); // Asegúrate de que 'offline.html' está en el caché
          });
      })
  );
});

// Escuchar mensajes desde la app
self.addEventListener('message', event => {
  if (event.data === 'offline-alert') {
    self.clients.matchAll().then(clients => {
      clients.forEach(client => {
        client.postMessage('offline-alert');
      });
    });
  }
});
