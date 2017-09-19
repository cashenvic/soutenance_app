<!DOCTYPE html>
<html>
	<head>
		<title>Ajouter un enseignant</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
		<link rel="icon" href="faso.png"/>
	</head>

	<body>
		<?php 
			include 'menu.php'; 
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<fieldset>
				<legend><span>Ajouter un enseignant</span></legend>
				<table>
					<tr>
						<td><label>Nom:</label></td>
						<td><input class="form-control" type="text" name="nom" required/></td>
					</tr>
					<tr>
						<td><label>Prénom:</label></td>
						<td><input class="form-control" type="text" name="prenom" required/></td>
					</tr>
					<tr>
						<td><label>Spécialité:</label></td>
						<td><input class="form-control" type="text" name="specialite" required/></td>
					</tr>
				</table>
				
				<div class="formTab">
					<input class="btn btn-primary" type="submit" name="send" value="Ajouter"/>&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" type="reset" name="effacer" value="Effacer"><hr/>
				</div>
			</fieldset>
		</form>
		<?php
			include 'connect.php';

			if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['specialite'])){
				$specialite=$_POST['specialite'];
				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];

				$stmt=$pdo->prepare("INSERT INTO enseignant (nom_ens, prenom_ens, specialite) VALUES (?, ?, ?);");
				$param = array($nom, $prenom, $specialite);
				$stmt->execute($param);

				if(($stmt->rowCount())==0)
					include 'insert_failed.php';
				else
					include 'insert_success.php';

				$specialite=null;
				$nom=null;
				$prenom=null;
				$stmt=null;
			}
		?>
	</body>
</html>