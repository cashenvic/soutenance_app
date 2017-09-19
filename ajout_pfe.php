<!DOCTYPE html>
<html>
	<head>
		<title>Ajouter un projet de fin d'étude</title>
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
				<legend><span>Ajouter un projet de fin d'étude</span></legend>
				<table>
					<tr>
						<td><label>Titre:</label></td>
						<td><input class="form-control" type="text" name="titre" required/></td>
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

			if(isset($_POST['titre']) && isset($_POST['specialite'])) {

				$titre=$_POST['titre'];
				$specialite=$_POST['specialite'];

				$stmt=$pdo->prepare("INSERT INTO pfe (titre, specialite) VALUES (?, ?);");
				$param = array($titre, $specialite);
				$stmt->execute($param);

				if(($stmt->rowCount())==0)//si le nombre de ligne affecté est nul
					include 'insert_failed.php';
				else
					include 'insert_success.php';
				
				$titre=null;
				$specialite=null;
				$stmt=null;
			}
		?>
	</body>
</html>