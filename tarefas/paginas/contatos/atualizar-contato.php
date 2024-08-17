<header>
    <h3>Atualizar Contatos</h3> 
</header>

    <?php
    // Obter os dados de entrada do formulário 
    $idContato = mysqli_real_escape_string($conexao, $_POST["idContato"]); 
    $nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]); 
    $emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]); 
    $telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]); 
    $enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]); 
    $sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]); 
    $dataContato = mysqli_real_escape_string($conexao, $_POST["dataContato"]); 

    // Consulta SQL para atualizar as informações do  banco de dados
    $sql = "UPDATE contatos 
    SET 
    nomeContato = '{$nomeContato}', 
    emailContato = '{$emailContato}', 
    telefoneContato = '{$telefoneContato}', 
    enderecoContato = '{$enderecoContato}', 
    sexoContato = '{$sexoContato}', 
        dataContato = '{$dataContato}' 
    WHERE idContato = '{$idContato}'";

        // Executa a consulta SQL e trata erros
        mysqli_query($conexao, $sql) or die("Erro ao executar a consulta: " . mysqli_error($conexao)); // Tratamento de erros

    // confirmação que o contatao foi atualizado com sucesso
    echo "O contato foi atualizado com sucesso!";
?>
