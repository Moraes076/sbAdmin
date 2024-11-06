<?php
// Verificar se o usuário está logado
require_once './utils/auth.php';
checkLogin();
?>

<?php include './views/includes/header.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Perfil de Usuário
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Imagem de Perfil</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2" src="<?= $result['img_perfil'] ?>" alt="" />
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">Formatos aceitos: JPG ou PNG.<br>Resolução recomendada: 300x300 pixels.</div>
                            <hr class="my-4" />
                            <!-- Profile picture upload button-->
                            <form action="./index.php?action=upload" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="img-perfil" class="c-file-label">Escolha uma imagem de perfil</label>
                                    <input type="file" class="c-file-input" id="img-perfil" name="img-perfil" accept="image/png, image/jpg, image/jpeg">
                                    <div id="file-name" class="c-file-name"></div>
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar Imagem</button>
                            </form>
                            <script>
                                document.getElementById('img-perfil').addEventListener('change', function() {
                                    var fileName = this.files[0].name;
                                    document.getElementById('file-name').textContent = fileName;
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Detalhes</div>
                        <div class="card-body">
                            <form>
                                <!-- Form Group (nome)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Nome</label>
                                    <input class="form-control" id="inputNome" type="text" placeholder="Digite seu nome" value="<?= $result['nome'] ?>" />
                                </div>
                                <!-- Form Group (email)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control" id="inputEmailAddress" type="email" placeholder="Digite seu email" value="<?= $result['email'] ?>" />
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (nova senha)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Nova Senha</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Digite a nova senha" value="" />
                                    </div>
                                    <!-- Form Group (confirmação da senha)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Confirme a senha</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Digite a senha para confirmar" value="" />
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="button">Salvar alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>


<?php include './views/includes/footer.php'; ?>