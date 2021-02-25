<?php if(isset($_GET['show'])) { ?>


<?php

    $idShow = $_GET['show'];

    $sqlShow = "SELECT * FROM usuarios WHERE id = '{$idShow}'";

    $resultShow = $conn->query($sqlShow);

    if($resultShow->num_rows <= 0){
        $conn->close();
        header('Location: index.php');
        return;
    }

    $dataShow = $resultShow->fetch_assoc();

    $conn->close();

?>

<!-- Modal -->

<div class="modal fade" id="showModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Informações do Usuário</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mb-3">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?= $dataShow['nome'] ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Sobrenome" value="<?= $dataShow['sobrenome'] ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="contato">Contato</label>
                <input type="text" class="form-control" name="contato" id="contato" placeholder="Contato" value="<?= $dataShow['contato'] ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="datanasc">Data de Nascimento</label>
                <input type="date" class="form-control" name="datanasc" id="datanasc" placeholder="dd/mm/yyyy" value="<?= $dataShow['datanasc'] ?>" disabled>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="status" name="status" value="1" <?php echo $dataShow['status'] ? 'checked' : '' ?> disabled>
                <label class="form-check-label" for="status">Esse usuário está ativo?</label>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>

<?php } ?>
