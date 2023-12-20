<?php
session_start();
require_once('Mysql.php');

$consulta = "SELECT Id_produto, Nome_produto, Preco, Quantidade_estoque FROM produtos";
$resultado = $conexao->query($consulta);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Street Store</title>
</head>

<body>

    <nav>
        <div class="nav_logout">
            <a href="Cadastro E Login/login.php">Log-in</a>|
        </div>
        <div class="nav_logo">
            <h1>Street Store</h1>
            <img src="/img/Logo em branco.jpg" alt="" width="10px">
        </div>
        <div class="nav_market">
            <a class="btheader" href="Cadastro E Login/login.php">
                <img src="Imagens/Carrinho.png" alt="" width="40px">
            </a>
        </div>
    </nav>

    <section class="subnavbar">
        <ul>
            <li><a href="Cadastro E Login/cadastro.php">Cadastro</a></li>
            <li><a href="#">Produtos</a></li>
            <li><a href="#">Sobre Nós</a></li>
        </ul>
        </nav>

        <section class="produtos">
            <?php
            $select = $conexao->prepare("SELECT * FROM produtos");
            $select->execute();
            $result = $select->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='produtos'>";
                    echo "<div class='produto'>";
                    echo "<img src='img/" . $row["Id_produto"] . ".JPG' alt='" . $row["Nome_produto"] . "'>";
                    echo "<div class='produto-detalhes'>";
                    echo "<h2>" . $row["Nome_produto"] . "</h2>";
                    echo "<h2> R$ " . $row["Preco"] . ",00 </h2>";
                    echo "<p>" . $row["Descricao"] . "</p>";
                    echo "<p>Estoque: " . $row["Quantidade_estoque"] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Nenhum produto encontrado no banco de dados.";
            }
            $conexao->close();
            ?>
        </section>

        <footer>
        <p>&copy; 2023 Eduardo Corrêa Brito (MSCODE)</p>
        </footer>
</body>

</html>

