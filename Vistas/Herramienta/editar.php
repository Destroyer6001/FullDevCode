<?php include("../../Templates/header.php"); ?>
<?php
    require_once("c://xampp/htdocs/FullDevCode/Controladores/HerramientaController.php");
    require_once("c://xampp/htdocs/FullDevCode/Modelos/HerramientaViewModel.php");
    $herramientasController = new HerramientaController();
    if($_GET['txtID'])
    {
        $txtId = (isset($_GET['txtID'])?$_GET['txtID']:"");
        $resultadodebusqueda = $herramientasController->ObtenerHerramienta($txtId);
        $nombre = $resultadodebusqueda['Nombre'];
        $fabricante = $resultadodebusqueda['Fabricante'];
        $fechadecompra = $resultadodebusqueda['FechaDeCompra'];
        $cantidad = $resultadodebusqueda['Cantidad'];
        $txtUsuarioId = $resultadodebusqueda['UsuarioId'];
    }

    if($_POST)
    {
        $validacion = false;
        $mensaje = "";
        $txtId = (isset($_POST['txtid'])?$_POST['txtid']:"");
        $txtUsuarioId = (isset($_POST['txtusuarioid'])?$_POST['txtusuarioid']:"");
        $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");
        $fabricante = (isset($_POST['fabricante'])?$_POST['fabricante']:"");
        $cantidad = (isset($_POST['cantidad'])?$_POST['cantidad']:"");
        $fechadecompra = (isset($_POST['fechadecompra'])?$_POST['fechadecompra']:"");

        $validacion = $herramientasController->ExisteEditar($nombre,$txtUsuarioId,$fabricante,$txtId);

        if($validacion == false)
        {
            $herramientas = new Herramienta($txtId,$nombre,$fabricante,$cantidad,$fechadecompra,$txtUsuarioId);
            $herramientasController->Actualizar($herramientas->GETId(),$herramientas->GETNombre(),
            $herramientas->GETFabricante(),$herramientas->GETCantidad(),$herramientas->GETFechaDeCompra(),
            $herramientas->GETUsuarioId());
        }
        else
        {
            $mensaje = "La herramienta ya se encuentra registrada en el sistema";
        }

    }
?>
<a id="Regresar" class="btn btn-primary" href="index.php" role="button"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>&nbsp <strong>Regresar</strong></a>
<div class="content-formularios">
    <h1 class="titulo">Registrar Herramienta</h1>
        <div class="formulario-registro">
            <div class="formulario">
                <?php if(isset($mensaje)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo $mensaje; ?></strong>
                    </div>
                <?php } ?>
                <form action="" method="post">
                    <input type="hidden"
                    value = "<?php echo $txtId;?>" class="form-control" name="txtid" id="txtid" aria-describedby="helpId" placeholder="">

                    <input type="hidden"
                    value = "<?php echo $txtUsuarioId;?>" class="form-control" name="txtusuarioid" id="txtusuarioid" aria-describedby="helpId" placeholder="">

                    <p>
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text"
                        value = "<?php if(isset($nombre)) echo $nombre;?>"
                        class="form-control" name="nombre" required id="nombre" aria-describedby="helpId" placeholder="Ingrese nombre de la herramienta">
                    </p>
                    <p>
                        <label for="fabricante" class="form-label">Fabricante</label>
                        <input type="text"
                        value = "<?php if(isset($fabricante)) echo $fabricante;?>"
                        class="form-control" name="fabricante" required id="fabricante" aria-describedby="helpId" placeholder="Ingrese el fabricante de la herramienta">
                    </p>
                    <p>
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number"
                        value = "<?php if(isset($cantidad)) echo $cantidad;?>"
                        class="form-control" name="cantidad" required id="cantidad" aria-describedby="helpId" placeholder="Ingrese la cantidad de herramientas">
                    </p>
                    <p>
                        <label for="fechadecompra" class="form-label">Fecha De Compra</label>
                        <input type="date"
                        value = "<?php if(isset($fechadecompra)) echo $fechadecompra;?>"
                        class="form-control" name="fechadecompra" required id="fechadecompra" aria-describedby="helpId" placeholder="Ingrese la fecha de compra">
                    </p>
                    <br>
                    <p class="boton">
                        <button type="submit" >Registrar</button>
                    </p>
                </form>
            </div>
        </div>
</div>



<?php include("../../Templates/footer.php"); ?>
