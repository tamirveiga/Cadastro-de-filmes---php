<?php

function form_nao_enviado() {
    return $_SERVER['REQUEST_METHOD'] !== 'POST';
}

function filme_em_branco() {
    return empty($_POST['filme']);
}

function form_em_branco() {
    return empty($_POST['usuario']) || empty($_POST['senha']);
}

function validar_codigo() {

    if (!isset($_GET['codigo'])) {
        return;
    }

    // recebemos o valor do código da URL
    $codigo = (int)$_GET['codigo'];

    switch ($codigo) { // verificar qual msg exibir na tela de acordo com o código recebido

        case 0: // erro não especificado
            $msg = "<h3>Ocorreu um erro com sua requisição. Por favor, tente novamente.</h3>";
            break;

        case 1: // acesso não autorizado
            $msg = "<h3>Você não tem permissão para acessar a página requisitada.</h3>";
            break;

        case 2: // form não submetido
            $msg = "<h3>Por favor, preencha todos os campos do form.</h3>";
            break;

        case 3: // usuário ou senha inválidos
            $msg = "<h3>Usuário ou senha inválidos! Por favor, tente novamente.</h3>";
            break;

        case 4: // erro de SQL
            $msg = "<h3>Ocorreu um erro ao acessar banco de dados. Por favor, contate
                    o suporte, ou tente novamente mais tarde</h3>";
            break;

        case 5: // erro ao excluir filme
            $msg = "<h3>Ocorreu um erro ao tentar excluir o filme selecionado. Por
             favor, contate o suporte, ou tente novamente mais tarde</h3>";
             break;

        default:
            $msg = "";
            break;
    }

    echo $msg;

}


?>