<!-- barras.php -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
   
    <?php
    // Obtener la URL actual
    $url = $_SERVER['REQUEST_URI'];

    // Definir el texto y el enlace para cada página
    $pages = [
      'galletas' => 'galletas.php',
      'Dulces' => 'dulces.php',
      'Ropa' => 'ropa.php',
      'Juguetes' => 'juguetes.php',
      'Búsqueda' => 'indes.php',
      'Contacto' => 'contacto.php',
      'Sobre nosotros' => 'about.php',
      'Ayuda' => 'ayuda.php',
      'Iniciar sesion' => 'login.php',
      'Registrate' => 'registro.php', 
    ];

    // Iterar sobre las páginas y mostrar los breadcrumbs correspondientes
    foreach ($pages as $page => $link) {
      if (strpos($url, $link) !== false) {
        echo "<li class='breadcrumb-item active' aria-current='page'>$page</li>";
        break;
      }
    }
    ?>
  </ol>
</nav>
