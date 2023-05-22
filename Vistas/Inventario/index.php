<?php include("../../Templates/header.php") ?>
<?php

    require_once("c://xampp/htdocs/FullDevCode/Controladores/InventarioController.php");
    $usurioId = $_SESSION['usuarioId'];
    $controlador = new InventarioController();
    $listadoproductos = $controlador->Listar($usurioId);


    if(isset($_GET['txtID']))
    {
        $txtId = (isset($_GET['txtID'])?$_GET['txtID']:"");
        $controlador->Eliminar($txtId);
    }

?>

<div class="card" id="">
        <div class="content">
            <div class="title">
            <center><h1 id="Titulo"><strong>Inventario</strong></h1></center>
            </div>
            <div class="card-body">
                <a name="" id="btncrear" class="btn" href="crear.php" role="button">Agegrar</a>
            </div>
            <div class="table-responsive-sm">
                <table class="table" id="tabla_id">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Distribuidor</th>
                            <th>Cantidad</th>
                            <th>Lote</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listadoproductos as $productos) { ?>
                            <tr>
                                <td><?php echo $productos['Nombre']?></td>
                                <td><?php echo $productos['Distribuidor']?></td>
                                <td><?php echo $productos['Cantidad']?></td>
                                <td><?php echo $productos['Lote']?></td>
                                <td>
                                    <a id="editar" class="btn" href="editar.php?txtID=<?php echo $productos['Id'];?>" role="button">Editar</a>
                                    <a id="borrar" class="btn" href="javascript:borrar(<?php echo $productos['Id']; ?>);" role="button">Borrar</a>
                                    <a id="agregar" class="btn" href="agregar.php?txtID=<?php echo $productos['Id'];?>" role="button">Agregar</a>
                                    <a id="sustraer" class="btn" href="sustraer.php?txtID=<?php echo $productos['Id'];?>" role="button">Sustraer</a>
                                    <a id="detalle" class="btn" href="detalle.php?txtID=<?php echo $productos['Id'];?>" role="button">Detalle</a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include("../../Templates/footer.php") ?>
