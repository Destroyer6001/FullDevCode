<?php include("../../Templates/header.php") ?>
<?php
    require_once("c://xampp/htdocs/FullDevCode/Controladores/LotesController.php");

    $Lote = new LotesController();
    $usuarioId = $_SESSION['usuarioId'];
    $listadolotes = $Lote->ListarLotes($usuarioId);

    if(isset($_GET['txtID']))
    {
        $txtId = (isset($_GET['txtID'])?$_GET['txtID']:"");
        $Lote->Eliminar($txtId);
    }



?>

<div class="card" id="">
        <div class="content">
            <div class="title">
            <center><h1 id="Titulo"><strong>Lotes</strong></h1></center>
            </div>
            <div class="card-body">
                <a name="" id="btncrear" class="btn" href="crear.php" role="button">Agegrar</a>
            </div>
            <div class="table-responsive-sm">
                <table class="table" id="tabla_id">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tamaño</th>
                            <th>Cultivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listadolotes as $lotes) { ?>
                            <tr>
                                <td><?php echo $lotes['Nombre']?></td>
                                <td><?php echo $lotes['Tamano']?>Mts</td>
                                <td><?php echo $lotes['nombrecultivo']?></td>
                                <td>
                                    <a id="editar" class="btn" href="editar.php?txtID=<?php echo $lotes['Id'];?>" role="button">Editar</a>
                                    <a id="borrar" class="btn" href="javascript:borrar(<?php echo $lotes['Id']; ?>);" role="button">Borrar</a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>





<?php include("../../Templates/footer.php") ?>
