<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Maestro</title>
		
		<base href="http://localhost/maestro2/"/>
		
		<link rel="stylesheet" href="public/css/bootstrap.css">
		<link rel="stylesheet" href="public/css/style.css"/>
		<script src="public/js/jquery-3.1.0.js"></script>
		<script src="public/js/bootstrap.js"></script>
	</head>
	<body>
	<div class="container-fluid">
			<nav class="navbar navbar-default">
			
				<div class="navbar-header">
					<a class="navbar-brand" href="funcionario_lista.php">
						<img class="img-responsive" src="public/img/images.png" style="height:40px"/>
					</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="funcionario_lista.php">Inicial</a>
					</li>
					<li class="active">
						<a href="logout.php">Sair</a>
					</li>
				</ul>
				

		</nav>
		<ol class="breadcrumb">
			<li>
				<a href="#">Inicio</a>
			</li>
		  	<li>
		  		<a href="#">Cursos</a>
		  	</li>
		  	<li class="active">Data</li>
		</ol>
	</div>
{{{content}}}
	</body>
</html>