<?php
require_once('../Mysql.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["Nome_cliente"];
    $sobrenome = $_POST["Sobrenome"];
    $email = $_POST["Email"];
    $senha = password_hash($_POST["Senha"], PASSWORD_DEFAULT);
    $confirmaSenha = $_POST["confirmar_senha"];
    $nascimento = $_POST["Nascimento"];
    $genero = $_POST["Genero"];
    $numero = $_POST["Numero"];
    $cidade = $_POST["Cidade"];
    $estado = $_POST["Estado"];

    $sql_cadastro = "INSERT INTO clientes (Nome_cliente, Sobrenome, Email, Senha, Numero, Nascimento, Genero, Cidade, Estado) VALUES('$nome', '$sobrenome', '$email', '$senha', '$numero', '$nascimento', '$genero' ,'$cidade', '$estado')";
    $conexao->query($sql_cadastro);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        header("Location: login.php");
        exit();
    }
    $conexao->close();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="cadastro.css">
</head>

<body>
    <main>
        <form action="" method="post">
            <h1>
                <b>FAÇA SEU CADASTRO!</b>
            </h1>

            <div class="tudo">
                <form action="" class="cadastro">

                        <div>
                            <label for="uname">Digite seu nome:</label>
                            <input type="text" class="form-control" id="nome" placeholder="Digite seu nome" name="Nome_cliente" required>
                        </div>
                        <div>
                            <label for="uname">Digite seu sobrenome:</label>
                            <input type="text" class="form-control" id="sobrenome" placeholder="Digite seu sobrenome" name="Sobrenome" required>
                        </div>

                        <div>
                            <label for="unum">Digite seu e-mail:</label>
                            <input type="email" class="form-control" id="email" placeholder="Digite seu email" name="Email" required>
                        </div>
                        
                        <div>
                            <label for="pwd">Digite sua senha:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Digite sua senha" name="Senha" minlength="6" required>
                        </div>
                        <div>
                            <label for="unum">Digite seu numero:</label>
                            <input type="number" class="form-control" id="email" placeholder="Digite seu numero" name="Numero" required>
                        </div>

                        <div>
                            <label for="iidade">Digite sua data de nascimento:</label>
                            <input class="form-control" type="date" name="Nascimento" id="inascimento" required>
                        </div>
                        <div>
                            <label for="Estado">Genero:</label>
                            <select class="form-control" id="genero" name="Genero" required>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                <option value="X">Prefiro não responder</option>
                            </select>
                        </div>

                        <div>
                            <label for="cidade">Cidade:</label>
                            <input class="form-control" type="text" id="cidade" name="Cidade" required>
                        </div>
                        <div>
                            <label for="estado">Estado:</label>
                            <select class="form-control" id="estado" name="Estado" required>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal </option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goías</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>



                    <div class="check">
                        <input type="checkbox" name="Termo" id="" required>
                        <p>Eu aceito os <a href="#">Termos e Política de privacidade</a>
                        deste site.</p>
                    </div>

                    <br>
                    <a href="login.php"><button type="submit" class="">Concluir cadastro</button></a>
                    <br><br>
                    <p class="login">Ja possui um cadastro? Faça o <a href="login.php">Log-in.</a></p><br>

                </form>
            </div>
        </form>
    </main>
</body>


</html>