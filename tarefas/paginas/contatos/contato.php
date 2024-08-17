<link rel="stylesheet" href="css/contato.css">
<header>
    <h3>Contatos  <i class="bi bi-people"></i></h3> 
</header>
<div class="container">
<div>
    <a  href="index.php?menuop=cad"   class="btn btn-outline-secondary mb-2"> <i class="bi bi-person-add"></i>  Novo Contato </a> 
</div>

<div class="pesquisar">
    <form action="index.php?menuop=contatos" method="post"> 
        
        <input type="text" id="pes" name="pesquisa" > 
        
        <button class="btn btn-outline-success btn-sm" type="submit">pesquisar  <i class="bi bi-search"></i></button>
    </form>
</div>
<div class="tabela">
<table class="table table-dark table-striped table-bordered table-sm" > <!-- Início da tabela -->
    <thead class="thead-dark"> <!-- Cabeçalho da tabela -->
        <tr>
            <!-- Colunas para a tabela -->
            <th>Id</th> 
            <th>Nome</th> 
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Endereço</th> 
            <th>Sexo</th>
            <th>Data de Nasc</th> 
            <th>Edição</th>
            <th>Excluir</th> 
        </tr>
    </thead>
    </div>
    <tbody>
        <?php  
            //  quantidade de registros por página
            $quantidade = 7;

            // Captura o número da página atual, padrão é 1
            $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;

            // Calcula o início da consulta com base na página atual
            $inicio = ($quantidade * $pagina) - $quantidade;

            // Captura a pesquisa do formulário, se existir
            $pesquisa = (isset($_POST["pesquisa"])) ? $_POST["pesquisa"] : "";

            // Consulta SQL para buscar os contatos com base na pesquisa
            $sql = "SELECT idContato, upper(nomeContato) AS nomeContato, lower(emailContato) AS emailContato, telefoneContato, upper(enderecoContato) AS enderecoContato,
             CASE WHEN sexoContato = 'f' THEN 'FEMININO' WHEN sexoContato = 'M' THEN 'MASCULINO' ELSE 'SEXO DESCONHECIDO' END AS sexoContato,
             date_format(dataContato,'%d/%m/%Y') AS dataContato FROM contatos 
             WHERE 
              idContato ='{$pesquisa}' or nomeContato LIKE '%{$pesquisa}%' 
              or emailContato LIKE '%{$pesquisa}%' 
              ORDER BY nomeContato ASC 
              LIMIT $inicio,$quantidade"; // Limita a quantidade de registros retornados

            // Executa a consulta SQL
            $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta: " . mysqli_error($conexao));
            // Itera sobre os resultados da consulta
            while ($dados = mysqli_fetch_assoc($rs)) {
        ?>   
        <tr>
            <td><?= $dados["idContato"] ?></td> 
            <td class="text-nowrap"><?= $dados["nomeContato"] ?></td> 
            <td class="text-nowrap"><?= $dados["emailContato"] ?></td> 
            <td class="text-nowrap"><?= $dados["telefoneContato"] ?></td> 
            <td class="text-nowrap"><?= $dados["enderecoContato"] ?></td>
            <td class="text-nowrap"><?= $dados["sexoContato"] ?></td> 
            <td class="text-nowrap"><?= $dados["dataContato"] ?></td>

            <!-- Links para editar e excluir  os contato -->
            <td class="text-center"><a class="btn btn-outline-primary btn-sm " href="index.php?menuop=editar-contato&idcontato=<?= $dados["idContato"] ?>"><i class="bi bi-pencil-square"></i></a></td> 
            <td class="text-center"><a  class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-contato&idcontato=<?= $dados["idContato"] ?>"><i class="bi bi-trash"></i></a></td> 
        </tr>
        <?php 
            }
        ?>
    </tbody>
</table><br>
</div>

<ul class="pagination justify-content-center">
<?php 
    // Consulta para obter o total de contatos
    $sqlTotal = "SELECT idContato FROM contatos";
    $qrTotal  = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
    // Conta o total de registros
    $numTotal = mysqli_num_rows($qrTotal); 
    // Calcula o total de páginas necessárias
    $totalPagina = ceil($numTotal / $quantidade);
    // Exibe o total de registros
    echo "<li class='page-item'><span class='page-link'>Total de registros: $numTotal </span></li>"; 
     // Link para a primeira página
    echo '<li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=1" ">Primeira página</a></li>';
?>

<?php

// Exibe a seta esquerda se estiver na metade do total de páginas
if ($pagina >= ceil($totalPagina / 2)) {
    echo '<li class="page-item"><a  class="page-link" href="?menuop=contatos&pagina=' . ($pagina - 1) . '"> <i class="bi bi-arrow-left"></i> </li></a>';
}   

// Loop para exibir os números das páginas
for ($i = 1; $i <= $totalPagina; $i++) {   
    if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) { // Limita a exibição das páginas
        if ($i == $pagina) {
            echo  "<li class='page-item active'><span class='page-link'>$i</span></li>"; 
        } else {
            echo '<li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=' . $i . '">' . $i . '</li></a> '; // Link para a página
        }
    }
}

// Exibe a seta direita se não estiver nas últimas páginas
if ($pagina < ($totalPagina /2)) {
    echo '<li class="page-item"><a  class="page-link" href="?menuop=contatos&pagina='.($pagina + 1) .'"><i class="bi bi-arrow-right"></i></li></a>';
}

// Link para a última página
        echo '<li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=' . $totalPagina . '" >Última página</li></a>';
?>
</ul>

