<?php 
require_once 'config.php';
require_once 'connexion_bdd.php';
require_once 'classes/ville.php';

$oVille = Villes::getInstance($bdd);
$oCollVille = $oVille->getCollection();


 ?><!DOCTYPE html>
<html>
<head>
  <title>Bootstrap-select test page</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-select.css">

  <style>
    body {
      padding-top: 70px;
    }
  </style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap-select.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Bootstrap-select usability tests</a>
    </div>
  </div>
</nav>

<div class="container">
 

  <hr>


  <hr>
  <form class="form-horizontal" role="form">
    <div class="form-group">
      <label for="basic2" class="col-lg-2 control-label">"Basic" (multiple, maxOptions=1)</label>

      <div class="col-lg-10">
        <select id="basic2" class="show-tick form-control" multiple>
      <?php 

      for ($i=0; $i < count($oCollVille) ; $i++) { 
        echo '<option value = ' . $oCollVille[$i]->getId() . '>' . $oCollVille[$i]->getNom() . '</option>'; 
      }

       ?>
    </select>
      </div>
    </div>
  </form>

  <hr>
  

    </div>
    <!-- .container-fluid -->
  </nav>

  <hr>


  <hr>
  
</div>

<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
</body>
</html>
