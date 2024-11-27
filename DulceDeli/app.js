// IndexedDB: Inicializar base de datos
let db;
const request = indexedDB.open("sugerenciasDB", 1);

request.onupgradeneeded = (e) => {
    db = e.target.result;
    const store = db.createObjectStore("sugerencias", { keyPath: "id", autoIncrement: true });
    store.createIndex("correo", "correo", { unique: false });
};

request.onsuccess = (e) => {
    db = e.target.result;
    cargarTabla();
};

request.onerror = (e) => console.error("Error al abrir IndexedDB:", e);

// Guardar sugerencia en IndexedDB
document.getElementById("formSugerencias").onsubmit = (e) => {
    e.preventDefault();
    const nombre = document.getElementById("nombre").value;
    const correo = document.getElementById("correo").value;
    const telefono = document.getElementById("telefono").value;
    const sugerencia = document.getElementById("sugerencia").value;

    if (!db) {
        console.error("La base de datos no está lista todavía.");
        return;
    }

    const tx = db.transaction("sugerencias", "readwrite");
    const store = tx.objectStore("sugerencias");
    store.add({ nombre, correo, telefono, sugerencia, fecha: new Date().toISOString() });

    tx.oncomplete = () => {
        alert("Sugerencia guardada localmente.");
        cargarTabla();
    };
};

// Cargar datos de IndexedDB a la tabla HTML
function cargarTabla() {
    const tabla = document.getElementById("tablaSugerencias");
    tabla.innerHTML = "";

    if (!db) {
        console.error("La base de datos no está lista todavía.");
        return;
    }

    const tx = db.transaction("sugerencias", "readonly");
    const store = tx.objectStore("sugerencias");
    store.openCursor().onsuccess = (e) => {
        const cursor = e.target.result;
        if (cursor) {
            const { nombre, correo, telefono, sugerencia, fecha } = cursor.value;
            const row = tabla.insertRow();
            row.innerHTML = `<td>${nombre}</td><td>${correo}</td><td>${telefono}</td><td>${sugerencia}</td><td>${fecha}</td>`;
            cursor.continue();
        }
    };
}

document.getElementById("btnSincronizar").onclick = async () => {
    if (!db) {
        console.error("La base de datos no está lista todavía.");
        return;
    }

    const tx = db.transaction("sugerencias", "readonly");
    const store = tx.objectStore("sugerencias");

    const sugerencias = [];
    const cursorPromise = new Promise((resolve, reject) => {
        store.openCursor().onsuccess = (e) => {
            const cursor = e.target.result;
            if (cursor) {
                sugerencias.push(cursor.value);
                cursor.continue();
            } else {
                resolve(); // Finaliza el cursor
            }
        };
        store.openCursor().onerror = (e) => reject(e);
    });

    try {
        await cursorPromise; // Espera que se termine de leer todas las sugerencias
        console.log("Sugerencias obtenidas:", sugerencias);

        // Enviar las sugerencias al servidor PHP
        const response = await fetch('api/api.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(sugerencias),
        });

        const result = await response.json();
        console.log(result); 
        alert("Se enivo");// Aquí puedes manejar la respuesta del servidor

    } catch (error) {
        console.error("Error al sincronizar con el servidor:", error);
        alert("no hay conexión");
    }
};
