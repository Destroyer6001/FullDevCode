<?php include ("../../Templates/header.php");?>
<?php
    require_once("c://xampp/htdocs/FullDevCode/Controladores/InventarioController.php");
    require_once("c://xampp/htdocs/FullDevCode/Controladores/MovimientoInventarioController.php");
    $controlador = new InventarioController();
    $controladormovimientos = new MovimientosInventarioController();
    if($_GET['txtID'])
    {
        $txtId = (isset($_GET['txtID'])?$_GET['txtID']:"");
        $Producto = $controlador->Obtener($txtId);
        $Movimientos = $controladormovimientos->ListarMovimientos($txtId);

        $nombre = $Producto['Nombre'];
        $fechadevencimiento = $Producto['FechaDeVencimiento'];
        $distribuidor = $Producto['Distribuidor'];
        $cantidad = $Producto['Cantidad'];
        $lote = $Producto['Lote'];
        $fechadecompra = $Producto['FechaDeCompra'];
    }

?>

<a id="Regresar" class="btn btn-primary" href="index.php" role="button"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>&nbsp <strong>Regresar</strong></a>
<div class="card" id="cardindexpuestos">
    <div class="content">
        <div class="title">
            <center><h1 id="Titulo"><strong>Detalle</strong></h1></center>
        </div>
        <div class="card-body">
            <p class="col-md-8 fs-4" id="titulo">Nombre : <?php echo $nombre;?></p>
            <p class="col-md-8 fs-4" id="titulo">Distribuidor : <?php echo $distribuidor;?></p>
            <p class="col-md-8 fs-4" id="titulo">Cantidad : <?php echo $cantidad;?></p>
            <p class="col-md-8 fs-4" id="titulo">Fecha De Compra : <?php echo $fechadecompra;?></p>
            <p class="col-md-8 fs-4" id="titulo">Fecha De Vencimiento : <?php echo $fechadevencimiento;?></p>
            <p class="col-md-8 fs-4" id="titulo">Lote : <?php echo $lote;?></p>
            <br>
            <center><h3>Listado De Movimientos</h3></center>
            <br>
            <div class="table-responsive-sm">
                <table class="table" id="tabla_id">
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Fecha De Movimiento</th>
                            <th>Tipo De Movimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($Movimientos as $movimiento) { ?>
                            <tr>
                                <td><?php echo $movimiento['Cantidad']?></td>
                                <td><?php echo $movimiento['FechaDeCambio']?></td>
                                <td><?php echo $movimiento['TipoDeMovimiento']?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php include ("../../Templates/footer.php");?>
