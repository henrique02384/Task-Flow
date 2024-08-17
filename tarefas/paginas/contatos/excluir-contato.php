<header>
    <h3>excluir contato</h3>    

<header>

<?php
// Captura o ID do contato a ser excluído a partir da URL e sanitiza para evitar injeções de SQL
$idcontato = mysqli_real_escape_string($conexao, $_GET["idcontato"]);

// Monta a consulta SQL para excluir o contato com o ID específico
$sql = "DELETE FROM contatos WHERE idcontato = '{$idcontato}'";

// Executa a consulta SQL para excluir o registro e trata erros, exibindo uma mensagem se houver falha
mysqli_query($conexao, $sql) or die("Erro ao excluir o registro: " . mysqli_error($conexao));

// Exibe uma mensagem de sucesso ao usuário informando que o registro foi excluído
echo "Registro excluído com sucesso!";
?>
