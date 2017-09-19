<!DOCTYPE html>
<html>
	<head>
		<title>Ajouter un étudiant</title>
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
				<legend><span>Ajouter un étudiant</span></legend>
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
						<td><label>Projet:</label></td>
						<td><?php
								include 'connect.php';

								$query = $pdo->query("SELECT * FROM pfe;");
						    	echo '<select class="form-control" name="numPFE">';
						    	while ($val = $query->fetch()) {
						    		//var_dump($val);
						             echo '<option value="'.$val['num_pfe'].'">'.$val['titre'].'</option>';
								}
						    	echo '</select>';
						    ?>
					    </td>
					</tr>
				</table>
				
				<div class="formTab">
					<input class="btn btn-primary" type="submit" name="send" value="Ajouter"/>&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" type="reset" name="effacer" value="Effacer"><hr/>
				</div>
			</fieldset>
		</form>
		<?php
			include 'connect.php';

			if(isset($_POST['numPFE'])){

				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$numPFE=$_POST['numPFE'];

				$stmt=$pdo->prepare("INSERT INTO etudiant (nom_etud, prenom_etud, num_pfe) VALUES (?, ?, ?);");
				$param = array($nom, $prenom, $numPFE);
				$stmt->execute($param);

				if(($stmt->rowCount())==0)//si le nombre de ligne affecté est nul
					include 'insert_failed.php';
				else
					include 'insert_success.php';

				$matricule=null;
				$nom=null;
				$prenom=null;
				$numPFE=null;
				$stmt=null;
			}
		?>
	</body>
</html>