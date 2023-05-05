<?php
    session_start();
    require_once("c://xampp/htdocs/FullDevCode/Controladores/UsuarioController.php");
    require_once("c://xampp/htdocs/FullDevCode/Modelos/UsuariosViewModel.php");

    $controlador = new UsuarioController();

    if($_POST)
    {
        $mensaje;
        $id = 0;
        $nombre = "";
        $direccion = "";
        $municipio = "";
        $propierario = "";
        $departamento = "";
        $nit = (isset($_POST['nit'])?$_POST['nit']:"");
        $password = (isset($_POST['password'])?$_POST['password']:"");

        $usuario = new Usuario($id,$nombre,$direccion,$departamento,$municipio,$nit,$password,$propierario);
        $usuariorecuperado = $controlador->InicioDeSesion($usuario->getNit(),$usuario->getPassword());

        if($usuariorecuperado != null)
        {
            $_SESSION['usuarioId'] = $usuariorecuperado['Id'];
            $_SESSION['nombre'] = $usuariorecuperado['Propietario'];
            $_SESSION['tiempo'] = time();
            $_SESSION['logueado'] = true;
            header("Location:index.php");
        }
        else
        {
            $mensaje = "El nit o la contraseña no son incorrecto";
        }

    }


?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="http://localhost/fulldevcode/Css/login.css" />
    <script src="https://kit.fontawesome.com/d9353dd905.js" crossorigin="anonymous"></script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container">
        <br>
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="content">
                    <h1 class="logo">Inicio De Sesion</h1>
                    <br>
                    <div class="formulario-login">
                        <div class="formulario">
                            <?php if(isset($mensaje)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong><?php echo $mensaje ?></strong>
                                </div>
                            <?php } ?>
                            <form action="" method="post">
                                <p>
                                    <label for="nit" class="form-label">Nit</label>
                                    <input type="number"
                                    value="<?php if(isset($nit)) echo $nit?>"
                                    class="form-control" name="nit" required id="nit" aria-describedby="helpId" placeholder="Ingrese el nit de la finca">
                                </p>
                                <p>
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password"
                                    class="form-control" required name="password" id="password" aria-describedby="helpId" placeholder="Ingrese su contraseña">
                                </p>
                                <p>
                                    <button type="submit">Login</button>
                                </p>
                                <p>
                                    <center><a class="nav-link" href="registrar.php">¿No tienes cuenta con nosotros? Registrate</a></center>
                                </p>
                            </form>
                        </div>
                        <div class="informacion-fm">
                            <br>
                            <br>
                            <br>
                            <center><i class="fa-solid fa-user fa-6x"></i></center>
                            <h1 class="logo">Bienvenidos</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
