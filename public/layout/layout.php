<html>
	<head>
		<title>Maestro</title>
				
		<base href="http://localhost/maestro2/"/>
		
		<link rel="stylesheet" href="public/css/bootstrap.css">
		<link rel="stylesheet" href="public/css/style.css"/>
		<script src="public/js/jquery-3.1.0.js"></script>
		<script src="public/js/bootstrap.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
	</head>
	<body>
	<div class="container-fluid">
		<nav class="navbar navbar-default">
		
			<div class="navbar-header">
				<a class="navbar-brand" href="dashboard/index">
					<img class="img-responsive" src="public/img/images.png" style="height:40px"/>
				</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active">
					<a href="dashboard/index">Inicial</a>
				</li>
				<li>
					<a href="cursos/listar">Cursos</a>
				</li>
				<li >
					<a href="professor/listar">Professores</a>
				</li>
				<li>
					<a href="alunos/listar">Alunos</a>
				</li>
				<li>
					<a href="perfil/index">configurações</a>
				</li>
			</ul>
			

		</nav>
		<ol class="breadcrumb">
			<li>
				<a href="#">Inicio</a>
			</li>
		  	<li>
		  		<a href="http://localhost/maestro2/cursos/listar">Cursos</a>
		  	</li>
		  	<li>
		  		<a href="http://localhost/maestro2/cursos/listar">Professores</a>
		  	</li>
		  	<li class="active">Data</li>
		</ol>
	</div>
	<div class="container">
{{{content}}}
	</div>
	</body>
</html>