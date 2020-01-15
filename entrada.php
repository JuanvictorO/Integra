<!DOCTYPE html>
<!-- MODO DE ACESSIBILIDADE -->
<?php
   session_start();
   if(!isset($_SESSION['id_farmacia'])){
      header('Location: ./controle/deslogar.php');
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
    <style type="text/css">
    </style>
      <!-- Estilos -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script type="text/javascript" src="./js/OnlyNumbers.min.js"></script>

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
          <form id="form_entrada" action="./controle/Control.php" method="POST" autocomplete="off">
          <div class="text-center alert alert-info" role="alert">
            <h4 class="alert-heading" >
              Adicionar no Estoque
            </h4>
            <p>
              Aqui você pode cadastrar produtos clicando no + e adicioná-los no estoque depois que escolher pelo menos um produto, digitar a sua quantidade, clicar em incluir e clicar em enviar.
            </p>
          </div>
          <div class="panel-body table-responsive" >
                      <table class="table table-bordered mb-none">
                        <thead>
                          <tr >
                            <th>Produto
                              <span class="fas fa-plus" style="float:right;color:blue;" id="click" class="produto">
                              </span>
                            </th>
                            <th class="px-0">Quantidade</th>
                            <th class="px-0">Fabricação</th>
                            <th class="px-0">Validade</th>
                            <th class="px-0">Valor Unitário</th>
                            <th class="px-0">Ação</th>
                          </tr>
                          <tr>
                            <td>
                              <input type="search" list="produtos_autocomplete" id="input_produtos" autocomplete="off" size="7" class="form-control">
                              <datalist id="produtos_autocomplete">
                              </datalist>
                            </td>
                            <td><input type="number" style="width: 60px;" value="1" min="1" id="quantidade"></td>
                            <td id="fabricacao"></td>
                            <td id="validade"> 
                            </td>
                            <td id="valor_unitario"> 
                            </td>
                            <td> 
                             <button id="add-row" type="button">incluir</button> 
                            </td>
                          </tr>
                        </thead>
                      </table><br>

                      <div class="table-responsive">
                        <table class="table table-bordered mb-none table">
                          <thead>
                            <tr>
                              <th style="width: 120px;">Produto
                              <th style="width: 85px;">Quantidade</th>
                              <th class="px-0">Fabricação</th>
                              <th class="px-0">Validade</th>
                              <th class="px-0 mx-0">Valor Unitário</th>
                              <th>Ação</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <input type="hidden" name="nomeClasse" value="EntradaControle">
                    <input type="hidden" name="metodo" value="incluir">
                    <input type="hidden" id="conta" name="conta">
                    
                    <div class="text-right">
                      <button type="submit" class="mt-4 px-3 text-right btn btn-primary" style="margin-bottom: 130px;">Enviar</button>
                    </div>
            </form>
        </div>
      </div>
    </div>
  </section>
   <div class="modal fade row" id="produto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar um Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formulario" action="./controle/Control.php" method="POST">
      
      <input type="hidden" name="nomeClasse" value="ProdutoControle">
      <input type="hidden" name="metodo" value="incluir">
      
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-md-4 control-label mt-1">Nome do produto:</label>
          <div class="col-md-8">
            <input type="text" class="form-control" name="nome_produto" required>
          </div>            
        </div>
        <div class="form-group row">
          <label class="col-md-4 control-label mt-1">Data de Fabricação:</label>
          <div class="col-md-8">
            <input type="date" class="form-control" name="data_fabricacao" required>
          </div>            
        </div>
        <div class="form-group row">
          <label class="col-md-4 control-label mt-1">Data de Validade:</label>
          <div class="col-md-8">
            <input id="validade" type="date" class="form-control" name="data_validade" required>
          </div>            
        </div>
        <div class="form-group ">
          <label class=" control-label" for="inputSuccess">Este produto em seu estoque, normalmente, falta ou sobra?</label>
          <div class="">
            <select name="situacao" id="id_categoria" class="form-control input-lg mb-md">
              <option selected disabled value="">Selecionar</option>
              <option value="Falta">Falta</option>
              <option value="Sobra">Sobra</option>
            </select>
          </div>  
        </div>
        <div class="form-group row">
          <label class="col-md-4 control-label mt-1">Preço Pago:</label>
          <div class="col-md-8">
            <input type="text" class="form-control" name="preco_pago" maxlength="12" placeholder="Ex: 22.90" onkeypress="return Onlynumbers(event)" required>
          </div>            
        </div>
        <div class="form-group row">
          <label class="col-md-4 control-label mt-1">Preço de Venda:</label>
          <div class="col-md-8">
            <input type="text" class="form-control" name="preco_venda" maxlength="12" placeholder="Ex: 22.90" onkeypress="return Onlynumbers(event)" required>
          </div>            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button id="reset" type="reset" class="btn btn-light">Limpar</button>
        <button id="enviar" type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
      </form>
    </div>
  </div>
</div>
   <footer class="footer">
         <?php
            require 'footer.html';
         ?>
      </footer>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <!-- MODAL FALHA CADASTRO NA ENTRADA -------------------------->
    <div class="modal fade" id="fail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content py-4">
        <div class="modal-body text-center">
          <span class="text-danger"></span><br>
          <span class="text-secondary">Clique fora da caixa para fechar</span> 
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL SUCESSO CADASTRO NA ENTRADA --------------------------->
  <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content py-4">
        <div class="modal-body text-center">
          <span class="text-success"></span><br>
          <span class="text-secondary">Clique fora da caixa para fechar</span> 
        </div>
      </div>
    </div>
  </div>
   <script type="text/javascript">
    //Modal para mensagem de sucesso
    <?php 
      if(isset($_SESSION['sucesso'])){
    ?>
        $('#success').modal('show');
        $('.text-success').html("<?= $_SESSION['sucesso'] ?>");
    <?php
        unset( $_SESSION['sucesso']);
      }
    ?>
    //Modal para mensagem de erro
    <?php 
      if(isset($_SESSION['msg'])){
    ?>
      $('#fail').modal('show');
      $('.text-danger').html("<?= $_SESSION['msg'] ?>");
    <?php
        unset( $_SESSION['msg']);
      }
    ?>
    //Função AJAX que vai fazer a primeira listagem dos produtos
    produtos = "";
    $.ajax({
        data: '',
        type:"GET",
        url: "./controle/Control.php?metodo=listarProdutos&nomeClasse=ProdutoControle&id_farmacia=<?= $_SESSION['id_farmacia'] ?>",
        async: true,
        success: function(resultado){
          produtos = resultado;
          $('#produtos_autocomplete').empty();
          $.each(produtos,function(i,item){
            $('#produtos_autocomplete').append('<option value="'+item.id_produto+'-'+item.nome_produto+'">');
          });
        },
        dataType: 'json'
      });
      //Função AJAX que vai atualizar a listagem depois que um produto for incluído
    function exibirProduto(){
      $.ajax({
        data: '',
        type:"GET",
        url: "./controle/Control.php?metodo=listarProdutos&nomeClasse=ProdutoControle&id_farmacia=<?= $_SESSION['id_farmacia'] ?>",
        async: true,
        success: function(resultado){
          produtos = resultado;
          $('#produtos_autocomplete').empty();
          $.each(produtos,function(i,item){
            $('#produtos_autocomplete').append('<option value="'+item.id_produto+'-'+item.nome_produto+'">');
          });
        },
        dataType: 'json'
      });
    }
    //Função ajax para inserir o produto de forma dinâmica
    $('#formulario').submit(function(e){

      e.preventDefault();
      var formulario = $(this);
      inserirProduto(formulario);
    });

    function inserirProduto(dados){
      $.ajax({
        type:"POST",
        data:dados.serialize(),
        url: "./controle/Control.php",
        async: false
      }).then(sucesso(),falha);
    }
    function sucesso(){
      $('#produto').modal('hide');
      $('#reset').click();
      exibirProduto();

    }
    function falha(){
      alert('Ocorreu alguma falha em cadastrar ou listar o produto, tente novamente mais tarde ou contate-nos!');
    }
    //modal de cadastro do produto
    $('#click').click(function(){
      $('#produto').modal('show');
    });
    
    //Validar se o produto existe na busca
    $('#input_produtos').on('blur',function(){
        var teste=this.value.split('-');
        var valida = 0;

        $.each(produtos,function(i,item){
          if(teste[0]==item.id_produto && teste[1]==item.nome_produto)
          {
            valida = 1;
            $("#fabricacao").text(item.data_fabricacao);
            $("#validade").text(item.data_validade);
            $("#valor_unitario").text(item.preco_pago);
            $("#quantidade").focus();
          } 
        });
        if(valida == 0){
            alert("Produto Inválido. Escreva o nome do produto e selecione-o nas opções. Se o produto não estiver entre as opções, cadastre-o clicando no +");
            $("#input_produtos").val("");
            $("#quantidade").val(1);
            $("#fabricacao").empty();
            $("#validade").empty();
            $("#valor_unitario").empty();
        }
      
      });
    //Adicionar na tabela html
    var conta = 0;
    var valida = 0;
    $( "#add-row" ).click(function() {
      var val=$("#input_produtos").val();

      var obj=$("#produtos_autocomplete").find("option[value='"+val+"']");

      var produto_info = $("#input_produtos").val();
      produto_info = produto_info.split("-");
      if(obj !=null && obj.length>0){
        $.each(produtos,function(i,item){
          if(produto_info[0]==item.id_produto && produto_info[1]==item.nome_produto){

            valida = 1;

            var qtdd = $('#quantidade').val();
            var valor = item.preco_pago;
            var fabricacao = item.data_fabricacao;
            var validade = item.data_validade;

            conta = conta+1;
            $("#conta").val(conta);

            var markup = "<tr class='produtoRow'><td class='prod'><input type='text' size='18' value='"+val+"' name='id"+conta+"' readonly></td><td class='quant'><input type='text' class='number'  id='qtd' maxlength='4' size='4' class='form-control' min='1' value='"+qtdd+"' name='qtd"+conta+"' readonly='readonly'></td><td>"+fabricacao+"</td><td>"+validade+"</td><td>"+valor+"</td><td><button type='button' class='delete-row'>remover</button></td></tr>";
            $("table tbody ").append(markup);
            $("#input_produtos").val("");
            $("#quantidade").val(1);
            $("#fabricacao").empty();
            $("#validade").empty();
            $("#valor_unitario").empty();
          } 
        });
      }
      if(valida == 0){
        alert("Produto Inválido. Escreva o nome do produto e selecione-o nas opções. Se o produto não estiver entre as opções, cadastre-o clicando no +");
        $("#input_produtos").val("");
        $("#quantidade").val(1);
        $("#fabricacao").empty();
        $("#validade").empty();
        $("#valor_unitario").empty();
      }
    });
    //excluir linha adicionada
    $("table tbody").on('click','.delete-row',function(){
        $(this).closest('tr').remove();
      });
    //Exclusivo
    $(".footer").addClass("fixed-bottom");  
    //ajuste de modal de cadastro
    if($(window).width() <= 575){
      $('#produto').css('margin-left','0');
    }

      if($(window).width() <= 767){
        $('.bg').attr('style','margin-top: 80px;');
      }

      $('#mode').click(function(){
            window.location.replace('./controle/modo.php?modo=1&url=entrada.php');
        });
        $('#padrao').click(function(){
            window.location.replace('./controle/default.php?url=entrada.php');
        });

        //Modal formulários
        $('#url').attr('value','entrada.php');

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

                     //exclusive
                     $("#produtos_autocomplete").css('color','black');
         <?php
            }
         }
         if(isset($_SESSION['cor']) && isset($_SESSION['tam'])){
         ?>
          //Se a cor e o tamanho não forem escolhidos no modo noturno, o texto se torna BRANCO
            $('.modal-content').css('color','<?= $_SESSION["cor"] ?>');
            $('.form-control').css('color','<?= $_SESSION["cor"] ?>');
          $('#cor').attr('value','<?= $_SESSION["cor"] ?>');
          $('.bg').css('color','<?= $_SESSION["cor"] ?>');

          //$('.tam').css('color','<?= $_SESSION["cor"] ?>');
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
