<?php include("../../Templates/header.php"); ?>
<?php
    require_once("c://xampp/htdocs/FullDevCode/Controladores/HerramientaController.php");
    require_once("c://xampp/htdocs/FullDevCode/Modelos/HerramientaViewModel.php");
    $herramientaController = new HerramientaController();

    if($_POST)
    {
        $validacion = false;
        $id = 0;
        $mensaje = "";
        $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");
        $fabricante = (isset($_POST['fabricante'])?$_POST['fabricante']:"");
        $fechadecompra = (isset($_POST['fechadecompra'])?$_POST['fechadecompra']:"");
        $cantidad = (isset($_POST['cantidad'])?$_POST['cantidad']:"");
        $usuarioId = $_SESSION['usuarioId'];

        $validacion = $herramientaController->ExisteCrear($nombre,$usuarioId,$fabricante);

        if($validacion == false)
        {
            $Herramientas = new Herramienta($id,$nombre,$fabricante,$cantidad,$fechadecompra,$usuarioId);
            $herramientaController->Registrar($Herramientas->GETNombre(),$Herramientas->GETFabricante(),
            $Herramientas->GETCantidad(),$Herramientas->GETFechaDeCompra(),$Herramientas->GETUsuarioId());
        }
        else
        {
            $mensaje = "La herramienta ya se encuentra creada en el sistema";
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
