<!DOCTYPE html>
<!-- MODO DE ACESSIBILIDADE -->
<?php
   session_start();
   if(isset($_SESSION['id_farmacia'])){
      unset($_SESSION['id_farmacia']);
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
    <link rel="stylesheet" type="text/css" href="css/login.min.css">
    <link rel="stylesheet" type="text/css" href="css/footer.min.css">

      <!-- Estilos -->


    <!-- bootstrap js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body style="background-color: #83b3cc;" style="height: 100%;">
	<header class="cabecalho">
    <?php
        require 'header.html';
    ?>
</header>
	<div class="limiter" style="height: 100%;">
		<div class="container-login100" style="height: 100%;">
			<div class="wrap-login100" style="height: 100%;">
				<form class="login100-form" action="./controle/Control.php" method="POST">
          <input type="hidden" name="nomeClasse" value="LogarControle">
          <input type="hidden" name="metodo" value="logar">


					<span class="login100-form-title mb-2">
						Login
					</span>
					
					
					<div class="wrap-input100">
						<input class="input100" type="email" name="email" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					<div class="wrap-input100">
						<input class="input100" type="password" name="senha" minlength="6" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Senha</span>
					</div>
					<p id="span" class="text-center span pl-1">Não possui cadastro? Clique aqui!</p>
					<div class="container-login100-form-btn mt-1">
						<button type="submit" class="btn btn-dark" style="width: 100%; border-radius: 10px;">
							Entrar
						</button>
					</div>
					<div class="container-login100-form-btn mt-2">
						<button type="button" class="catalogo btn btn-dark" style="width: 100%; border-radius: 10px;">
							Ver catálogo
						</button>
					</div>
					<div class="clearfix"></div>	
				</form>
				<div class="login100-more" style="background-image: url('./img/layout/remedio.jpg');">
				</div>
				<div id="rodape"></div>
			</div>
		</div>
	</div>
  <!-- MODAL SUCESSO CADASTRO ------------------------------>
  <div class="modal fade" id="msg_success" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content py-4">
        <div class="modal-body text-center">
          <span class="text-success"></span><br>
          <span class="text-secondary">Clique fora da caixa para fechar</span> 
        </div>
      </div>
    </div>
  </div>
  <script>
    <?php 
      if(isset($_SESSION['sucesso'])){
    ?>
        $('#msg_success').modal('show');
        $('.text-success').html("<?= $_SESSION['sucesso'] ?>");
    <?php
        unset( $_SESSION['sucesso']);
      }
    ?>
  </script>
  <!-- TÉRMINO DO MODAL DE SUCESSO -->
  <!-- MODAL DE ERRO-->
  <div class="modal fade" id="msg_fail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content py-4">
        <div class="modal-body text-center">
          <span class="text-danger"></span><br>
          <span class="text-secondary">Clique fora da caixa para fechar</span> 
        </div>
      </div>
    </div>
  </div>
  <script>
    <?php 
      if(isset($_SESSION['msg'])){
    ?>
      $('#msg_fail').modal('show');
      $('.text-danger').html("<?= $_SESSION['msg'] ?>");
    <?php
        unset( $_SESSION['msg']);
      }
    ?>
  </script>
  <!-- TÉRMINO DO MODAL DE ERRO -->

	<footer class="footer fixed-bottom">
         <?php
            require 'footer.html';
         ?>
      </footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script type="text/javascript">
    $('.catalogo').click(function(){
      window.location.replace('catalogos.php');
    });
		$('.input100').each(function(){
	        $(this).on('blur', function(){
	            if($(this).val().trim() != "") {
	                $(this).addClass('has-val');
	            }
	            else {
	                $(this).removeClass('has-val');
	            }
	        })    
    	});

    	if($(window).width() <= 576){
    		$('.login100-form-title').addClass('mt-4');
    	}

    	$('#mode').click(function(){
            window.location.replace('./controle/modo.php?modo=1&url=login.php');
        });
        $('#padrao').click(function(){
            window.location.replace('./controle/default.php?url=login.php');
        });

        //LINK
        $('#span').click(function(){
          window.location.replace('cadastro.php');
        });


        //Modal formulários
        $('.slider').hide();
        $('#tam_range').text(30);
        $('#url').attr('value','login.php');
    	
    	<?php
    	if(isset($_SESSION['modo']) && $_SESSION['modo'] != 'normal'){
         ?>
         	//mudando botão
         	$('.btn').removeClass('btn-dark');
         	$('.btn').addClass('btn-primary');

         	//mudar a logo e icone
            $('.icon').attr('href','./img/logos/icon2.jpg');
            $('.logo').attr('src','./img/logos/logo5.png');
            //mudar cor do header, footer e body
            if($(window).width() < 992){
              $(".fa-bars").attr("style","color: white");
            }
            $('.login100-form').attr('style','background-color: #15202b');
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

             <?php
               if(!isset($_SESSION['cor'])){
                  ?>
                  //Se a cor e o tamanho não forem escolhidos no modo noturno, o texto se torna BRANCO
                  	$('.login100-form-title').css('color','white');
                  	$('.label-input100').css('color','white');
                    $('.input100').css('color','white');
                     $('.modal-content').css('color', 'white');
                     $('.span').css('color','white');
                     $('#cor').attr('value','#ffffff');

                     $('.text-secondary').attr('style','color: white !important;');
        	<?php
        		}
    		}
    		if(isset($_SESSION['cor']) && isset($_SESSION['tam'])){
    		?>
          //Definido cor e tamanho dos textos
    			$('.modal-content').css('color','<?= $_SESSION["cor"] ?>');
            	$('#cor').attr('value','<?= $_SESSION["cor"] ?>');
            	$('.login100-form-title').css('color','<?= $_SESSION["cor"] ?>');
            	$('.label-input100').css('color','<?= $_SESSION["cor"] ?>');
              $('.input100').css('color','<?= $_SESSION["cor"] ?>');
            	$('.span').css('color','<?= $_SESSION["cor"] ?>');

              $('.text-secondary').attr('style','color: <?= $_SESSION["cor"] ?> !important; font-size: <?= $_SESSION["tam"] ?>px;');
              $('.text-success').attr('style','font-size: <?= $_SESSION["tam"] ?>px;');

            <?php
        	}
            ?>
	</script>
</body>

</html>