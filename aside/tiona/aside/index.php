<?php
//require_once '../config.php'; 
//require_once '../classes/chien.php';
//$oChien = Chiens::getInstance($bdd);
//$oCollChien = $oChien->getCollection();

 ?>

  <body>
    
    <?php
require_once '../includes/menu.php';

    ?>


<main role="main" class="probootstrap-main js-probootstrap-main">
      <div class="probootstrap-bar">
        <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a>
        <div class="probootstrap-main-site-logo"><a href="index.html">Aside</a></a></div>
      </div>
      <div class="card-columns">       
<?php 

for ($i=0; $i < count($oCollChien); $i++) { 
  ?>
<div class="card">
          <a href="single.html">
          <img class="card-img-top probootstrap-animate" src="../images/background.jpg" alt="Card image cap" data-animate-effect="fadeIn"><?=$oCollChien[$i]->getNom();?>
          </a>
        </div>
        <?php 
}

 ?>

</div>
    
        

      <div class="container-fluid d-md-none">
        <div class="row">
          <div class="col-md-12">
            <ul class="list-unstyled d-flex probootstrap-aside-social">
              <li><a href="#" class="p-2"><span class="icon-twitter"></span></a></li>
              <li><a href="#" class="p-2"><span class="icon-instagram"></span></a></li>
              <li><a href="#" class="p-2"><span class="icon-dribbble"></span></a></li>
            </ul>
            <p>&copy; 2017 <a href="https://probootstrap.com/" target="_blank">ProBootstrap:Aside</a>. <br> All Rights Reserved. Designed by <a href="https://probootstrap.com/" target="_blank">ProBootstrap.com</a></p>
          </div>
        </div>
      </div>

    </main>

    


    
  </body>
</html>