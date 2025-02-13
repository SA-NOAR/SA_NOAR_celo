<?php
include('protect.php');
include('connect_usuarios.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOAR</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js&quot;" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rHyoN1iRsVXV4nDqrl75q8eBsO5HAk6I" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="editor.css">
</head>

<body>

    <header>
        <div class="voltar">
            <a href="usuarios.php">Voltar</a>
        </div>
    </header>

    <?php
    if ($editUsuarioId !== null) {
        // Recupera os dados do usuário com base no ID fornecido para edição
        $query = "SELECT id_atendente, nome, cpf, email, tipo, senha FROM atendente WHERE id_atendente = $editUsuarioId";
        $result = $conn->query($query);
        $usuario = $result->fetch_assoc();
    ?>
        <div class="card-card">
            <h5 class="titulo">Editar Usuário</h5>

            <div class="form-caixa">
                <form method="POST">
                    <div class="texto">
                        <label for="novo_nome_completo" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="novo_nome_completo" name="novo_nome_completo" value="<?php echo $usuario['nome']; ?>" required>
                    </div>
                    <div class="texto">
                        <label for="novo_cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="novo_cpf" name="novo_cpf" value="<?php echo $usuario['cpf']; ?>" required>
                    </div>
                    <div class="texto">
                        <label for="novo_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="novo_email" name="novo_email" value="<?php echo $usuario['email']; ?>" required>
                    </div>
                    <div class="texto">
                        <label for="novo_tipo">Cargo</label>
                        <select class="form-control" name="novo_tipo">
                            <option value="Atendente" <?php echo ($usuario["tipo"] === "atendente") ? "selected" : ""; ?>>Atendente</option>
                            <option value="Bombeiro" <?php echo ($usuario["tipo"] !== "atendente") ? "selected" : ""; ?>>Bombeiro</option>
                            <option value="Outro" <?php echo ($usuario["tipo"] !== "atendente") ? "selected" : ""; ?>>Outro</option>
                        </select>
                    </div>
                    <div class="texto">
                        <label for="nova_senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="nova_senha" name="nova_senha" value="<?php echo $usuario['senha']; ?>" required>
                    </div>
                </div>
                <div id="botao-editar">
                    <button type="submit" class="botao">Salvar Alterações</button>
                </div>
                </form>
            </div>

    <?php
    }
    ?>
    </body>

</html>
