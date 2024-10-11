<?php include './views/includes/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Pessoas</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="./pessoa.php?action=adicionar" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Nova Pessoa</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Id</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Idade</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Endereço</th>
                            <th>Observação</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $linha): ?>
                            <tr>
                                <td><?= $linha['id'] ?></td>
                                <td><?= $linha['nome'] ?></td>
                                <td><?= $linha['cpf'] ?></td>
                                <td><?= $linha['idade'] ?></td>
                                <td><?= $linha['telefone'] ?></td>
                                <td><?= $linha['email'] ?></td>
                                <td><?= $linha['endereco'] ?></td>
                                <td><?= $linha['observacao'] ?></td>
                                <td class="text-center">
                                    <a href="./pessoa.php?action=editar&id=<?= $linha['id'] ?>" class="btn btn-warning btn-circle">
                                        <i class="fas fa-list"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="./pessoa.php?action=excluir&id=<?= $linha['id'] ?>" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <tbody>
                </table>

            </div>
        </div>
        <div class="card-footer py-3">
            <h6 class="m-0 font-weight-bold text-primary">Total de Contatos: <?= count($result) ?></h6>
        </div>
    </div>

</div>

<?php include './views/includes/footer.php'; ?>