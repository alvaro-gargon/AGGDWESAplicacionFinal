<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Álvaro García</title>
    <link rel="stylesheet" href="webroot/css/estilos.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <h2>LOGIN LOGOFF</h2>
    </header>
    <main>
        <?php require_once $view[$_SESSION['paginaEnCurso']];?>
    </main>
    <footer>
        <p><a target="_blank" href="https://alvarogargon.ieslossauces.es/">Álvaro García González</a></p>
        <a target="_blank" href="https://github.com/alvaro-gargon/AGGDWESLoginLogoffTema6"><i class="fa fa-github fa-2x"></i></a>
        <section>
            <h4>Documentacion con:</h3>
            <a target="_blank" href="doc/phpDocumentor/index.html">phpDocumentor</a>
            |
            <a target="_blank" href="doc/doxygen/html/index.html">Doxygen</a>
        </section>
        <p>Última actualización <time datetime="2026-01-14">14/01/2026</time></p>
    </footer>
</body>
</html>