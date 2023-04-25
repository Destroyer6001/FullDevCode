<?php 
    session_start();
    if($_SESSION['logueado'] == false)
    {
        header("Location:".$urlBase."login.php");
    }
    require_once("c://xampp/htdocs/FullDevCode/Controladores/UsuarioController.php");
    require_once("c://xampp/htdocs/FullDevCode/Modelos/UsuariosViewModel.php");
    $controlador = new UsuarioController();

    if($_GET['UsuarioId'])
    {
        $txtId = (isset($_GET['UsuarioId'])?$_GET['UsuarioId']:"");
        $resultadoConsulta = $controlador->ConsultarUsuario($txtId);
        $nombre = $resultadoConsulta['Nombre'];
        $direccion = $resultadoConsulta['Direccion'];
        $departamento = $resultadoConsulta['Departamento'];
        $municipio = $resultadoConsulta['Municipio'];
        $propietario = $resultadoConsulta['Propietario'];
        $nit = $resultadoConsulta['Nit'];
        $password = $resultadoConsulta['Password'];
    }

    if($_POST)
    {
        $validacion = false;
        $mensaje = "";
        $txtId = (isset($_POST['txtId'])?$_POST['txtId']:"");
        $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");
        $direccion = (isset($_POST['direccion'])?$_POST['direccion']:"");
        $municipio = (isset($_POST['municipio'])?$_POST['municipio']:"");
        $departamento = (isset($_POST['departamento'])?$_POST['departamento']:"");
        $propietario = (isset($_POST['propietario'])?$_POST['propietario']:"");
        $nit = (isset($_POST['nit'])?$_POST['nit']:"");
        $password = (isset($_POST['password'])?$_POST['password']:"");

        $validacion = $controlador->ValidarEditar($txtId,$nit);

        if($validacion == false)
        {
            $usuario = new Usuario($txtId,$nombre,$direccion,$departamento,$municipio,$nit,$password,$propietario);
            $cambiodecontraseña = $controlador->InicioDeSesion($usuario->getNit(),$usuario->getPassword());
            
            if($cambiodecontraseña != null)
            {
                $controlador->Editar($usuario->getId(),$usuario->getNombre(),$usuario->getDireccion(),$usuario->getMunicipio(),$usuario->getDepartamento()
                ,$usuario->getNit(),$usuario->getPassword(),$usuario->getPropietario());
                header("Location:index.php");

            }
            else
            {
                $controlador->Editar($usuario->getId(),$usuario->getNombre(),$usuario->getDireccion(),$usuario->getMunicipio(),$usuario->getDepartamento()
                ,$usuario->getNit(),$usuario->getPassword(),$usuario->getPropietario());
                session_destroy();
                header("Location:Login.php");
            }
        }
        else
        {
            $mensaje = "El nit que desea ingresar ya se encuentra registrado con otro usuario";
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
    
    <link rel="stylesheet" href="http://localhost/fulldevcode/Css/editar.css" />

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container">
        <div class="content">
            <h1 class="logo">Editar Usuario</h1>
            <div class="formulario-editar">
                <div class="formulario">
                    <?php if(isset($mensaje)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong><?php echo $mensaje; ?></strong>
                        </div>
                    <?php } ?>
                    <form action="" method="post">
                        <input type="hidden"
                            value = "<?php echo $txtId;?>"
                            class="form-control" name="txtId" id="txtId" aria-describedby="helpId" placeholder="">
                        <p>
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text"
                            value = "<?php if(isset($nombre)) echo $nombre;?>"
                            class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingrese el nombre de la finca">
                        </p>
                        <p>
                            <label for="direccion" class="form-label">Direccion</label>
                            <input type="text"
                            value = "<?php if(isset($direccion)) echo $direccion;?>"
                            class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="Ingrese la direccion de la finca">
                        </p>
                        <p>
                            <label for="municipio" class="form-label">Municipio</label>
                            <input type="text"
                            value = "<?php if(isset($municipio)) echo $municipio;?>"
                            class="form-control" name="municipio" id="municipio" aria-describedby="helpId" placeholder="Ingrese el municipio">
                        </p>
                        <p>
                            <label for="departamento" class="form-label">Departamento</label>
                            <input type="text"
                            value = "<?php if(isset($departamento)) echo $departamento;?>"
                            class="form-control" name="departamento" id="departamento" aria-describedby="helpId" placeholder="Ingrese el departamento">
                        </p>
                        <p>
                            <label for="nit" class="form-label">Nit</label>
                            <input type="number"
                            value = "<?php if(isset($nit)) echo $nit;?>"
                            class="form-control" name="nit" id="nit" aria-describedby="helpId" placeholder="Ingrese el nit de la finca">
                        </p>
                        <p>
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                            value = "<?php if(isset($password)) echo $password;?>"
                            class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Ingrese su contraseña">
                        </p>
                        <p class="block">
                            <label for="propietario" class="form-label">Propietario</label>
                            <input type="text"
                            value = "<?php if(isset($propietario)) echo $propietario;?>"
                            class="form-control" name="propietario" id="propietario" aria-describedby="helpId" placeholder="Ingrese el propietario de la finca">
                        </p>
                        <p class="block">
                            <button type="submit" >Guardar Cambios</button>
                        </p>
                    </form>
                </div>
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