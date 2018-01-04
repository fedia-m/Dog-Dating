<?php
require_once '../config.php';
require_once 'header.php';
require_once 'menu.php';
require_once '../classes/race.php';

$oRace = Races::getInstance($bdd);
$oCollRace = $oRace->getCollection();
?>
  <div class="probootstrap-bar">
    <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a>
    </a>
  </div>

<form class="form-horizontal" action="#" method="post">
<fieldset>

<!-- Form Name -->
<legend>Inscription de l'animal</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nomchien">Nom (*)</label>  
  <div class="col-md-4">
  <input id="nomchien" name="nomchien" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="race">Race (*) </label>
  <div class="col-md-5">
    <select id="race" name="racechien" class="form-control">
      <?php 

      for ($i=0; $i < count($oCollRace) ; $i++) { 
        echo '<option value = ' . $oCollRace[$i]->getId() . '>' . $oCollRace[$i]->getNom() . '</option>'; 
      }

       ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="sexeChien">Sexe (*)</label>
  <div class="col-md-4">
    <select id="sexeChien" name="sexeChien" class="form-control">
      <option value="F">Femelle</option>
      <option value="M">Mâle</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dateNaissance">Date de naissance (*)</label>  
  <div class="col-md-4">
  <input id="dateNaissance" name="dateNaissance" type="date" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lofChien">Lof</label>  
  <div class="col-md-4">
  <input id="lofChien" name="lofChien" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">ex : 2015049585-2016-1</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="numChien">Numéro puce / tatouage</label>  
  <div class="col-md-4">
  <input id="numChien" name="numChien" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">ex : 250 26 10 55101789</span>  
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="photoChien">Photo (*)</label>
  <div class="col-md-4">
    <input id="photoChien" name="photoChien" class="input-file" type="file">
  </div>
</div>
<i><p>(*) : Champs obligatoires.</p></i>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnAjouter"></label>
  <div class="col-md-4">
    <button id="btnAjouter" name="btnAjouter" class="btn btn-success">Ajouter</button>
  </div>
</div>
</fieldset>
</form>

<?php
include "footer.php";
?>