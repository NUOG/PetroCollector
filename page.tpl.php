<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Петрофізичні дослідження фільтраційно-ємнісних властивостей порід колекторів</title>
	<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
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


  <div class="row">

  	<div class="col-md-6">
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

  	<div class="col-md-6">

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

  	<div class="col-md-12">

  	</div>

  </div><!-- .end row -->

  </div>
  <div class="panel-footer">
  	<p>Вводьте значення тільки в поля, котрі відзначені галочкою</p>
  </div>
</div>



</div> <!-- end .container -->

</body>
</html>

