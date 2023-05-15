<?php include("../../Templates/header.php");?>
<?php
    require_once("c://xampp/htdocs/FullDevCode/Controladores/LaborController.php");
    $labor = new LaborController();
    $usuarioId = $_SESSION['usuarioId'];
    $listadodelabores = $labor->ListarLabores($usuarioId);

    if(isset($_GET['txtID']))
    {
        $txtId = (isset($_GET['txtID'])?$_GET['txtID']:"");
        $labor->Eliminar($txtId);
    }


?>
<div class="card" id="">
        <div class="content">
            <div class="title">
            <center><h1 id="Titulo"><strong>Labores</strong></h1></center>
            </div>
            <div class="card-body">
                <a name="" id="btncrear" class="btn" href="crear.php" role="button">Agegrar</a>
            </div>
            <div class="table-responsive-sm">
                <table class="table" id="tabla_id">
                    <thead>
                        <tr>
                            <th>Labor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listadodelabores as $labores) { ?>
                            <tr>
                                <td><?php echo $labores['Nombre']?></td>
                                <td>
                                    <a id="editar" class="btn" href="editar.php?txtID=<?php echo $labores['Id'];?>" role="button">Editar</a>
                                    <a id="borrar" class="btn" href="javascript:borrar(<?php echo $labores['Id']; ?>);" role="button">Borrar</a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include("../../Templates/footer.php");?>
