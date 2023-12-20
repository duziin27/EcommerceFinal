<?php
require_once('../Mysql.php');
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../Cadastro E Login/login.php");
    exit;
}

$consulta = "SELECT Id_produto, Nome_produto, Preco, Quantidade_estoque FROM produtos";
$resultado = $conexao->query($consulta);

if(isset($_GET['id'])){
    $Id = $_GET['id'];
    $consulta = "SELECT * FROM produtos WHERE Id_produto = $Id";
    $produto = $conexao->query($consulta);
    $resultado = $produto->fetch_assoc();
    $Nome_produto = $resultado['Nome_produto'];
    $Id_produto = $resultado['Id_produto'];
    $Preco = $resultado['Preco'];
    $Quantidade = 1;
    $Genero = $resultado['Genero'];
    $Descricao = $resultado['Descricao'];
    $Estado = "Adicionado";
    $Usuario = $_SESSION['usuarioId'];
    $data = date('Y-m-d');
    $adicionar_carrinho = "INSERT INTO carrinho(id, Nome_produto, Id_cadastro, Id_produto, Quantidade, Preco, Descricao, Data_compra, Genero, Estado) VALUES ( '', '$Nome_produto', '$Usuario', '$Id_produto', '$Quantidade', '$Preco','$Descricao', '$data', '$Genero', '$Estado')";
    $add = $conexao->query($adicionar_carrinho);
    
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Produtos.css">

    <title>Street Store</title>
</head>

<body>

    <nav>
        <div class="nav_logout">
            <a href="../logout.php">Log-out</a>|
            <p> Olá,
                <?php echo $_SESSION['usuario']; ?>!
            </p>
        </div>
        <div class="nav_logo">
            <a href="Produtos.php"><h1>Street Store</h1></a>
        </div>
        <div class="nav_carrinho">
            <a class="btheader" href="../Carrinho/Carrinho.php">
                <img src="../Imagens/Carrinho.png" alt="" width="40px">
            </a>
        </div>
    </nav>

        <section class="produtos">
            <?php
             $select = $conexao->prepare("SELECT * FROM produtos");
             $select->execute();
 
             // Obter o resultado da consulta
             $result = $select->get_result();
            ?>



            <?php foreach ($result as $lista) : ?>

                <div class="produtos">
                    <div class="produto">
                        <div class="top">
                            <img class="icone" src="../" alt="">
                        </div>
                        <img src="../Produtos/img/<?= $lista['Id_produto'] ?>.JPG">
                        <p class="ptxt"><b><?= $lista['Nome_produto'] ?></b></p>
                        <p class="ptxt"><?= $lista['Descricao'] ?></p>
                        <div class="valores">
                            <p><b>R$<?= $lista['Preco'] ?>,00</b></p>
                            <p><span><?= $lista['Quantidade_estoque'] ?></span> unidades disponiveis</p>
                        </div>
                        <br>
                        <a class="comprar" href="?id=<?= $lista["Id_produto"] ?>"><span>Adicionar ao carrinho</span></a>
                    </div>
                </div>

            <?php endforeach; ?>

                
          
        </section>

        <footer>
            <p>&copy;MSCODE 2023</p>
        </footer>
</body>

</html>