<?php
    session_start();
    $urlBase ="http://localhost:80/fulldevcode/";
    if($_SESSION['logueado'] == false)
    {
        header("Location:".$urlBase."login.php");
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
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous">
    </script> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">     
    </script>
    <script src="https://kit.fontawesome.com/d9353dd905.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/fulldevcode/Css/styles.css" />
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
    <header>
        <nav class="nav">
            <div class="logo">
                <a class="nav-link" href="<?php echo $urlBase; ?>"><span class="parte1"><strong>>_full</strong></span> <span class="parte2"><strong>dev</strong></span> <span class="parte3"><strong>code</strong></span></a>
            </div>
            <ul class="menu">
                <li>
                    <a class="nav-link" href="<?php echo $urlBase; ?>Vistas/Inventario/">Inventario</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo $urlBase; ?>Vistas/Cultivo/">Cultivos</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo $urlBase; ?>Vistas/Lote/">Lotes</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo $urlBase; ?>logout.php">Cerrar Sesion</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
    <?php if((isset($_GET['mensaje']))) {?>
    <script>
        Swal.fire({icon:"success",title:"<?php echo $_GET['mensaje'];?>"});
    </script>
    <?php }?>
