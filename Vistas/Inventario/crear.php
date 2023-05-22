<?php include("../../Templates/header.php"); ?>
<?php

    require_once("c://xampp/htdocs/FullDevCode/Controladores/InventarioController.php");

    $controlador = new InventarioController();

    if($_POST)
    {
        $validacion = false;
        $usuarioId = $_SESSION['usuarioId'];
        $id = 0;
        $mensaje = "";
        $fechactual = strtotime(date('Y-m-d'));
        $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");
        $distribuidor = (isset($_POST['distribuidor'])?$_POST['distribuidor']:"");
        $cantidad = (isset($_POST['cantidad'])?$_POST['cantidad']:"");
        $fechadecompra = (isset($_POST['fechadecompra'])?$_POST['fechadecompra']:"");
        $fechadevencimiento = (isset($_POST['fechadevencimiento'])?$_POST['fechadevencimiento']:"");
        $lote = (isset($_POST['lote'])?$_POST['lote']:"");

        $fechaformulario = strtotime(str_replace('/','-',$fechadevencimiento));
        $validacion = $controlador->ValidarCrear($usuarioId,$lote);

        if($validacion == false)
        {
            if($fechaformulario > $fechactual)
            {
                require_once("c://xampp/htdocs/FullDevCode/Modelos/InventarioViewModel.php");
                $producto = new Inventario($id,$nombre,$distribuidor,$fechadecompra,$cantidad,$fechadevencimiento,$usuarioId,$lote);
                $controlador->Registrar($producto->GETNombre(),$producto->GETDistribuidor(),$producto->GETCantidad(),
                $producto->GETFechaDeCompra(),$producto->GETFechaDeVencimiento(),$producto->GETUsuarioId(),
                $producto->GETLote());
            }
            else
            {
                $mensaje = "No se puede registrar un producto ya vencido";
            }
        }
        else
        {
            $mensaje = "El producto ya se encuentra registrado en el sistema";
        }
    }


?>

<a id="Regresar" class="btn btn-primary" href="index.php" role="button"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>&nbsp <strong>Regresar</strong></a>
<div class="content-formularios">
    <h1 class="titulo">Registrar Producto</h1>
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
                        class="form-control" name="nombre" required id="nombre" aria-describedby="helpId" placeholder="Ingrese nombre de la producto">
                    </p>
                    <p>
                        <label for="distribuidor" class="form-label">Distribuidor</label>
                        <input type="text"
                        value = "<?php if(isset($distribuidor)) echo $distribuidor;?>"
                        class="form-control" name="distribuidor" required id="distribuidor" aria-describedby="helpId" placeholder="Ingrese distribuidor del producto">
                    </p>
                    <p>
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number"
                        value = "<?php if(isset($cantidad)) echo $cantidad;?>"
                        class="form-control" name="cantidad" required id="cantidad" aria-describedby="helpId" placeholder="Ingrese de existencias del producto">
                    </p>
                    <p>
                        <label for="fechadecompra" class="form-label">Fecha De Compra</label>
                        <input type="date"
                        value = "<?php if(isset($fechadecompra)) echo $fechadecompra;?>"
                        class="form-control" name="fechadecompra" required id="fechadecompra" aria-describedby="helpId" placeholder="">
                    </p>
                    <p>
                        <label for="fechadevencimiento" class="form-label">Fecha De Vencimiento</label>
                        <input type="date"
                        value = "<?php if(isset($fechadevencimiento)) echo $fechadevencimiento;?>"
                        class="form-control" name="fechadevencimiento" required id="fechadevencimiento" aria-describedby="helpId" placeholder="">
                    </p>
                    <p>
                        <label for="lote" class="form-label">Lote</label>
                        <input type="text"
                        value = "<?php if(isset($lote)) echo $lote;?>"
                        class="form-control" name="lote" required id="lote" aria-describedby="helpId" placeholder="Ingrese el lote del producto">
                    </p>
                    <br>
                    <p class="boton">
                        <button type="submit" >Registrar</button>
                    </p>
                </form>
            </div>
        </div>
</div>

<?php include("../../Templates/footer.php");?>
