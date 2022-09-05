<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
	<title>CRUD POO AJAX</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome-4.7.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<a class="navbar-brand" href="#"><i class="fas fa-dove fa-lg"></i> CRUD</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="#" class="nav-link text-white">Accueil</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link text-white">Blog</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link text-white">Apropos</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link text-white">Contact</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="text-center text-danger font-weight-normal my-3">CRUD Application Utilisant Bootstrap 4,PHP-POO,PDO-MySQL,Ajax,Datatable et SweetAlert 2</h4>
			</div>
		</div>
		<hr class="my-1">
		<div class="row">
			<div class="col-lg-6">
				<h4 class="mt-1 text-primary font-weight-bold">Tous les utilisateurs dans la BDD !</h4>
			</div>
			<div class="col-lg-6">
				<button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addModal"><i class="fas fa-user-plus"></i><b class="ml-2">Ajout Utilisateur</b></button>
				<a href="action.php?export=excel" class="btn btn-success m-1 float-right"><i class="fas fa-download"></i><b class="ml-2">Export en Excel</b></a>
			</div>
		</div>
		<hr class="my-1">
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive mt-3" id="showUser">
					<h3 class="text-center text-success" style="margin-top: 150px;">Loading...</h3>
				</div>
			</div>
		</div>
	</div>



	<div class="modal fade" id="addModal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Ajout Nouveau Utilisateur</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body px-4">
					<form action="" method="post" id="form-data">
						<div class="form-group">
							<input type="text" name="nom" class="form-control" placeholder="Nom" required>
						</div>
						<div class="form-group">
							<input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="E-mail" required>
						</div>
						<div class="form-group">
							<input type="tel" name="phone" class="form-control" placeholder="N° Téléphone" required>
						</div>
						<div class="form-group">
							<input type="submit" name="insert" id="insert" class="btn btn-danger btn-block" value="Ajout Utilisateur">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="editModal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Modification d'utilisateurs</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body px-4">
					<form action="" method="post" id="edit-form-data">
						<input type="hidden" name="id" id="id">
						<div class="form-group">
							<input type="text" name="nom" id="nom" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="text" name="prenom" id="prenom" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="tel" name="phone" id="phone" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="submit" name="mofifie" id="modifie" class="btn btn-primary btn-block" value="Modifie Utilisateur">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
	<script src="assets/js/all.js"></script>
	<script src="assets/js/datatables.min.js"></script>
	<script src="assets/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>


</table>