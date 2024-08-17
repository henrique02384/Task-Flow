    <link rel="stylesheet" href="css/cad.css">
    <!-- pagina do formulario de inserir novo contato-->
    <header>
        
        

    </header>
    <div class="form">
        <form  action="index.php?menuop=inserir-contato" method="post" >
        <h3>adicione novos Contatos</h3>
        <div>
                
                <input type="text" name="nomeContato" placeholder="Seu Nome" required >
            </div>
            <div>
                
                <input type="email" name="emailContato" placeholder="Email" riquired>

                <div>
                
                <input type="number" name="telefoneContato" placeholder="Telefone" riquired>
            </div>
            <div>
                
                <input type="text" name="enderecoContato" placeholder="Eendereço" required>
            </div>
            <div>
                
                <input type="text" name="sexoContato" placeholder="Sexo" required >
            </div>
                <label>Data de Nascimento :</label>
            <div>
                
                <input type="date" name="dataContato" placeholder="Data de Nascimento" required>
            </div>
            <div class="add">
                <input type="submit" value="adicionar" name="adicionar" class="btn btn-outline-success">
            </div>
        
            

</form>
    </div>