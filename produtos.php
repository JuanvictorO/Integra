<!DOCTYPE html>
<!-- MODO DE ACESSIBILIDADE -->
<?php
   session_start();
   if(!isset($_SESSION['id_farmacia'])){
      header('Location: ./controle/deslogar.php');
   }
   if(!isset($_SESSION['produtos'])){
      header('Location: ./controle/Control.php?nomeClasse=ProdutoControle&metodo=listarMeusProdutos');
   } else{
    $produtos = $_SESSION['produtos'];
    unset ($_SESSION['produtos']);
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
      .pointer{
        cursor: pointer !important;
      }
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
          <div class="text-center alert alert-info" role="alert">
            <h4 class="alert-heading">
              Produtos Cadastrados
            </h4>
            <p>
             Aqui você pode ver os produtos cadastrados e suas informações. Você pode alterar as informações de algum produto clicando no lápis e pode excluir um produto clicando na lixeira.
            </p>
          </div>
          <div class="table-data__tool">
         <div class="table-data__tool-left text-center">
         </div>
      </div>
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40" style="margin-bottom: 130px;">
         <table class="table table-hover">
            <thead class="thead-dark">
               <tr>
                  <th>Nome</th>
                  <th>Fabricação</th>
                  <th>Validade</th>
                  <th>Situação</th>
                  <th>Preço Pago</th>
                  <th>Preço Venda</th>
                  <th>Ações</th>
               </tr>
            </thead>
            <tbody class="tbody">

            </tbody>
         </table>
      </div>
      <!-- END DATA TABLE  -->
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade row" id="produto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alterar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formulario" action="./controle/Control.php" method="POST">
      
      <input type="hidden" name="nomeClasse" value="ProdutoControle">
      <input type="hidden" name="metodo" value="alterar">
      <input type="hidden" id="id_produto" name="id_produto" value="">
      
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-md-4 control-label mt-1">Nome do produto:</label>
          <div class="col-md-8">
            <input type="text" id="nome_produto" class="form-control" name="nome_produto" required>
          </div>            
        </div>
        <div class="form-group row">
          <label class="col-md-4 control-label mt-1">Data de Fabricação:</label>
          <div class="col-md-8">
            <input type="date" id="fabricacao" class="form-control" name="data_fabricacao" required>
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
            <select name="situacao" id="situacao" class="form-control input-lg mb-md">
              <option value="Falta">Falta</option>
              <option value="Sobra">Sobra</option>
            </select>
          </div>  
        </div>
        <div class="form-group row">
          <label class="col-md-4 control-label mt-1">Preço Pago:</label>
          <div class="col-md-8">
            <input type="text" id="preco" class="form-control" name="preco_pago" maxlength="12" placeholder="Ex: 22.90" onkeypress="return Onlynumbers(event)" required>
          </div>            
        </div>
        <div class="form-group row">
          <label class="col-md-4 control-label mt-1">Preço de Venda:</label>
          <div class="col-md-8">
            <input id="venda" type="text" class="form-control" name="preco_venda" maxlength="12" placeholder="Ex: 22.90" onkeypress="return Onlynumbers(event)" required>
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
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript">
    // balãozinho
    $('[data-toggle="tooltip"]').tooltip();
    function alterar(id)
    {
      var fabricacao = produtos[id].data_fabricacao.split('/');
      var fabricacao = fabricacao[2]+'-'+fabricacao[1]+'-'+fabricacao[0];
      var validade = produtos[id].data_validade.split('/');
      var validade = validade[2]+'-'+validade[1]+'-'+validade[0];

      $('#id_produto').val(produtos[id].id_produto);
      $('#nome_produto').val(produtos[id].nome_produto);
      $('#fabricacao').val(fabricacao);
      $('#validade').val(validade);
      $('#situacao').val(produtos[id].situacao);
      $('#preco').val(produtos[id].preco_pago);
      $('#venda').val(produtos[id].preco_venda);
      $('#produto').modal('show');
    }
    function incluir(id){
      $.ajax({
        type:"GET",
        url: "./controle/Control.php?nomeClasse=CatalogoControle&metodo=incluir&id_produto="+id,
        async: false
      }).then(sucesso_incluir(),falha);
    }
    //Função ajax para atualizar o produto de forma dinâmica
    $('#formulario').submit(function(e){

      e.preventDefault();
      var formulario = $(this);
      atualizarProduto(formulario);
    });
    function atualizarProduto(dados){
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
    function sucesso_incluir(){
      exibirProduto();
    }
    function falha(){
      alert('Ocorreu alguma falha em atualizar ou incluir o produto no catálogo, tente novamente mais tarde ou contate-nos!');
    }
    function excluir(id){
      if(confirm('Tem certeza que deseja excluir esse produto? Saiba que ele será automaticamente excluído do estoque, do catálogo e não existirá mais!')){
        $.ajax({
          type:"GET",
          url: "./controle/Control.php?nomeClasse=ProdutoControle&metodo=excluir&id_produto="+id,
          async: false
        }).then(sucesso_incluir(),falha);
      }
    }

    function exibirProduto(){
      $.ajax({
        data: '',
        type:"GET",
        url: "./controle/Control.php?metodo=listarMeusProdutosAjax&nomeClasse=ProdutoControle",
        async: true,
        success: function(resultado){
          produtos = resultado;
          $('tbody').empty();
          listar_produtos(produtos);
        },
        dataType: 'json'
      });
    }

    //Gambiarra para concertar erro que fonte fica virando branca
    <?php
    if(isset($_SESSION['cor'])){
      ?>
      var tam = <?= $_SESSION['tam'] ?>;
      var cor = "<?= $_SESSION['cor'] ?>";
      <?php 
    } else {
      ?>
      var tam = '16';
      var cor = 'black';
      <?php
    }
    ?>
      //listar
      var produtos = <?= $produtos ?>;
      listar_produtos(produtos);
      function listar_produtos(produtos){   
         $.each(produtos,function(i,item){
          if(item.catalogo == 0){
            var icon = '<i class="pointer ml-2 fas fa-plus" onclick="incluir('+item.id_produto+')" data-toggle="tooltip" title="Adicionar produto no catálogo"></i>';
          } else{
            var icon = '<i class="ml-2 fas fa-check" style="color: #33cc33;" data-placement="top" title="Produto adicionado no catálogo"></i>'
          }
          $('.tbody').append(
            '<tr style="color:'+cor+'; font-size: '+tam+'px;"><td>'+item.nome_produto+'</td><td>'+item.data_fabricacao+'</td><td>'+item.data_validade+'</td><td>'+item.situacao+'</td><td>'+item.preco_pago+'</td><td>'+item.preco_venda+'</td><td><i class="pointer far fa-edit" data-toggle="tooltip" title="Alterar produto" onclick="alterar('+item.id_produto+')"></i>'+icon+'<i class="pl-2 pointer fas fa-trash-alt" data-toggle="tooltip" title="Excluir produto" onclick="excluir('+item.id_produto+')"></i></td></tr>'
          );
        });
      }
    //Exclusivo do DATATABLE  
      if($(window).width() <= 767){
        $('.bg').attr('style','margin-top: 80px;');
      }

      $('#mode').click(function(){
            window.location.replace('./controle/modo.php?modo=1&url=produtos.php');
        });
        $('#padrao').click(function(){
            window.location.replace('./controle/default.php?url=produtos.php');
        });

        //Modal formulários
        $('#url').attr('value','produtos.php');

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

                     //exclusivo
                     $('.table').css('color','white');
                     $('tbody tr td').css('color','black');
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
          $('tr th').css('color','<?= $_SESSION["cor"] ?>');

          //exclusivo
          $('.alert').css('color','<?= $_SESSION["cor"] ?>');
          $('.link-aside').css('color','<?= $_SESSION["cor"] ?>');
          $('#logout-li').css('color','red');
          $('tbody tr td').css('font-size','<?= $_SESSION["tam"] ?>px');

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
   <style type="text/css">
    tbody tr:hover {
      background-color: #dee2e6 !important;
    }
     <?php 
    if(isset($_SESSION['modo']) && $_SESSION['modo'] != 'normal' ){
      if(!isset($_SESSION['cor'])){
     ?>

      .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{
        color: white;
      }
      .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active{
        color: white;
      }
      .dataTables_empty{
        color: black !important;
      }
      #DataTables_Table_0_next{
        color: white !important;
      }
      #DataTables_Table_0_previous{
        color: white !important;
      }
     <?php
     }
     else{
      ?>
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{
        color: <?= $_SESSION["cor"] ?>;
      }
      .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active{
        color: <?= $_SESSION["cor"] ?>;
      }
      .dataTables_empty{
        color: <?= $_SESSION["cor"] ?> !important;
      }
      #DataTables_Table_0_next{
        color: <?= $_SESSION["cor"] ?> !important;
      }
      #DataTables_Table_0_previous{
        color: <?= $_SESSION["cor"] ?> !important;
      }
      <?php
     }
    }
    if(isset($_SESSION['tam'])){
      ?>
      
      .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{
        font-size: <?= $_SESSION["tam"] ?>px;
      }
      .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active{
        font-size: <?= $_SESSION["tam"] ?>;
      }
      .dataTables_empty{
        font-size: <?= $_SESSION["tam"] ?> !important;
      }
      #DataTables_Table_0_next{
        font-size: <?= $_SESSION["tam"] ?> !important;
      }
      #DataTables_Table_0_previous{
        font-size: <?= $_SESSION["tam"] ?> !important;
      }
    <?php
      }
    ?>
   </style>
  <script>
    $(document).ready( function () {

    /* Data table */
    $('.table').DataTable({

    //Não ordenar como default nenhuma
    "order": [],

      language : {
    "sEmptyTable": "Nenhum produto encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_  Resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
     },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
        }
      }

    });
});</script>
</body>
</html>
