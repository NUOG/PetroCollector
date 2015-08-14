<?php

require("function.php");

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="favicon.ico">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Петрофізичні дослідження фільтраційно-ємнісних властивостей порід колекторів</title>
	<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/bootstrap-select/bootstrap-select/dist/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="vendor/cross-solution/bootstrap3-dialog/dist/css/bootstrap-dialog.css">
	<script type="text/javascript" src="vendor/components/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendor/bootstrap-select/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="vendor/cross-solution/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>

<div class="container">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Переключити навігацію</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">PetroCollector</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <!--
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div>
    -->
    <!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Введення початкових даних</h3>
  </div>
  <div class="panel-body">

  <form id="PetroCollectorForm">

  <div class="row">

  	<div class="col-md-4">
  		<!-- dep 1 -->
		<label class="control-label">
			Залежність К<sub>п</sub> і К<sub>п.д</sub>
		</label>
		<div class="input-group">
			<span class="input-group-addon">
				<input type="checkbox" name="dependence-chb-1"> 
			</span>
			<input type="text" class="form-control" name="dependence-data-1">
		</div><!-- /input-group -->  		
  		<!-- dep 2 -->
		<label class="control-label">
			Залежність К<sub>п</sub> і К<sub>п.еф</sub>
		</label>
		<div class="input-group">
			<span class="input-group-addon">
				<input type="checkbox" name="dependence-chb-2"> 
			</span>
			<input type="text" class="form-control" name="dependence-data-2">
		</div><!-- /input-group -->  		
  		<!-- dep 3 -->
		<label class="control-label">
			Залежність К<sub>пр</sub> і К<sub>п.д</sub>
		</label>
		<div class="input-group">
			<span class="input-group-addon">
				<input type="checkbox" name="dependence-chb-3"> 
			</span>
			<input type="text" class="form-control" name="dependence-data-3">
		</div><!-- /input-group -->  		

  	</div>

  	<div class="col-md-4">

  		<!-- dep 4 -->
		<label class="control-label">
			Залежність К<sub>пр</sub> і К<sub>пр.еф</sub>
		</label>
		<div class="input-group">
			<span class="input-group-addon">
				<input type="checkbox" name="dependence-chb-4"> 
			</span>
			<input type="text" class="form-control" name="dependence-data-4">
		</div><!-- /input-group -->  		
  		<!-- dep 5 -->
		<label class="control-label">
			Залежність К<sub>п</sub> і К<sub>пр.еф</sub>
		</label>
		<div class="input-group">
			<span class="input-group-addon">
				<input type="checkbox" name="dependence-chb-5"> 
			</span>
			<input type="text" class="form-control" name="dependence-data-5">
		</div><!-- /input-group -->  		
  		
  	</div>

    <div class="col-md-4">

      <!-- dep 6 -->
    <label class="control-label">
      Залежність К<sub>пр.еф</sub> і К<sub>пр.еф</sub>
    </label>
    <div class="form-group">
      <label class="radio-inline">
        <input type="radio" name="dependence-radio-1" id="dependence-radio-1" value="1"> К<sub>пр.еф</sub>
      </label>
      <label class="radio-inline">
        <input type="radio" name="dependence-radio-2" id="dependence-radio-2" value="2"> К<sub>пр.еф</sub>
      </label>    
    </div>  
    <div class="input-group">
      <span class="input-group-addon">
        <input type="checkbox" name="dependence-chb-6"> 
      </span>
      <input type="text" class="form-control" name="dependence-data-6">
    </div><!-- /input-group -->     
      <!-- dep 7 -->
    <label class="control-label">
      Залежність К<sub>п</sub> і К<sub>пр</sub>
    </label>
    <div class="form-group">
      <label class="radio-inline">
        <input type="radio" name="dependence-radio-3" id="dependence-radio-3" value="3"> К<sub>п</sub>
      </label>
      <label class="radio-inline">
        <input type="radio" name="dependence-radio-4" id="dependence-radio-4" value="4"> К<sub>пр</sub>
      </label>    
    </div>      
    <div class="input-group">
      <span class="input-group-addon">
        <input type="checkbox" name="dependence-chb-7"> 
      </span>
      <input type="text" class="form-control" name="dependence-data-7">
    </div><!-- /input-group -->     
      
    </div>


  	<div class="col-md-12">
      <label class="control-label">
        Виберіть таблицю дослідження
      </label>
      <div class="input-group">
      <select class="form-control selectpicker show-tick" name="research">
	<?php
	  getTablesName();
	?>
      </select>
      <span class="input-group-btn">
        <button class="btn btn-default" id="upload-modal-form">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
      </span>
      </div>

      <br />
      <div class="btn-grout pull-right">
        <button type="button" class="btn btn-default" id="clear-form">
          <span class="glyphicon glyphicon-erase" aria-hidden="true"></span>
          Очистити дані
        </button>
        <button type="button" class="btn btn-success" id="send-data">
          <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
          Порахувати
        </button>
      </div>

  	</div>

  </div><!-- .end row -->
  </form>

  </div>
  <div class="panel-footer">
  	<p>Вводьте значення тільки в поля, котрі відзначені галочкою</p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Табличні значення</h3>
  </div>
  <div class="panel-body">

  </div>

</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Графіки</h3>
  </div>
  <div class="panel-body">

  </div>

</div>

<footer class="container">
    &copy; <a title="Розробка сайтів" href="http://brun.if.ua/">Ігор Броновський</a> 2015. Пропозиції/побажання залишайте <a href="http://brun.if.ua/contact">тут</a>. <br>
    Допомогти чи приєднатись до розробки <a href="https://github.com/NUOG/PetroCollector">Github::PetroCollector</a>
</footer>
  
</div> <!-- end .container -->




</body>
</html>

