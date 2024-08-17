    <header>
        <h3>inserir contato</h3>
    </header>
    <?php
        // Obter os dados de entrada do formulário 
        $nomeContato = mysqli_real_escape_string($conexao,$_POST["nomeContato"]);
        $emailContato = mysqli_real_escape_string($conexao,$_POST["emailContato"]);
        $telefoneContato = mysqli_real_escape_string($conexao,$_POST["telefoneContato"]);
        $enderecoContato =  mysqli_real_escape_string($conexao,$_POST["enderecoContato"]);
        $sexoContato =  mysqli_real_escape_string($conexao,$_POST["sexoContato"]);
        $dataContato = mysqli_real_escape_string($conexao,$_POST["dataContato"]);  
        //inserindo  registros no banco de dados com sql
        $sql ="INSERT INTO contatos(nomeContato,emailContato,telefoneContato,enderecoContato,sexoContato,dataContato)
            VALUES(
            '{$nomeContato}',
            '{$emailContato}',
            '{$telefoneContato}',
            '{$enderecoContato}',
            '{$sexoContato}',
            '{$dataContato }'
            )
            ";

             mysqli_query($conexao,$sql) or die("erro ao execultar a consulta" . mysqli_error($conexao));

             echo "o contato foi adicionado com socesso!";
    ?>
