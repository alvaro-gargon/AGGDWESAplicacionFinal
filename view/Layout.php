<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Álvaro García</title>
    <link rel="stylesheet" href="webroot/css/estilos.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <h2>APLICACION FINAL</h2>
    </header>
    <main>
        <?php require_once $view[$_SESSION['paginaEnCurso']];?>
    </main>
    <footer>
        <p><a target="_blank" href="https://alvarogargon.ieslossauces.es/">Álvaro García González</a> <a target="_blank" href="https://github.com/alvaro-gargon/AGGDWESAplicacionFinal"><i class="fa-brands fa-github fa-2x"></i></a>
            <a target="_blank" href="./webroot/images/CurriculoAlvaroGarcia.pdf"><i class="fa-solid fa-address-book fa-2x"></i></a></p>
        <section>
            <h4>Documentacion con:</h4>
            <a style="position: relative;left: -10%;" target="_blank" href="https://www.php.net/docs.php">PHP DOC</a>
            <a target="_blank" href="doc/phpDocumentor/index.html">phpDocumentor</a>
            |
            <a target="_blank" href="doc/doxygen/html/index.html">Doxygen</a>
            <a style="position: relative;left: 20%;" target="_blank" href="https://github.com/alvaro-gargon/AGGDAWProyectoDAW">Herramientas</a>
        </section>
        <p>Última actualización <time datetime="2026-02-12">12/02/2026</time></p>
    </footer>
</body>
</html>