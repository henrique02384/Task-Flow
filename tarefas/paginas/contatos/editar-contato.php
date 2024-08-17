<link rel="stylesheet" href="css/editar.css">
<?php
// Captura o ID do contato a ser editado a partir da URL
$idcontato = $_GET["idcontato"];

// Monta a consulta SQL para selecionar todos os dados do contato com o ID específico
$sql = "SELECT * FROM contatos WHERE idcontato = {$idcontato}";

// Executa a consulta SQL e trata erros, exibindo uma mensagem caso haja falha
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados dos registros: " . mysqli_error($conexao));

// Recupera os dados do contato em um array associativo
$dados = mysqli_fetch_assoc($rs);
?>
 <style>
        .form {
            position: relative;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .form img {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 80px;
            height: auto;
            z-index: 1;
            margin-left: -18px;
            margin-top: -20px;
        }

        .form h3 {
            margin-left: 100px;
        }
        
    </style>
   

   <main>
        
    <div class="form">
        <form action="index.php?menuop=atualizar-contato" method="post">
        <div>
           

            <div class="col-6">
    <img src="./paginas/contatos/fotos-contatos/semfoto.png" alt="foto do contato">
</div>
               
                <input type="text" name="idContato" placeholder="Id" value="<?= $dados["idContato"] ?>">
            </div>
            <div>

                
                <input type="text" name="nomeContato" placeholder="Nome" value="<?= $dados["nomeContato"] ?>">
            </div>
            <div>
                
                <input type="email" name="emailContato" placeholder="Email" value="<?= $dados["emailContato"] ?>">

                <div>
                
                <input type="number" name="telefoneContato" placeholder="Telefone" value="<?= $dados["telefoneContato"] ?>">
            </div>
            <div>
              
                <input type="text" name="enderecoContato" placeholder="Endereço" value="<?= $dados["enderecoContato"] ?>">
            </div>
            <div>
               
                <input type="text" name="sexoContato" placeholder="Sexo" value="<?= $dados["sexoContato"] ?>">
            </div>
                
            <div>
           
                <input type="date" name="dataContato" placeholder="Data de Nascimento" value="<?= $dados["dataContato"] ?>">
            </div>
            <div>
                <input type="submit" value="atualizar" name="atualizar" Id="add">
                </div>
        
                

</form>
    
</div>

</main>