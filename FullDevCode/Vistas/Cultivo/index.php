<?php include("../../Templates/header.php") ?>

<?php
    require_once("c://xampp/htdocs/FullDevCode/Controladores/CultivoController.php");
    $cultivo = new CultivoController();
    $usuarioId = $_SESSION['usuarioId'];
    $listadecultivos = $cultivo->ListarCultivos($usuarioId);


    if(isset($_GET['txtID']))
    {
        $txtId = (isset($_GET['txtID'])?$_GET['txtID']:"");
        $cultivo->BorrarCultivo($txtId);
    }

?>


    <div class="card" id="">
        <div class="content">
            <div class="title">
            <center><h1 id="Titulo"><strong>Index</strong></h1></center>
            </div>
            <div class="card-body">
                <a name="" id="btncrear" class="btn" href="crear.php" role="button">Agegrar</a>
            </div>
            <div class="table-responsive-sm">
                <table class="table" id="tabla_id">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listadecultivos as $cultivos) { ?>
                            <tr>
                                <td><?php echo $cultivos['Nombre']?></td>
                                <td>
                                    <a id="editar" class="btn" href="editar.php?txtID=<?php echo $cultivos['Id'];?>" role="button">Editar</a>
                                    <a id="borrar" class="btn" href="javascript:borrar(<?php echo $cultivos['Id']; ?>);" role="button">Borrar</a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>


<?php include("../../Templates/footer.php") ?>