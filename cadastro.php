<!DOCTYPE html>
<!-- MODO DE ACESSIBILIDADE -->
<?php
   session_start();
   if(isset($_SESSION['id_farmacia'])){
      header('Location: sistema.php');
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
    <link rel="stylesheet" type="text/css" href="css/cadastro.min.css">
    <link rel="stylesheet" type="text/css" href="css/footer.min.css">
      <!-- Estilos -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<header class="cabecalho">
    <?php
        require 'header.html';
    ?>
</header>

	<section class="bg" style="margin-top: 78px; padding-top: 25px; padding-bottom: 100px;">
    <div class="container">
      <div class="div-form text-center col-centered col-lg-6 px-0" >
        <div class="inicio" style="background-image: url('./img/layout/bg.jpg')">
          <span class="title-1 font-weight-bold">Cadastro</span>
          <p class="title-1">Cadastre-se para obter mais funções</p>
        </div>
        <form id="formulario" class="mt-3 px-4" action="./controle/Control.php" style="padding-bottom: 20px;">

          <input type="hidden" name="nomeClasse" value="FarmaciaControle">
          <input type="hidden" name="metodo" value="incluir">

          <div class="group form-group">      
            <input id="nome" class="input form-control" type="text" placeholder="*Nome da Farmácia" name="nome_farmacia" required>
          </div>
          <div class="group form-group">      
            <input id="email" class="input form-control" type="email" placeholder="*Email" name="email" required>
          </div>
          <div class="group form-group">      
            <input id="telefone" class="input form-control" type="number" placeholder="*Telefone" name="telefone" required>
          </div>
          <div class="group form-group">      
            <input id="cnpj" class="input form-control" type="number" placeholder="*CPF ou CNPJ" name="cpf_cnpj" required>
          </div>
          <div class="group form-group">      
            <input id="crj" class="input form-control" type="number" placeholder="*CRF" name="crj" required>
          </div>
          <div class="group form-group row">
          <div class="col-6 col-sm-6 col-md-6 col-lg-6">      
            <select class="input form-control" id="estado" name="estado"  required>
              <option selected disabled value="">Estado</option>
              <option id="AC" value="AC">Acre</option>
              <option id="AL" value="AL">Alagoas</option>
              <option id="AP" value="AP">Amapá</option>
              <option id="AM" value="AM">Amazonas</option>
              <option id="BA" value="BA">Bahia</option>
              <option id="CE" value="CE">Ceará</option>
              <option id="DF" value="DF">Distrito Federal</option>
              <option id="ES" value="ES">Espírito Santo</option>
              <option id="GO" value="GO">Goiás</option>
              <option id="MA" value="MA">Maranhão</option>
              <option id="MT" value="MT">Mato Grosso</option>
              <option id="MS" value="MS">Mato Grosso do Sul</option>
              <option id="MG" value="MG">Minas Gerais</option>
              <option id="PA" value="PA">Pará</option>
              <option id="PB" value="PB">Paraíba</option>
              <option id="PR" value="PR">Paraná</option>
              <option id="PE" value="PE">Pernambuco</option>
              <option id="PI" value="PI">Piauí</option>
              <option id="RJ" value="RJ">Rio de Janeiro</option>
              <option id="RN" value="RN">Rio Grande do Norte</option>
              <option id="RS" value="RS">Rio Grande do Sul</option>
              <option id="RO" value="RO">Rondônia</option>
              <option id="RR" value="RR">Roraima</option>
              <option id="SC" value="SC">Santa Catarina</option>
              <option id="SP" value="SP">São Paulo</option>
              <option id="SE" value="SE">Sergipe</option>
              <option id="TO" value="TO">Tocantins</option>
              <option id="EX" value="EX">Estrangeiro</option>
          </select>
          </div>
          <div class="col-6 col-sm-6 col-md-6 col-lg-6">
          <input class="input form-control" type="text" placeholder="*Cidade" name="cidade" maxlength="300" required>
          </div>
          </div>
          <div class="group form-group">      
            <input id="endereco" class="input form-control" type="text" placeholder="*Endereço" name="endereco" required>
          </div>
          <div class="group form-group">      
            <input id="senha" class="input form-control" type="password" placeholder="*Senha" name="senha" minlength="6" required>
          </div>
          <div class="group form-group">      
            <input id="rsenha" class="input form-control" type="password" placeholder="*Repetir senha" name="rsenha" required>
          </div>
          <button id="enviar" type="submit" class="px-4 btn btn-dark">
            Enviar
          </button>
        </form>
      </div>
    </div>
  </section>
  <!-- MODAL -->
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
  <!-- TÉRMINO DP MODAL -->
  <div class="" id="danger" >
	<footer class="footer">
         <?php
            require 'footer.html';
         ?>
      </footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="./js/jquery.cpfcnpj.min.js"></script>  
  <script type="text/javascript">
    // Validar cpf ou cnpj////////////////////////////// 
        $(document).ready(function () {
            $('#cnpj').cpfcnpj({
                mask: true,
                validate: 'cpfcnpj',
                event: 'focusout',
                handler: '#cnpj',
                ifValid: function (input) {  },
                ifInvalid: function (input) { alert(returnType); input.val(''); }
            });

            $('#formulario').submit(function(){
              var senha= $('#senha').val();
              var rsenha = $('#rsenha').val();
              if(senha != rsenha){
                alert('Senha e Repetição de Senha estão diferentes!');
                $('#senha').val('');
                $('#rsenha').val('');
                $('#senha').focus();
                return false;
              }
            });
        });
    </script>
	<script type="text/javascript">
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
    		//$('.login100-form').addClass('mt-5');
    	}
      if($(window).height() < 670){
        $('.bg').css('padding-top','0');
        $('.container').css('margin-top','20px');
        $('.inicio').css('padding-top','15px');
        $('.inicio').css('padding-bottom','15px');
      }
      if($(window).height() <= 585){
        $('.bg').css('padding-top','0');
        $('.container').css('margin-top','20px');
        $('.inicio').css('padding-top','5px');
        $('.inicio').css('padding-bottom','5px');
      }

    	$('#mode').click(function(){
            window.location.replace('./controle/modo.php?modo=1&url=cadastro.php');
        });
        $('#padrao').click(function(){
            window.location.replace('./controle/default.php?url=cadastro.php');
        });

        //Modal formulários
        $('#tam_range').text(20);
        $('#url').attr('value','cadastro.php');

        //Mudando valor do slider dinamicamente
    	  $('.slider').on('change',function(){
          var slider = $('.slider').val();
          if(slider > 20){
            $('#tam_range').text(slider);
          }
          else{
           $('#tam_range').text(20); 
          }
        });

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
            $('.div-form').css('background-color','#1c2938');
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


             <?php
               if(!isset($_SESSION['cor'])){
                  ?>
                     $('.modal-content').css('color', 'white');
                     $('#cor').attr('value','#ffffff');
                     $('.input').css('color','white');
                     $('.input').css('border-color','white');

                     $('.text-secondary').attr('style','color: white !important;');
        	<?php
        		}
    		}
    		if(isset($_SESSION['cor']) && isset($_SESSION['tam'])){
    		?>
          //Se a cor e o tamanho não forem escolhidos no modo noturno, o texto se torna BRANCO
    			$('.modal-content').css('color','<?= $_SESSION["cor"] ?>');
          $('#cor').attr('value','<?= $_SESSION["cor"] ?>');
          $('.input').css('border-color','<?= $_SESSION["cor"] ?>');
          $('.input').css('color','<?= $_SESSION["cor"] ?>');
          $('.title-1').css('color','<?= $_SESSION["cor"] ?>');
          $('.text-secondary').attr('style','color: <?= $_SESSION["cor"] ?> !important; font-size: <?= $_SESSION["tam"] ?>px;');
          $('.text-danger').attr('style','font-size: <?= $_SESSION["tam"] ?>px;');
          <?php
            if($_SESSION['tam'] > 20){
          ?>
              //Alterando tamanho dos textos da página
              $('.slider').attr('value','<?= $_SESSION["tam"] ?>');
              $('#tam_range').text('<?= $_SESSION["tam"] ?>');
            <?php
            }
        	}
            ?>
	</script>
  <style type="text/css">
    <?php
      if(isset($_SESSION['modo']) && $_SESSION['modo'] != 'normal' && !isset($_SESSION['cor'])){
    ?>
    /*Mudando cor dos placeholder dos inputs (Sessão não iniciada no modo noturno)*/
      .input::-webkit-input-placeholder {
        color: white;
      }
      .input:-moz-placeholder { /* Firefox 18- */
         color: white;  
      }
       
      .input::-moz-placeholder {  /* Firefox 19+ */
         color: white;  
      }
       
      .input:-ms-input-placeholder {  
         color: white;  
      }
    <?php 
      }
      if(isset($_SESSION['cor']) && isset($_SESSION['tam'])){
    ?>
      /*Mudando cor dos placeholder dos inputs (Sessão iniciada)*/
      .input::-webkit-input-placeholder {
        color: <?= $_SESSION["cor"] ?>;
      }
      .input:-moz-placeholder { /* Firefox 18- */
         color: <?= $_SESSION["cor"] ?>;  
      }
       
      .input::-moz-placeholder {  /* Firefox 19+ */
         color: <?= $_SESSION["cor"] ?>;  
      }
       
      .input:-ms-input-placeholder {  
         color: <?= $_SESSION["cor"] ?>;  
      }
      
      <?php
        if($_SESSION['tam'] > 20){
      ?> 
          /*exclusividade de tamanho nessa parte*/
          .title-1{
            font-size: <?= $_SESSION['tam'] ?>px !important;
          }
    <?php
        }   
      }
    ?>
  </style>
</body>

</html>