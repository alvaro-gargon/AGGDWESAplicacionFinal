<form method="post">
    <button class="volver" name="VOLVER">VOLVER</button>
</form>
<?php 
//Contenido de la variable $_SESSION-------------------------------------------------------
        echo '<br><br><h3>Contenido de la variable $_SESSION</h3><br>';
        echo '<table class="principal">';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_SESSION)) {
            foreach ($_SESSION as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_SESSION[' . $variable . ']</td>';
                echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_SESSION está vacía.</em></td></tr>";
        }
        echo "</table>";

        //Contenido de la variable $_COOKIE---------------------------------------------------
        echo '<br><br><h3>Contenido de la variable $_COOKIE</h3><br>';
        echo '<table class="principal">';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_COOKIE)) {
            foreach ($_COOKIE as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_COOKIE[' . $variable . ']</td>';
                echo "<td><pre>" . $resultado . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_COOKIE está vacía.</em></td></tr>";
        }
        echo "</table>";
        
        echo '<h3>Contenido de la variable $_SERVER</h3>';
        echo '<table class="principal">';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_SERVER)) {
            foreach ($_SERVER as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_SERVER[' . $variable . ']</td>';
                echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_SERVER está vacía.</em></td></tr>";
        }
        echo "</table>";

?>