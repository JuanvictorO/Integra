<!DOCTYPE html>
<!-- MODO DE ACESSIBILIDADE -->
<?php
   session_start();
   if(!isset($_SESSION['id_farmacia'])){
      header('Location: ./controle/deslogar.php');
   }
   else if(!isset($_SESSION['nome_farmacia'])){
    header('Location: ./controle/Control.php?metodo=listarNome&nomeClasse=FarmaciaControle&id_farmacia='.$_SESSION['id_farmacia']);
   } else{
    $nome_farmacia = $_SESSION['nome_farmacia'];
    unset($_SESSION['nome_farmacia']);
   }
?>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="keywords" content="">
      <meta name="author" content="CEFET Campus Nova Friburgo">
      <link class="icon" rel="shortcut icon" type="image/png" href="img/logos/icon1.jpg">
      <title>INTEGRA+</title>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Fontes -->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="vendor/animates/animate.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/header.min.css">
    <link rel="stylesheet" type="text/css" href="css/sistema.min.css">
    <link rel="stylesheet" type="text/css" href="css/footer.min.css">
      <!-- Estilos -->

</head>
<body>
   <header class="cabecalho">
    <?php
        require 'header.html';
    ?>
</header>
  <section class="bg" style="margin-top: 120px;">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-md-3">
          <aside class="menu-sidebar3 js-spe-sidebar mt-2">
            <?php
              require 'menu-sistema.php';
            ?>
          </aside>
        </div>
        <div class="col-xl-9 col-md-9 col-sm-12 col-12 text-center">
        <div class="text-center alert alert-info" role="alert">
          <h4 class="alert-heading" >
            Seja bem-vindo(a), <?= $nome_farmacia ?>
          </h4>
          <p>
            Você está no Sistema de Farmácias do site Integra+.
          </p>
        </div>
        <div class="row box mt-4 mb-4">
          <div class="col-xl-4 col-md-6 col-sm-6 icones">
            <div class="border paginas" id="pagina1">
              <a href="farmacias.php" class="btn btn-default">
              <img class="img-home img-1" src="./img/layout/farmaciaa.png">
              <h4 class="title mt-2">
                Farmácias Cadastradas
              </h4>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-sm-6 icones">
            <div class="border paginas" id="pagina2">
              <a href="entrada.php" class="btn btn-default">
              <img class="img-home img-2" src="./img/layout/mais.png">
              <h4 class="title mt-2">
                Adicionar no Estoque
              </h4>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-sm-6 icones">
            <div class="border paginas" id="pagina3">
              <a href="saida.php" class="btn btn-default">
              <img class="img-home img-3" src="./img/layout/menos.png">
              <h4 class="title mt-4" style="margin-bottom: 22px;">
                Remover do Estoque
              </h4>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-sm-6 icones mt-4">
            <div class="border paginas" id="pagina4">
              <a href="estoque.php" class="btn btn-default">
              <img class="img-home img-4" src="./img/layout/warehouse.png">
              <h4 class="title mt-4" style="margin-bottom: 22px;">
                Meu perfil e Estoque
              </h4>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-sm-6 icones mt-4">
            <div class="border paginas" id="pagina5">
              <a href="produtos.php" class="btn btn-default">
              <img class="img-home img-5" src="./img/layout/barcode.png">
              <h4 class="title mt-4" style="margin-bottom: 22px;">
                Meus Produtos
              </h4>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-sm-6 icones mt-4">
            <div class="border paginas" id="pagina6">
              <a href="catalogo.php" class="btn btn-default">
              <img class="img-home img-6" src="./img/layout/list.png">
              <h4 class="title mt-4" style="margin-bottom: 22px;">
               Meu Catálogo
              </h4>
              </a>
            </div>
          </div>
        </div>
        <hr>
        <h1 class="col p-0 ml-2 mt-3 text-left">Guia rápido</h1>
      <div class="py-4 row mb-4">
         <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
               <a class="btn btn-outline-dark list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#lista-noticias" role="tab" aria-controls="profile">Farmácias</a>
               <a class="btn btn-outline-dark list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#lista-dicas" role="tab" aria-controls="messages">Adicionar</a>
                <a class="btn btn-outline-dark list-group-item list-group-item-action" id="list-remove-list" data-toggle="list" href="#lista-remove" role="tab" aria-controls="remove">Remover</a>
               <a class="btn btn-outline-dark list-group-item list-group-item-action" id="list-estoque-list" data-toggle="list" href="#lista-estoque" role="tab" aria-controls="estoque">Meu Estoque</a>
               <a class="btn btn-outline-dark list-group-item list-group-item-action" id="list-estoque-list" data-toggle="list" href="#produtos" role="tab" aria-controls="estoque">Produtos</a>
               <a class="btn btn-outline-dark list-group-item list-group-item-action" id="list-estoque-list" data-toggle="list" href="#catalogo" role="tab" aria-controls="estoque">Catálogo</a>
            </div>
         </div>

         <div class="col-8">
            <div class="tab-content text-justify mt-4" id="nav-tabContent">
            

               <div class="tab-pane fade show active" id="lista-noticias" role="tabpanel" aria-labelledby="list-profile-list">Na página de <a href="#"><strong>farmácias cadastradas </strong></a> você pode ver todas as farmácias cadastradas no sistema e suas respectivas informações: <strong>nome </strong> da farmácia, <strong>email </strong> e <strong>telefone</strong>... Você ainda poderá ver o <strong>estoque </strong> disponível de cada farmácia e, se tiver interesse em comprar ou vender algum produto, poderá entrar em contato com o estabelecimento.</a></div>

               <div class="tab-pane fade" id="lista-dicas" role="tabpanel" aria-labelledby="list-settings-list">Na página de <a href="entrada.php">adicionar produto</a> ou <a href="entrada.php">adicionar no estoque</a> você pode adicionar os produtos em seu estoque. Para adicionar um produto no estoque, você deve, primeiramente, cadastrar um produto clicando no <span class="fas fa-plus" style="color:blue;"></span> que você irá encontrar ao lado do nome "Produto". Depois de cadastrar um produto, você pode adicioná-lo ao estoque selecionando-o e informando uma quantidade.</div>

                <div class="tab-pane fade" id="lista-remove" role="tabpanel" aria-labelledby="list-settings-list">Na página de <a href="saida.php">Remover produto </a> você pode remover a quantidade de produtos disponível atualmente em seu estoque.</div>

                  <div class="tab-pane fade" id="lista-estoque" role="tabpanel" aria-labelledby="list-settings-list">Na página de <a href="estoque.php">Meu perfil e Estoque </a> você pode ver os produtos cadastrados em seu estoque, excluir todo um produto e sua quantidade e pode alterar algumas das suas informações cadastradas no sistema.</div>
                  <div class="tab-pane fade" id="produtos" role="tabpanel" aria-labelledby="list-settings-list">Na página de <a href="estoque.php">Meus produtos </a> você pode ver os produtos que você cadastrou e suas informações. Você pode alterar suas informações clicando no lápis e preenchendo o formulário. Para adicionar um produto ao catálogo basta clicar no +.</div>
                  <div class="tab-pane fade" id="catalogo" role="tabpanel" aria-labelledby="list-settings-list">Na página de <a href="estoque.php">Meu Catálogo </a> você pode ver os produtos adicionados em seu catálogo e removê-los dele se quiser.</div>
            </div>
         </div>
      </div>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="aviso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content py-4">
        <div class="modal-body text-center">
          <h6 class="text-danger">AVISO<i class='fas fa-exclamation-circle'></i><i class='fas fa-exclamation-circle'></i><i class='fas fa-exclamation-circle'></i><br/></h6>
          <span class="text-danger">Esta área do site não é recomendada para telas menores que 993 pixels altura.<br><br></span>
          <span class="text-secondary">Clique fora da caixa para fechar</span> 
        </div>
      </div>
    </div>
  </div>
   <footer class="footer">
         <?php
            require 'footer.html';
         ?>
      </footer>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script type="text/javascript">
    if($(window).width() <= 992){
      $("#aviso").modal("show");
    }

    if($(window).width()<1200 && $(window).width() >= 540){
      $('.icones').addClass('mb-4');
    }
      if($(window).width() <= 767){

        $('.bg').attr('style','margin-top: 80px;');

        if($(window).width() <= 575){

          $('.title').addClass('px-2');
          $('.icones').addClass('mt-4');
          $('.box').addClass('px-5');
          if($(window).width() <= 424){
            $('.tab-content').removeClass('mt-4');
            $('.list-group-item').addClass('px-2');
            $('.list-group-item').addClass('py-2');
          }
        }
      }

        $('#mode').click(function(){
            window.location.replace('./controle/modo.php?modo=1&url=sistema.php');
        });
        $('#padrao').click(function(){
            window.location.replace('./controle/default.php?url=sistema.php');
        });
        //Modal formulários
        $('#url').attr('value','sistema.php');

        //Mudando valor do slider dinamicamente
        $('.slider').on('change',function(){
         var slider = $('.slider').val();
         $('#tam_range').text(slider);
        });

      <?php
      if(isset($_SESSION['modo']) && $_SESSION['modo'] != 'normal'){
         ?>
            //mudar a logo e icone
            $('.icon').attr('href','./img/logos/icon2.jpg');
            $('.logo').attr('src','./img/logos/logo5.png');
            //mudar cor do header, footer e body
            if($(window).width() < 992){
              $(".fa-bars").attr("style","color: white");
            }
            $('body').css('background-color','#1c2938');
            $('.input').css('background-color','#182430');
            $('.navbar').attr('style','background-color: #1c2938; opacity: 0.9;');
            $('footer').attr('style','background-color: #1c2938');
            //Letras do header e footer no modo noturno
            $('.item').css('color', 'white');
            $('.item-sub').css('color', 'white');
            $('.item:hover').css('border-color','#127d9d');
            $('.item-sub:hover').css('border-color', '#127d9d');
            $('footer').css('color','white');

            //modal
            $('.modal-content').css('background-color', ' #1c2938');
            $('#mode-text').text('Modo claro');

            // EXCLUSIVO DA PÁGINA/////////////////////////////
            //mudar a img da home
            $('.img-1').attr('src','./img/layout/farmaciaa-n.png');
            $('.img-2').attr('src','./img/layout/mais-n.png');
            $('.img-3').attr('src','./img/layout/menos-n.png');
            $('.img-4').attr('src','./img/layout/warehouse-n.png');
            $('.img-5').attr('src','./img/layout/barcode-n.png');
            $('.img-6').attr('src','./img/layout/list-n.png');
            //mudando buttoes
            $('.list-group-item').removeClass('btn-outline-dark');
            $('.list-group-item').addClass('btn-outline-primary');
            //mudando o alert
            $('.alert').removeClass('alert-info');
            $('.alert').addClass('alert-primary');

             <?php
               if(!isset($_SESSION['cor'])){
                  ?>
                     $('.link-aside').css('color','white');
                     $('#logout-li').css('color','red');
                     $('.modal-content').css('color', 'white');
                     $('#cor').attr('value','#ffffff');
                     $('.bg').css('color','white');
                     $('.title').css('color','white');
         <?php
            }
         }
         if(isset($_SESSION['cor']) && isset($_SESSION['tam'])){
         ?>
          //Se a cor e o tamanho não forem escolhidos no modo noturno, o texto se torna BRANCO
            $('.modal-content').css('color','<?= $_SESSION["cor"] ?>');
          $('#cor').attr('value','<?= $_SESSION["cor"] ?>');
          $('.bg').css('color','<?= $_SESSION["cor"] ?>');

          $('.title').css('color','<?= $_SESSION["cor"] ?>');
          //exclusivo
          $('.alert').css('color','<?= $_SESSION["cor"] ?>');
          $('.link-aside').css('color','<?= $_SESSION["cor"] ?>');
          $('#logout-li').css('color','red');

          $('.link-aside').css('font-size','<?= $_SESSION["tam"] ?>px');
          $('.tab-content').css('font-size','<?= $_SESSION["tam"] ?>px');
          $('.alert p').css('font-size','<?= $_SESSION["tam"] ?>px');
          $('#tam_range').text('<?= $_SESSION["tam"] ?>');
          $('.slider').attr('value','<?= $_SESSION["tam"] ?>');
          <?php
            if($_SESSION['tam'] > 22){
          ?>
              //Alterando tamanho dos textos da página
              $('.alert-heading').css('font-size','<?= $_SESSION["tam"] ?>px');
            <?php
            }
         }
            ?>
   </script>
</body>

</html>