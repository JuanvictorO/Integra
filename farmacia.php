<!DOCTYPE html>
<!-- MODO DE ACESSIBILIDADE -->
<?php
   session_start();
   if(!isset($_SESSION['id_farmacia'])){
      header('Location: ./controle/deslogar.php');
   }
    extract($_REQUEST);
    if(isset($farmacia)){
      if(!isset($_SESSION['farmacia']) && !isset($_SESSION['estoque'])){
        header('Location: ./controle/control.php?metodo=listarFarmaciaa&nomeClasse=FarmaciaControle&farmacia='.$farmacia);
      } else{
        $farmaciaa = $_SESSION['farmacia'];
        $estoque = $_SESSION['estoque'];
        unset($_SESSION['farmacia']);
        unset($_SESSION['estoque']);
      }
    } else{
      header('Location: farmacias.php');
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
              Farmácia
            </h4>
            <p>
              Aqui você pode ver algumas informações para contato da farmácia e o seu estoque disponível.
            </p>
          </div>
          <button id="btn" class="btn btn-outline-dark my-3">Informações para contato</button>
          <div class="form py-3 px-2">
            <div class="text-center">
              <h2 class="mb-3">Informações para contato</h2>
            </div>
              <div class="form-group row text-right">
                <label for="nome" class="col-sm-3 col-form-label">Nome da Farmácia</label>
                <div class="col-sm-9">
                  <input type="text" class="input form-control" id="nome" placeholder="*Nome da Farmácia" name="nome_farmacia" readonly required>
              </div>
            </div>
            <div class="form-group row text-right">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="input form-control" id="email" placeholder="*Email" name="email" readonly required>
              </div>
            </div>
            <div class="form-group row text-right">
                <label for="telefone" class="col-sm-3 col-form-label">Telefone</label>
                <div class="col-sm-9">
                  <input type="number" class="input form-control" id="telefone" placeholder="*Nome da Farmácia" name="telefone" readonly required>
              </div>
            </div>
            <div class="form-group row text-right">
                <label for="estado" class="col-sm-3 col-form-label">Estado</label>
                <div class="col-sm-9">
                  <select class="input form-control" id="estado" name="estado" style="background: #eee;pointer-events: none;touch-action: none;"  required>
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
            </div>
            <div class="form-group row text-right">
                <label for="cidade" class="col-sm-3 col-form-label">Cidade</label>
                <div class="col-sm-9">
                  <input type="text" class="input form-control" id="cidade" placeholder="*Cidade" name="cidade" readonly required>
              </div>
            </div>
            <div class="form-group row text-right">
                <label for="endereco" class="col-sm-3 col-form-label">Endereço</label>
                <div class="col-sm-9">
                  <input type="text" class="input form-control" id="endereco" placeholder="*Endereco" name="endereco" readonly required>
              </div>
            </div>
          </div>
          <div class="table-data__tool">
         <div class="table-data__tool-left text-center">
            <h2 class="title-1 pt-0 pl-3 mb-4">Estoque</h2>
         </div>
      </div>
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40" style="margin-bottom: 130px;">
         <table class="table table-hover">
            <thead class="thead-dark">
               <tr>
                  <th>Produto</th>
                  <th>Quantidade</th>
                  <th>Fabricação</th>
                  <th>Validade</th>
                  <th>Normalmente</th>
                  <th>Preço Pago</th>
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
   <footer class="footer">
         <?php
            require 'footer.html';
         ?>
      </footer>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript">
    $('.form').hide();
    $('#btn').click(function(){
      $('#btn').hide();
      $('.form').show('slow');
    });
    //Preencher o HTML com as farmácias
   var farmacia = <?= $farmaciaa ?>;
    $.each(farmacia,function(i,item){
      $('#nome').val(item.nome_farmacia);
      $('#email').val(item.email);
      $('#telefone').val(item.telefone);
      $('#estado').val(item.estado);
      $('#cidade').val(item.cidade);
      $('#endereco').val(item.endereco);
    });
    var estoque = <?= $estoque ?>;
    $.each(estoque,function(i,item){
    $('.tbody').append(
      '<tr><td>'+item.nome_produto+'</td><td>'+item.qtd+'</td><td>'+item.data_fabricacao+'</td><td>'+item.data_validade+'</td><td>'+item.situacao+'</td><td>'+item.preco_pago+'</td></tr>'
      );
    });
    //Exclusivo do DATATABLE  
    if($(window).width() <= 992){
      $(".form-group").removeClass("text-right");
      $(".form-group").addClass("text-left");
    }  
      if($(window).width() <= 767){
        $('.bg').attr('style','margin-top: 80px;');
      }

      $('#mode').click(function(){
            window.location.replace('./controle/modo.php?modo=1&url=farmacia.php');
        });
        $('#padrao').click(function(){
            window.location.replace('./controle/default.php?url=farmacia.php');
        });

        //Modal formulários
        $('#url').attr('value','farmacia.php');

        //Mudando valor do slider dinamicamente
        $('.slider').on('change',function(){
         var slider = $('.slider').val();
         $('#tam_range').text(slider);
        });

      <?php
      if(isset($_SESSION['modo']) && $_SESSION['modo'] != 'normal'){
         ?>
         //btn de perfil
         $('#btn').removeClass('btn-outline-dark');
         $('#btn').addClass('btn-outline-primary');
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
                     $('.input').css('color','white');
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
    "sEmptyTable": "Nenhum produto registrado neste estoque",
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
