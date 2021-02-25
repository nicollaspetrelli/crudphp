<?php if(isset($_GET['del'])) { 
    
    // Veritifca se o ID existe antes de mostrar o Modal
    $idDel = $_GET['del'];
    $sqlConfirmIdDel = "SELECT id FROM usuarios WHERE id = '{$idDel}'";
    $result = $conn->query($sqlConfirmIdDel);

    $conn->close();

    if($result->num_rows <= 0) {
        header('Location: index.php');
        return;
    }

?>

<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Confirme sua ação</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <h5 class="mb-4">Você tem certeza de deseja remover esse usúario?</h5>
            

                <div class="text-end mx-3">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>

                    <form action="actions/delete.php" method="post" class="d-inline">
                        <input type="hidden" name="delId" value="<?php echo $_GET['del'] ?>">
                        <button type="submit" class="btn btn-danger" id="deleteBtn"> <?php include 'assets/icons/icon-trash.html' ?> Deletar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>