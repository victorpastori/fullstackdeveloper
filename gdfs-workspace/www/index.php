<?php

require_once 'entities/repositories/CidadeRepository.php';
require_once 'entities/repositories/CategoriaRepository.php';
require_once 'entities/repositories/HistoricoCalculosRepository.php';

$ok = true;

try {
    $cidades = (new CidadeRepository())->getAll();
    $categorias = (new CategoriaRepository())->getAll();
    $historico = (new HistoricoCalculosRepository())->getAll();
} catch (PDOException $e) {
    $ok = false;
}
?>
<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Gaudium Software - Prova Desenvolvedor Full Stack</title>
</head>
<body>
<main role="main">
    <div class="container mx-auto">
        <div class="row">
            <h1 class="mx-auto"><img src="assets/gaudium-logo.png" alt="Gaudium logo" width=100/> Gaudium Software</h1>
        </div>
        <div class="row">
            <h2 class="mx-auto">Prova Desenvolvedor Full Stack</h2>
        </div>
        <div class="row pt-5">
            <div class="col-sm-6">
                <form id="form_calculo_estimativa" action="/api/calculo.php" method="post">
                    <div class="form-group">
                        <label for="select_cidade">Selecione a cidade</label>
                        <select class="form-control" id="select_cidade" name="cidade_id" required>
                            <?php foreach ($cidades as $cidade){ ?>
                                <option value="<?= $cidade['id'] ?>"><?= $cidade['nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="select_categoria">Selecione a categoria</label>
                        <select class="form-control" id="select_categoria" name="categoria_id" required>
                            <?php foreach ($categorias as $categoria){ ?>
                                <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ipt_endereco_origem">Digite seu endereço de origem</label>
                        <input class="form-control" type="text" id="ipt_endereco_origem" name="endereco_origem" required>
                    </div>

                    <div class="form-group">
                        <label for="ipt_endereco_destino">Digite seu endereço de destino</label>
                        <input class="form-control" type="text" id="ipt_endereco_destino" name="endereco_destino" required>
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">Efetuar estimativa</button>
                </form>
            </div>
            <div class="col-sm-6" id="section_historico">
                <?php foreach ($historico as $item){ ?>
                    <p>Em <?= $item['cidade'] ?>, <?= $item['categoria'] ?>, de <?= $item['endereco_origem'] ?> para <?= $item['endereco_destino'] ?>, às <?= $item['horario'] ?>: R$ <?= number_format($item['valor']/100, 2, ',', '.') ?></p>
                <?php } ?>
            </div>
        </div>
    </div> <!-- /container -->
</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script src="assets/custom.js"></script>
</body>
</html>