<ul class="list-unstyled navbar__list">
              <li class="li-home li-mobile">
                <a href="sistema.php" class="link-aside">
                  <i class="fas fa-home"></i>
                  Home
                </a>
              </li>
              <li class="li-home li-mobile">
                <a href="farmacias.php" class="link-aside">
                  <i class="fas fa-clinic-medical"></i>
                  Farmácias
                </a>
              </li>
              <li class="li-home li-mobile">
                <a href="entrada.php" class="link-aside">
                  <i class="far fa-plus-square"></i>
                  Adicionar 
                </a>
              </li>
              <li class="li-home li-mobile">
                <a href="saida.php" class="link-aside">
                  <i class="far fa-minus-square"></i>
                  Remover 
                </a>
              </li>
              <li class="li-home li-mobile" id="estoque-li">
                <a href="estoque.php" class="link-aside">
                  <i class="far fa-clipboard"></i>
                  Estoque
                </a>
              </li>
              <li class="li-home li-mobile" id="produtos-li">
                <a href="produtos.php" class="link-aside">
                  <i class="fas fa-barcode"></i>
                  Produtos
                </a>
              </li>
              <li class="li-home li-mobile" id="catalogo-li">
                <a href="catalogo.php" class="link-aside">
                  <i class="fas fa-clipboard-list"></i>
                  Catálogo
                </a>
              </li>
              <li class="li-home">
                <a href="./controle/deslogar.php" class="link-aside" id="logout-li">
                  <i class="fas fa-power-off"></i>
                  Sair
                </a>
              </li>
            </ul>
            <script>
              if($(window).width() <= 992){
                $('.li-mobile').hide();
              }
            </script>