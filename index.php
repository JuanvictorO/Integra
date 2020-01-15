<!DOCTYPE html>
<!-- MODO DE ACESSIBILIDADE -->
<?php
   session_start();
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
      
      <!-- Paginas de estilização-->
      <link rel="stylesheet" type="text/css" href="css/index.min.css">
      <link rel="stylesheet" type="text/css" href="css/header.min.css">
      <link rel="stylesheet" type="text/css" href="css/footer.min.css">
      <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />
      <style type="text/css">
         body{
            font-family: 'Josefin Sans',Helvetica,Arial,Lucida,sans-serif;
         }
         .cabecalho{
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
         }
      </style>
   </head>
   <body id="page-top">
      <!-- Cabeçalho -->
      <header class="cabecalho">
         <?php
            require 'header.html';
         ?>
      </header>

      <section class="container-fluid p-0" style="margin-top: 80px;">
        <div class="parallax-window" data-parallax="scroll" data-image-src="./img/layout/farmacia3.jpg">
            <div class="container">
               <div class="wow fadeIn text-justify row"  data-wow-delay="0.3s">
                  <div class="col-md-9 col-lg-6 col-xl-6">
                  <h2 class="text-parallax wow fadeInLeft title font-weight-bold text-white pt-4" data-wow-delay="0.3s">Integrando farmácias para uma renda maior</h2>
                  <h4 class="text-parallax wow fadeInLeft text-white mt-4" data-wow-delay="0.5s">UM MODELO SIMPLES E PRÁTICO</h4>
                  <h5 class="text-parallax wow fadeInLeft text-white mt-4" data-wow-delay="0.7s">Muitas farmácias de pequeno porte perdem a oportunidade de crescer por não ter uma boa gestão, e assim acabam tendo dívidas que com um pouco mais de planejamento, podem ser evitadas. Aqui um método para maior poupança de dinheiro será proposto, para fazer o pequeno empreendedor ter maior chance contra a concorrência</h5>
                  <div class="text-center">
                     <a href="sobre.php"><button type="button" class="wow fadeInLeft btn btn btn-primary mt-4 mb-5" data-wow-delay="0.9s">
                        LEIA MAIS
                     </button></a>
                  </div>   
                  </div>
               </div>
            </div>
        </div>
   </section>
   <div class="introducao pt-5">
   <section class="container">
      <div class="mb-3 div-introducao">
            <h3 class="pl-4">Introdução</h3>
      </div>
      <div class="row mt-5">
         <div class="row col-xl-6 col-lg-6">
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-2">
               <img id="icon1" class="mt-4 wow fadeInLeft img-icon" data-wow-delays="0.5s" src="./img/layout/icon1.png" width="80px" height="80px">
            </div>
            <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-10 wow zoomIn" data-wow-delay="0.3s">
               <h5 class="title-size mt-1">Falta de remédio</h5>
               <p class="text-justify text-size">Muitas farmácias carecem de abastecimento de remédios antes do fim do mês, fazendo com que tenham um gasto maior. Remédios vencidos também representam grande perda de dinheiro. </p>     
            </div>
         </div>
         <div class="row col-xl-6 col-lg-6">
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-2">
               <img id="icon2" class="mt-4 wow fadeInLeft img-icon" data-wow-delays="0.5s" src="./img/layout/icon2.png" width="80px" height="80px">
            </div>
            <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-10 wow zoomIn" data-wow-delays="0.3s">
               <h5 class="title-size mt-1">Pesquisa</h5>
               <p class="text-size text-justify">Um estudo realizado pela Faculdade Oswaldo Cruz revela que de 1.009 pessoas entrevistadas em São Paulo, 7% já haviam recebido alguma orientação sobre descarte de medicamentos vencidos. Do total, 75,32% descartam a medicação no lixo doméstico e 6,34% jogam na pia ou no vaso sanitário.</p>     
            </div>
         </div>
      </div>
      <div class="row mt-2">
         <div class="row col-xl-6 col-lg-6">
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-2">
               <img id="icon3" class="mt-3 wow fadeInLeft img-icon" data-wow-delays="0.5s" src="./img/layout/icon3.png" width="80px" height="80px">
            </div>
            <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-10 wow zoomIn" data-wow-delays="0.3s">
               <h5 class="title-size mt-1">Como poupar</h5>
               <p class="text-size text-justify">Com uma integração entre farmácias menores do município, podemos fazer com que mais dinheiro seja poupado e remédios sejam descartados devidamente.</p>    
            </div>
         </div>
         <div class="row col-xl-6 col-lg-6">
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-2">
               <img id="icon4" class="mt-3 wow fadeInLeft img-icon" data-wow-delays="0.5s" src="./img/layout/icon4.png" width="80px" height="80px">
            </div>
            <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-10 wow zoomIn" data-wow-delays="0.3s">
               <h5 class="title-size mt-1">Acessibilidade</h5>
               <p class="text-size text-justify">Pensando na democratização da informação, buscamos tornar o site o mais acessivel possível.</p>     
            </div>
         </div>
      </div>
   </section>
   <section class="container section-materias" style="margin-top: 80px;">
      <h3 class="pl-4 pb-2 title-materias">
         Matérias relacionadas
      </h3>
      <div class="row mt-4">
         <div class="col-6 col-sm-6 col-md-4 col-lg-4 materias" id="materia-1">
            <div class="zoom">
               <a href="http://www.hlog.epsjv.fiocruz.br/upload/monografia/61.pdf">
                  <img class="img-fluid" src="./img/layout/descarte2.jpg">
               </a>
            </div>
            <div class="px-1">
               <p class="text-size font-weight-bold text-center mb-1 limit-2">Problematizando o Descarte de Medicamentos Vencidos: para onde destinar?</p>
               <p class="text-size text-justify limit-3">A pesquisa buscou conhecer o destino final de medicamentos vencidos e descartados pela população, em suas residências e causas quanto ao desequilíbrio ecológico, com significativas alterações ambientais.</p>
               <div class="text-right">
                  <a href="http://www.hlog.epsjv.fiocruz.br/upload/monografia/61.pdf">
                  <button type="button" class="btn-noturno btn btn-outline-dark">
                     Ver mais
                  </button>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-6 col-sm-6 col-md-4 col-lg-4 materias" id="materia-2">
            <div class="zoom">
               <a href="http://srvd.grupoa.com.br/uploads/imagensExtra/legado/C/CORRER_Cassyano_J/Pratica_Farmac_Farmacia_Comunitaria/Lib/Cap_01.pdf">
               <img class="img-fluid" src="./img/layout/farmacia-br.jpg">
               </a>
            </div>
            <div class="px-1">
               <p class="text-size font-weight-bold text-center mb-1 limit-2">A farmácia comunitária no Brasil: Você Precisa Saber</p>
               <p class="text-size text-justify limit-3">A farmácia é um estabelecimento de prestação de serviços farmacêuticos de interesse público e/ou privado, articulado ao Sistema Único de Saúde (SUS), destinado a prestar assistência farmacêutica e orientação sanitária individual ou coletiva.</p>
               <div class="text-right">
                  <a href="http://srvd.grupoa.com.br/uploads/imagensExtra/legado/C/CORRER_Cassyano_J/Pratica_Farmac_Farmacia_Comunitaria/Lib/Cap_01.pdf">
                     <button type="button" class="btn-noturno btn btn-outline-dark">
                        Ver mais
                     </button>
                  </a>
               </div>
            </div>
         </div>
         <div class="col col-lg-4 materias" id="materia-3">
            <div class="zoom">
               <a href="http://www.redalyc.org/pdf/4777/477748619002.pdf">
               <img class="img-fluid" src="./img/layout/money.jpg">
               </a>
            </div>
            <div class="px-1">
               <p class="text-size font-weight-bold text-center mb-1 limit-2">Vantagens Logísticas e Cadeia de Valor na Rede de Empresas: O Caso de uma Rede de Pequenas Farmácias</p>
               <p class="text-size text-justify limit-3">No Rio Grande do Sul, formou-se uma rede coma intenção de competir com os grandes varejistas. O objetivo deste estudo é identificarpossíveis vantagens que os pequenos varejistas no ramo farmacêutico podem obter porestarem associados a uma rede de empresas.</p>
               <div class="text-right">
                  <a href="http://www.redalyc.org/pdf/4777/477748619002.pdf">
                  <button type="button" class="btn-noturno btn btn-outline-dark">
                     Ver mais
                  </button>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <div class="text-center mt-2">
         <button type="button" class="btn btn-outline-primary wow rotateInDownLeft d-none" data-wow-delay="0.5s">
            Ver outras matérias
         </button>
      </div>
   </section>
   </div>
      <!-- Rodapé -->
      <footer class="mt-4 footer">
         <?php
            require 'footer.html';
         ?>
      </footer>
      <script src="vendor/parallax/parallax.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="vendor/wow/wow.min.js"></script>
      <script>new WOW().init();</script>

      <script>
        ////////RESPONSIVIDADE COM JQUERY ////////////////////
        if($(window).width() < 768){
         $('#materia-3').hide();
         $('#materia-2').css('border-right-width','0px');
         $('.limit-3').addClass('limit-4');
         $('.limit-4').removeClass('limit-3');
        }
        if($(window).width() <= 821){
         $('.second-span').removeClass('border-left');
         $('.second-span').removeClass('border-secondary');
         $('.second-span').removeClass('pl-2');
         $('.second-span').removeClass('ml-2');
        }
        /////ACESSIBILIDADE//////////////////
        $('#mode').click(function(){
            window.location.replace('./controle/modo.php?modo=1&url=index.php');
        });
        $('#padrao').click(function(){
            window.location.replace('./controle/default.php?url=index.php');
        });

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

               $('body').attr('style','background-color: #15202b');
               $('.introducao').css('background-color', '#15202b');
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

               //ajustes modo noturno
               $('.materias').css('border-color','white');
               $('.parallax-window').attr('data-image-src','./img/layout/farmacia.jpg');
               $('.div-introducao').css('border-color','#1c88cc');
               $('.title-materias').css('border-color','#1c88cc');
               $('.btn-noturno').removeClass('btn-outline-dark');
               $('.btn-noturno').addClass('btn-outline-light');
               $('.btn-outline-primary').addClass('btn-outline-light');
               $('.btn-outline-primary').removeClass('btn-outline-primary');
               $('#mode-text').text('Modo claro');
               
               //mudando cor dos ícones
               $('#icon1').attr('src','./img/layout/icon1-n.png');
               $('#icon2').attr('src','./img/layout/icon2-n.png');
               $('#icon3').attr('src','./img/layout/icon3-n.png');
               $('#icon4').attr('src','./img/layout/icon4-n.png');

               <?php
               if(!isset($_SESSION['cor'])){
                  ?>
                     $('.introducao').css('color','white');
                     $('.modal-content').css('color', 'white');
                     $('#cor').attr('value','#ffffff');
                  <?php
               }
            }
            if(isset($_SESSION['cor']) && isset($_SESSION['tam'])){
               ?>
               //Alterando valor dos inputs do MODAL
               $('.modal-content').css('color','<?= $_SESSION["cor"] ?>');
               $('#cor').attr('value','<?= $_SESSION["cor"] ?>');
               $('.slider').attr('value','<?= $_SESSION["tam"] ?>');

               $('.introducao').css('color','<?= $_SESSION["cor"] ?>');
               $('.text-parallax').removeClass('text-white');
               $('.text-parallax').css('color','<?= $_SESSION["cor"] ?>');
               $('#tam_range').text('<?= $_SESSION["tam"] ?>');
               $('.text-size').attr('style','font-size: <?= $_SESSION["tam"] ?>px;');
               <?php
               if($_SESSION['tam'] > 20){
                  ?>
                  $('.title-size').css('font-size','<?= $_SESSION["tam"] ?>px !important;');
                  $('.text-parallax').css('font-size','<?= $_SESSION["tam"] ?>px !important;');
                  <?php
               }
            }
      ?>
      </script>
      <style type="text/css">
         <?php
         if(isset($_SESSION['tam']) && $_SESSION['tam'] > 20){
            ?>
               .title-size, .text-parallax{
                  font-size: <?= $_SESSION['tam'] ?>px !important;
               }
            <?php
         }
         ?>
      </style>
   </body>
</html>