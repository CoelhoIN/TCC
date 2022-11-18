<!DOCTYPE html>
<html lang="pt-br">

<?php
include('conexaonl.php');
include('verifica_login.php');
include('cabecalho.php');

//session_start();
$cod_cliente = $_SESSION['codcliente'];
if ($cod_cliente == 1) {
    $hoje = date('Y-m-d');
    $sql = "SELECT * FROM agendamento WHERE dataagend > '$hoje' ORDER BY dataagend ASC";
} else {
    $hoje = date('Y-m-d');
    $sql = "SELECT * FROM agendamento WHERE cod_cliente=$cod_cliente ORDER BY dataagend DESC";
}
$rs = mysqli_query($conn, $sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="minhacontaestilo.css" />
    <title>Document</title>
</head>

<body>
<div class='main'>
    <div class='row container'>
        <div class='col-8'>
        <h3>Agendamento:</h3>
        <?php
            if ($cod_cliente == 1) { ?>
            <div class="box-search">
                <input type="search" class="form-control w-50" placeholder="Pesquisar" id="pesquisar">
                <button class="botao3 btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
            <?php } 
        ?>

        <table class='table'>
            <tr class ='tr'>
                <td>Data</td>
                <td>Horário</td>
                <td>Procedimento</td>
                <td>Descrição</td>
                <?php
                    if ($cod_cliente != 1) { ?>
                        <td class="text-center">Ação</td>
                    <?php } 
                ?>             
            </tr>

            <?php while ($dados = mysqli_fetch_array($rs)) {

                $sql = "SELECT * FROM agendamento AS a 
                INNER JOIN possui AS p ON a.codagend=p.cod_agend 
                INNER JOIN servicos AS s ON p.cod_serv=s.cod_serv 
                WHERE a.codagend={$dados['codagend']}";
                $query = mysqli_query($conn, $sql);
                $servicos = "";
                while ($serv = mysqli_fetch_array($query)) {
                    $servicos .= $serv['categoria'] . ", ";
                }
            ?>
                <tr class='tr2'>
                    <td><?php echo date('d/m/Y', strtotime($dados['dataagend'])) ?></td>
                    <td><?php echo date("H:i", strtotime($dados['horario'])) ?></td>
                    <td><?php echo $servicos ?></td>
                    <td style="width: 25%;"><?php echo $dados['descricao'] ?></td>

                    <?php
                        if ($cod_cliente != 1) { ?>
                        <td colspan="2" class="text-center">
                            <a class='botao1 btn btn-sm' href='editaragend.php?codagend=<?php echo $dados['codagend'] ?>'>Editar</a>
                            <a class='botao2 btn btn-sm' href='#' onclick='confirmar("<?php echo $dados['codagend'] ?>")'>Excluir</a>
                        </td>
                        <?php } 
                    ?>
                </tr>
            <?php } ?>
        </table>
        </div>

        
        <div class='col-4'>
        <h3>Cadastro:</h3>
        <?php
            if ($cod_cliente == 1) { ?>
            <div class="box-search">
                <input type="search" class="form-control w-100" placeholder="Pesquisar" id="pesquisar">
                <button class="botao3 btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
            <?php } 
        ?>

        <table class='table'>
            <tr class='tr'>
                <td>Nome</td>
                <td>Email</td>
                <td>Telefone</td>
                <?php
                    if ($cod_cliente != 1) { ?>
                        <td class="text-center">Ação</td>
                    <?php } 
                ?>
            </tr>
            <?php 
                if ($cod_cliente == 1) {
                $sql = "SELECT nome, email, telefone FROM cliente";
                } else {
                $sql = "SELECT nome, email, telefone FROM cliente where codcliente=$cod_cliente";
                }
                $rs= mysqli_query($conn,$sql);
                $linha = mysqli_fetch_array($rs);
            ?>
            <tr class='tr2'>
                    <td><?php echo $linha['nome'] ?></td>
                    <td><?php echo $linha['email'] ?></td>
                    <td><?php echo $linha['telefone'] ?></td>

                    <?php
                        if ($cod_cliente != 1) { ?>
                        <td colspan="2" class="text-center">
                            <a class='botao1 btn btn-sm' href='editarcliente.php?codcliente=<?php echo $dados['codcliente'] ?>'>Editar</a>
                            <a class='botao2 btn btn-sm' href='#' onclick='confirmar("<?php echo $dados['codcliente'] ?>")'>Excluir</a>
                        </td>
                        <?php } 
                    ?>
            </tr>
        </div>
        </table>
    </div>
</div>
    <script>
        function confirmar(codagend) {
            if (confirm('Você realmente deseja excluir esta linha?'))
                location.href = 'excluiragend.php?codagend=' + codagend;
        }
    </script>

    <footer id="rodape">
        <p> &copy; 2022. Salão de Beleza New Look | Todos os direitos reservados.</p>
    </footer>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>