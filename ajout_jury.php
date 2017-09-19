<!DOCTYPE html>
<html>
	<head>
		<title>Ajouter un jury</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
		<link rel="icon" href="faso.png"/>
	</head>

	<body>
		<?php 
			include 'menu.php'; 
			include 'connect.php';
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<fieldset>
				<legend><span>Ajouter un jury</span></legend>
				<table>
					<tr>
						<td><label>Président de jury:</label></td>
						<td><!-- <select name="codeEnsPr"> -->
							<?php
								$query = $pdo->query("SELECT * FROM enseignant;");
						    	echo '<select class="form-control" name="codeEnsPr">';
						    	while ($val = $query->fetch()) {
						    		//var_dump($val);
						             echo '<option value="'.$val['num_ens'].'">'.$val['nom_ens'].' '.$val['prenom_ens'].'</option>';
								}
						    	echo '</select>';
							?>
						</td>
					</tr>
					<tr>
						<td><label>Enseignant membre 1:</label></td>
						<td><!-- <select name="codeEnsM1"></select> -->
							<?php

								$query = $pdo->query("SELECT * FROM enseignant;");
						    	echo '<select class="form-control" name="codeEnsM1">';
						    	while ($val = $query->fetch()) {
						    		//var_dump($val);
						             echo '<option value="'.$val['num_ens'].'">'.$val['nom_ens'].' '.$val['prenom_ens'].'</option>';
								}
						    	echo '</select>';
							?>
						</td>
					</tr>
					<tr>
						<td><label>Enseignant membre 2:</label></td>
						<td><!-- <select name="codeEnsM2"></select> -->
							<?php

								$query = $pdo->query("SELECT * FROM enseignant;");
						    	echo '<select class="form-control" name="codeEnsM2">';
						    	while ($val = $query->fetch()) {
						    		//var_dump($val);
						             echo '<option value="'.$val['num_ens'].'">'.$val['nom_ens'].' '.$val['prenom_ens'].'</option>';
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
		
			if(isset($_POST['codeEnsPr']) && isset($_POST['codeEnsM1']) && isset($_POST['codeEnsM2'])){

				$numEnsPr=$_POST['codeEnsPr'];
				$numEnsM1=$_POST['codeEnsM1'];
				$numEnsM2=$_POST['codeEnsM2'];

				if (($numEnsPr==$numEnsM1) || ($numEnsM1==$numEnsM2) || ($numEnsPr==$numEnsM2)) {
					echo '<div class="alert alert-danger">
							 	<h2>Veuillez selectionner des noms differents</h2>
							 </div>';
				}
				else{
					$stmt=$pdo->prepare('INSERT INTO jury (codeEnsPr, codeEnsM1, codeEnsM2) VALUES (?, ?, ?);');
					$param = array($numEnsPr, $numEnsM1, $numEnsM2);
					$stmt->execute($param);

					if(($stmt->rowCount())==0)//si le nombre de ligne affecté est nul
						include 'insert_failed.php';
					else
						include 'insert_success.php';

					$numEnsPr=null;
					$numEnsM1=null;
					$numEnsM2=null;
					$stmt=null;
				}
			}
			$pdo=null;
		?>
	</body>
</html>