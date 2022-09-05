<?php
	require_once 'db.php';

	$db = new Database();

	if (isset($_POST['action']) && $_POST['action'] == "view")
	{
		$i =1;
		$output = '';
		$data = $db->read();

		if ($db->totalRowCount()>0) {
			$output .='<table class="table table-striped table-sm table-bordered">
						<thead class="text-center">
							<tr>
								<th>N°</th>
								<th>Nom</th>
								<th>Prénom</th>
								<th>E-mail</th>
								<th>N° Téléphone</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>';
			foreach ($data as $row) {
				$output .='<tr class="text-secondary">
								<td class="text-center">'.$i++.'</td>
								<td>'.$row['nom'].'</td>
								<td>'.$row['prenom'].'</td>
								<td>'.$row['email'].'</td>
								<td>'.$row['phone'].'</td>
								<td class="text-center">
									<a href="#" id="'.$row['id'].'" title="Détails" class="text-success infoBtn" ><i class="fas fa-info-circle fa-lg"></i></a>

									<a href="#" id="'.$row['id'].'" title="Modifier" class="text-primary editBtn" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit fa-lg ml-2"></i></a>

									<a href="#" id="'.$row['id'].'" title="Supprimer" class="text-danger delBtn"><i class="fas fa-trash-alt fa-lg ml-2"></i></a>
								</td>
							</tr>';
			}

			$output .='</tbody></table>';
			echo $output;
		}
		else{
			echo '<h3 class="text-center text-secondary mt-6">:( Aucun utilisateur dans la base de données !!</h3>';
		}
	}

	if (isset($_POST['action']) && $_POST['action'] == "insert") 
	{
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		$db->insert($nom,$prenom,$email,$phone);
	}

	if (isset($_POST['edit_id'])) {
		$id = $_POST['edit_id'];

		$row = $db->getUserById($id);

		echo json_encode($row);
	}

	if (isset($_POST['action']) && $_POST['action'] =="modifie") {
		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$phone =$_POST['phone'];

		$db->update($id,$nom,$prenom,$email,$phone);
	}

	if (isset($_POST['del_id'])) {
		$id = $_POST['del_id'];

		$db->delete($id);
	}

	if (isset($_POST['info_id'])) {
		$id = $_POST['info_id'];

		$row = $db->getUserById($id);
		echo json_encode($row);
	}

	if (isset($_GET['export']) && $_GET['export'] == "excel") {
		header("Content-Type:application/xls");
		header("Content-Disposition:attachement;filename=utilisateur.xls");
		header("Pragma:no-cache");
		header("Expires:0");

		$data = $db->ExportExcel();
		echo '<table border="1">';
		echo '<tr>
				<th>ID</th>
				<th>NOM</th>
				<th>PRENOM</th>
				<th>EMAIL</th>
				<th>TELEPHONE</th>
			</tr>';
			foreach ($data as $row) {
				echo '<tr>
					<td>'.$row['id'].'</td>
					<td>'.$row['nom'].'</td>
					<td>'.$row['prenom'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['phone'].'</td>
				</tr>';
			}
		echo '</table>';
	}
?>