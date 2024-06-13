<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INICIO DE SESION!!</title>
  <link rel="stylesheet" href="CSS/styles.css" type="text/css">
  <?php require_once ('funciones.php') ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/brands.css" type="text/css">
  <link rel="stylesheet" href="CSS/solid.css" type="text/css">
  <link rel="stylesheet" href="CSS/fontawesome.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="shortcut icon" href="IMAGENES/favicon.ico" type="image/x-icon">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><i class="fa-solid fa-house"></i>poljis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="Menu.html">Menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pedidos.html">Pedidos</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="bi bi-apple"></i>
                    Dropdown
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-i-cursor"></i> Another action</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-star-of-life"></i> Eber Gael Quezada
                        Ruiz</a></li>
                  </ul>
                </li>
              </ul>
              <h1 class="col-lg-7">Registrate</h1>
              <form class="d-flex" role="search">
                <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success me-lg-3" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <?php
  $mysqli = new mysqli("127.0.0.1", "root", "", "iniciodesesionpoljis", 3306);
  mysqli_set_charset($mysqli, 'utf8');
  if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }

  //Insertar
  if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formInsertar")) {
    $insertSQL = sprintf(
      "INSERT INTO poljisregisters (Name, LastName , Username, Email, ConfirmEmail, Password) VALUES(%s, %s, %s, %s, %s, %s)",
      GetSQLValueString($_POST["validationTooltip01"], "text"),
      GetSQLValueString($_POST["validationTooltip02"], "text"),
      GetSQLValueString($_POST["validationTooltipUsername"], "text"),
      GetSQLValueString($_POST["validationTooltipEmail"], "text"),
      GetSQLValueString($_POST["validationTooltipConEmail"], "text"),
      GetSQLValueString($_POST["validationTooltipPassword"], "text")
    );
    $result1 = mysqli_query($mysqli, $insertSQL) or die(mysqli_error($mysqli));
    $insertGoto = "register.php";
    header(sprintf("Location: %s", $insertGoto));
    // echo"si Funciona";
  }
  //Eliminar
  if ((isset($_POST["MM_Delete"])) && ($_POST["MM_Delete"] == "formEliminar")) {
    $insertSQL = sprintf("DELETE FROM poljisregisters WHERE ID = %o",
      GetSQLValueString(6, 'int')
    );
    $result1 = mysqli_query($mysqli, $insertSQL) or die(mysqli_error($mysqli));
    $insertGoto = "register.php";
    header(sprintf("Location: %s", $insertGoto));
  }
  //Actualizar
  if ((isset($_POST["MM_UPDATE"])) && ($_POST["MM_UPDATE"] == "formActualizar")) {
    $insertSQL = sprintf(
      "UPDATE poljisregisters SET Name= %s, LastName = %s, Username = %s, Email = %s, ConfirmEmail = %s, Password= %s WHERE ID= %s",
      GetSQLValueString($_POST["validationTooltip01"], "text"),
      GetSQLValueString($_POST["validationTooltip02"], "text"),
      GetSQLValueString($_POST["validationTooltipUsername"], "text"),
      GetSQLValueString($_POST["validationTooltipEmail"], "text"),
      GetSQLValueString($_POST["validationTooltipConEmail"], "text"),
      GetSQLValueString($_POST["validationTooltipPassword"], "text"),
      GetSQLValueString(6, "int"));
    $result1 = mysqli_query($mysqli, $insertSQL) or die(mysqli_error($mysqli));
    $insertGoto = "register.php";
    header(sprintf("Location: %s", $insertGoto));
    // echo"SSSS";
  }
  ?>
  <div class="Resultados">
    <p>
      <?php
      $query = "SELECT * FROM poljisregisters";
      if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
          $field1name = $row["Name"];
          $field2name = $row["LastName"];
          $field3name = $row["Username"];
          $field4name = $row["Email"];
          $field5name = $row["ConfirmEmail"];
          $field6name = $row["Password"];

          echo ' <div class="Resultados"><tr> <br>
        <td>' . $field1name . '</td> 
        <td>' . $field2name . '</td> 
        <td>' . $field3name . '</td> 
        <td>' . $field4name . '</td> 
        <td>' . $field5name . '</td> 
        <td>' . $field6name . '</td> 
        </tr> <br></div>';
        }
        /* free result set */
        $result->free();
      }
      ?>
      <?php
      $query_DatosU = sprintf("SELECT * FROM poljisregisters WHERE ID =6");
      $DatosConUpdate = mysqli_query($mysqli, $query_DatosU) or die(mysqli_error($mysqli));
      $row_DatosConUpdate = mysqli_fetch_assoc($DatosConUpdate);
      $totalRows_DatosConUpdate = mysqli_num_rows($DatosConUpdate);
      ?>
    </p>
  </div>

  <form class="row g-3 needs-validation" method="POST" role="form" name="formInsertar" novalidate>
    <!-- name -->
    <div class="col-md-12">
      <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label">First name</label>
        <input type="text" class="form-control" id="validationTooltip01" name="validationTooltip01" value="" required>
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
    </div>
    <!-- Last name -->
    <div class="col-md-4 position-relative">
      <label for="validationTooltip02" class="form-label">Last name</label>
      <input type="text" class="form-control" id="validationTooltip02" name="validationTooltip02" value=""
        required_once>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <!-- Username -->
    <div class="col-md-4 position-relative">
      <label for="validationTooltipUsername" class="form-label">Username</label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
        <input type="text" class="form-control" name="validationTooltipUsername" id="validationTooltipUsername"
          aria-describedby="validationTooltipUsernamePrepend" required>
        <div class="invalid-tooltip">
          Please choose a unique and valid username.
        </div>
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
    </div>
    <!-- Email -->
    <div class="col-md-6 position-relative">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-11">
        <input type="email" class="form-control" id="inputEmail3" name="validationTooltipEmail" required>
      </div>
    </div>
    <!-- Confirm Email -->
    <div class="col-md-6 position-relative">
      <label for="inputEmail1" class="col-sm-2 col-form-label">Confirm Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail1" name="validationTooltipConEmail" required>
      </div>
    </div>
    <!-- password -->
    <div class="col-md-6 position-relative">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-11">
        <input type="password" class="form-control" id="inputPassword3" name="validationTooltipPassword" required_once>
      </div>
    </div>
    <input name="MM_insert" type="hidden" id="MM_insert" value="formInsertar">    
    <!-- Boton tipo submit -->
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
  </form>
  <form class="row g-3 needs-validation" method="POST" role="form" name="formActualizar" novalidate>
    <!-- name -->
    <div class="col-md-12">
      <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label">First name</label>
        <input type="text" class="form-control" id="validationTooltip01" name="validationTooltip01"
          value="<?php echo $row_DatosConUpdate["Name"]; ?>" required>
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
    </div>
    <!-- Last name -->
    <div class="col-md-4 position-relative">
      <label for="validationTooltip02" class="form-label">Last name</label>
      <input type="text" class="form-control" id="validationTooltip02" name="validationTooltip02"
        value="<?php echo $row_DatosConUpdate["LastName"]; ?>" required_once>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <!-- Username -->
    <div class="col-md-4 position-relative">
      <label for="validationTooltipUsername" class="form-label">Username</label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
        <input type="text" class="form-control" name="validationTooltipUsername" id="validationTooltipUsername"
          value="<?php echo $row_DatosConUpdate["Username"]; ?>" aria-describedby="validationTooltipUsernamePrepend"
          required>
        <div class="invalid-tooltip">
          Please choose a unique and valid username.
        </div>
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
    </div>
    <!-- Email -->
    <div class="col-md-6 position-relative">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-11">
        <input type="email" class="form-control" id="inputEmail3" name="validationTooltipEmail"
          value="<?php echo $row_DatosConUpdate["Email"]; ?>" required>
      </div>
    </div>
    <!-- Confirm Email -->
    <div class="col-md-6 position-relative">
      <label for="inputEmail1" class="col-sm-2 col-form-label">Confirm Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail1" name="validationTooltipConEmail"
          value="<?php echo $row_DatosConUpdate["ConfirmEmail"]; ?>" required>
      </div>
    </div>
    <!-- password -->
    <div class="col-md-6 position-relative">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-11">
        <input type="password" class="form-control" id="inputPassword3" name="validationTooltipPassword"
          value="<?php echo $row_DatosConUpdate["Password"]; ?>" required_once>
      </div>
    </div>
    <!-- Hidden -->
    <input name="MM_UPDATE" type="hidden" id="MM_UPDATE" value="formActualizar">
    <!-- Boton tipo submit -->
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Submit Update</button>
    </div>
  </form>
  <form class="row g-3 needs-validation" method="POST" role="form" name="formEliminar" novalidate>
    <div class="col-12">
      <input name="MM_Delete" type="hidden" id="MM_Delete" value="formEliminar">
      <button class="btn btn-primary" type="submit">Delete</button>
    </div>
  </form>

  <div id="JavaSc">
    <script src="JS/JavaScript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
      </script>
    <script src="JS/solid.js"></script>
    <script src="JS/brands.js"></script>
    <script src="JS/fontawesome.js"></script>
  </div>
</body>

</html>