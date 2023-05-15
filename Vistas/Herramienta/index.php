<?php include("../../Templates/header.php"); ?>
<?php
    require_once("c://xampp/htdocs/FullDevCode/Controladores/HerramientaController.php");
    $HerramientaController = new HerramientaController();
    $usuarioId = $_SESSION['usuarioId'];
    $listadoherramientas = $HerramientaController->ListarHerramientas($usuarioId);

    if(isset($_GET['txtID']))
    {
        $txtId = (isset($_GET['txtID'])?$_GET['txtID']:"");
        $HerramientaController->Eliminar($txtId);
    }

?>

<div class="card" id="">
        <div class="content">
            <div class="title">
            <center><h1 id="Titulo"><strong>Herramientas</strong></h1></center>
            </div>
            <div class="card-body">
                <a name="" id="btncrear" class="btn" href="crear.php" role="button">Agegrar</a>
            </div>
            <div class="table-responsive-sm">
                <table class="table" id="tabla_id">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fabricante</th>
                            <th>Cantidad</th>
                            <th>Fecha De Compra</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listadoherramientas as $herramientas) { ?>
                            <tr>
                                <td><?php echo $herramientas['Nombre']?></td>
                                <td><?php echo $herramientas['Fabricante']?></td>
                                <td><?php echo $herramientas['Cantidad']?></td>
                                <td><?php echo $herramientas['FechaDeCompra']?></td>
                                <td>
                                    <a id="editar" class="btn" href="editar.php?txtID=<?php echo $herramientas['Id'];?>" role="button">Editar</a>
                                    <a id="borrar" class="btn" href="javascript:borrar(<?php echo $herramientas['Id']; ?>);" role="button">Borrar</a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include("../../Templates/footer.php"); ?>
