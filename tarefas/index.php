<?php
    include("db/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt=BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>TaskFlow!</title>
</head>
<body  style="overflow: hidden;">
<figure class="text-center">
  <blockquote class="blockquote">
    <p>TaskFlow</p>
  </blockquote>
  <figcaption class="blockquote-footer">
     <cite title="Source Title">Agende suas tarefas com o <strong>taskflow</strong> para uma organização simples e eficaz do seu dia..</cite>
  </figcaption>
</figure>
    
    <header class="bg=dark">
        <div class="container">
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="a">
            
            <a href="index.php?menuop=contatos"class="btn btn-outline-secondary">contatos</a> 
            <a href="index.php?menuop=tarefas"class="btn btn-outline-secondary">tarefas</a> 
            <a href="index.php?menuop=eventos"class="btn btn-outline-secondary">eventos</a>
            </div>
    </nav>
        </div>
    </header>
    <body>
    <main>

        <?php
            $menuop = (isset($_GET["menuop"])) ? $_GET["menuop"] : "home" ;

            switch ($menuop) {
                case 'home':
                    include("paginas/home/home.php");
                    break;

                    case 'contatos':
                        include("paginas/contatos/contato.php");
                        break;   

                    case 'cad':
                        include("paginas/contatos/cad.php");
                        break;

                      

                        case 'inserir-contato':
                            include("paginas/contatos/inserir-contato.php");
                            break;

                           

                        case 'editar-contato':
                            include("paginas/contatos/editar-contato.php");
                            break;
    
                        case 'atualizar-contato':
                            include("paginas/contatos/atualizar-contato.php");
                            break;

                            case 'excluir-contato':
                                include("paginas/contatos/excluir-contato.php");
                                break;

                        case 'tarefas':
                            include("paginas/tarefas/tarefas.php");
                            break;

                        case'eventos':
                            include("paginas/eventos/eventos.php");
                            break;  
                        default:
                            include("paginas/home/home.php");
                            break;
            }
            
        ?>
        
    </main>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   
   
</body>
</html>