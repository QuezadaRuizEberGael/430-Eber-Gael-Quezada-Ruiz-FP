    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP</title>
        <?php require_once('funciones.php')?>
    </head>
    <body>
       
    <?php
    $mysqli = new mysqli("127.0.0.1", "root", "", "biblioteca", 3306);
    mysqli_set_charset($mysqli,'utf8');
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

        // $SQL = "INSERT INTO autor (Nombre ,PaisOrigen, Genero) VALUES('Maria','Mexico','F')";
        // if ($result = $mysqli->query($SQL)) {
        //     echo "Nueva informacion a sido agreagada con exito";
        // }
        // else{
        //     echo "Error: " . $SQL . "<br>" . $mysqli_error($mysqli);
        // }6
    
        if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formInsertar")) {
            $insertSQL= sprintf("INSERT INTO autor (Nombre, PaisOrigen, Genero) VALUES(%s, %s, %s)",
            GetSQLValueString($_POST["strNombre"],"text"),
            GetSQLValueString($_POST["strPaisOrigen"],"text"),
            GetSQLValueString($_POST["strGenero"],"text"));
            $result1 = mysqli_query($mysqli, $insertSQL) or die(mysqli_error($mysqli));
            $insertGoto = "index.php";
            header(sprintf("Location: %s", $insertGoto));
        }
        ?>
    
        <div>
            <form action="index.php" method="post" id="formInsertar" role="form" name="formInsertar">
                <label for="Nombre">Su nombre: </label><input type="text" name="strNombre" id="strNombre"placeholder="Nombre">
                <label for="PaisOrigen">Su Pais de origen:</label> <input type="text" name="strPaisOrigen" id="strPaisOrigen" placeholder="Pais de Origen">
                <label for="Genero">Su Genero:</label> <input type="text" name="strGenero" id="strGenero"placeholder="Genero">
                <input name="MM_insert" type="hidden" id="MM_insert" value="formInsertar">
                <button type="submit" class="btn btn-success">añadir</button>
            </form>
        </div>
        
    <?php
    
    // $field1name = $_POST["Nombre"];
    // $field2name = $_POST["PaisOrigen"];
    // $field3name = $_POST["Genero"];
    // $SQL = "INSERT INTO autor (Nombre ,PaisOrigen, Genero) VALUES($field1name, $field2name , $field3name)";
    // echo $_POST['Nombre'] . " " . $_POST['PaisOrigen'] . " " . $_POST['Genero'];
    $query = "SELECT * FROM autor";
    
    if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["Nombre"];
            $field2name = $row["PaisOrigen"];
            $field3name = $row["Genero"];
            
            echo '<tr> <br>
            <td>'.$field1name.'</td> 
            <td>'.$field2name.'</td> 
            <td>'.$field3name.'</td> 
            </tr> <br>';
        }
        /* free result set */
        $result->free();
    }
        // if ((isset($_POST["MM_Delete"])) && ($_POST["MM_Delete"] == "formEliminar")) {
        //     $ssql= "SELECT NA TOP(1) FROM Autor ORDER BY NA DESC";
        //     $insertSQL= sprintf("DELETE FROM autor WHERE NA = %s",
        //         GetSQLValueString($ssql,'int'));
        //         $result1 = mysqli_query($mysqli, $insertSQL) or die(mysqli_error($mysqli));
        //         $insertGoto = "index.php";
        //         header(sprintf("Location: %s", $insertGoto));
        // }
        // if ((isset($_POST["MM_LOOK"])) && ($_POST["MM_LOOK"] == "formMirador")) {  
        //     $fieldNA = $_POST["strNA"];
        //     $lookN = "SELECT Nombre, PaisOrigen FROM autor WHERE NA= $fieldNA";
        // }
        if ((isset($_POST["MM_UPDATE"])) && ($_POST["MM_UPDATE"] == "formActualizar")) {    
                $insertSQL= sprintf("UPDATE autor SET Nombre= %s, PaisOrigen = %s, Genero = %s WHERE NA = %o",
                GetSQLValueString($_POST["strNombreA"],"text"),
                GetSQLValueString($_POST["strPaisOrigenA"],"text"),
                GetSQLValueString($_POST["strGeneroA"],"text"),
                GetSQLValueString($_POST["strNA"],"int"));
                $result1 = mysqli_query($mysqli, $insertSQL) or die(mysqli_error($mysqli));
                $insertGoto = "index.php";
                header(sprintf("Location: %s", $insertGoto));
            // echo"SSSS";
        }
        ?>
        <?php 
        $query_DatosU = sprintf("SELECT * FROM autor WHERE NA=1");
        $DatosConUpdate = mysqli_query($mysqli, $query_DatosU) or die(mysqli_error($mysqli));
        $row_DatosConUpdate =mysqli_fetch_assoc($DatosConUpdate);
        $totalRows_DatosConUpdate = mysqli_num_rows($DatosConUpdate);
        ?>
        <!-- <form method="POST" name="Looking" action="index.php">
            <label for="ID">Su ID:</label> <input type="number" name="strNA" id="strNA"placeholder="ID">
            <input name="MM_LOOK" type="hidden" id="MM_LOOK" value="formMirador">
            <button type="submit" class="btn btn-success">Chismosear</button>
        </form> -->
        <form method="POST" name="Update" action="index.php">
            <label for="Nombre">Su nombre: </label><input type="text" name="strNombreA" id="strNombreA"placeholder="Nombre" value ="<?php echo $row_DatosConUpdate["Nombre"]; ?>">
            <label for="PaisOrigen">Su Pais de origen:</label> <input type="text" name="strPaisOrigenA" id="strPaisOrigenA" placeholder="Pais de Origen" value ="<?php echo $row_DatosConUpdate["PaisOrigen"]; ?>" >
            <label for="Genero">Su Genero:</label> <input type="text" name="strGeneroA" id="strGeneroA"placeholder="Genero" value ="<?php echo $row_DatosConUpdate["Genero"]; ?>">
            <!-- <label for="ID">Su ID:</label> <input type="number" name="strNA" id="strNA"placeholder="ID"> -->
            <input name="MM_UPDATE" type="hidden" id="MM_UPDATE" value="formActualizar">
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
        <form method="POST" name="Delete" action="index.php">
            <input name="MM_Delete" type="hidden" id="MM_Delete" value="formEliminar">
            <button type="submit" class="btn btn-success">Borrar</button>
        </form>
    
    <?php
    mysqli_close($mysqli);
    ?>  

    </body>
    </html>