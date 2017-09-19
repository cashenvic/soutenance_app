<!DOCTYPE html>
<html>
	<head>
		<title>Ajouter une soutenance</title>
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
				<legend><span>Ajouter une soutenance</span></legend>
				<table>
					<tr>
						<td><label>Titre du Projet:</label></td>
						<td><!-- <select name="codeEnsPr"></select> -->
							<?php
								include 'connect.php';

								$query = $pdo->query("SELECT * FROM pfe;");
						    	echo '<select class="form-control" name="num_pfe">';
						    	while ($val = $query->fetch()) {
						    		//var_dump($val);
						             echo '<option value="'.$val['num_pfe'].'">'.$val['titre'].'</option>';
								}
						    	echo '</select>';
							?>
						</td>
					</tr>
					<tr>
						<td><label>Numéro de la session:</label></td>
						<td><!-- <select name="codeEnsM1"></select> -->
							<?php
								include 'connect.php';

								$query = $pdo->query("SELECT num_session FROM session;");
						    	echo '<select class="form-control" name="num_session">';
						    	while ($val = $query->fetch()) {
						    		//var_dump($val);
						             echo '<option value="'.$val['num_session'].'">'.$val['num_session'].'</option>';
								}
						    	echo '</select>';
							?>
						</td>
					</tr>
					<tr>
						<td><label>Numéro du jury:</label></td>
						<td><!-- <select name="codeEnsM2"></select> -->
							<?php
								include 'connect.php';

								$query = $pdo->query("SELECT num_jury FROM jury;");
						    	echo '<select class="form-control" name="num_jury">';
						    	while ($val = $query->fetch()) {
						    		//var_dump($val);
						             echo '<option value="'.$val['num_jury'].'">'.$val['num_jury'].'</option>';
								}
						    	echo '</select>';
							?>
						</td>
					</tr>
					<tr>
						<td><label>Décision:</label></td>
						<td>
							<select  class="form-control" name="decision">
								<option value="Ajourné">Ajourné(e)</option>
								<option value="Admis">Admis(e)</option>	
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Mention:</label></td>
						<td>
							<select  class="form-control" name="mention">
								<option value="Passable">Passable</option>
								<option value="Assez-bien">Assez-Bien</option>
								<option value="Bien">Bien</option>
								<option value="Tres-bien">Très-Bien</option>
								<option value="Excelent">Excelent</option>	
							</select>
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

			if(isset($_POST['num_pfe']) && isset($_POST['num_session']) && isset($_POST['num_jury']) && isset($_POST['decision']) && isset($_POST['mention'])){

				$numPFE=$_POST['num_pfe'];
				$num_session=$_POST['num_session'];
				$num_jury=$_POST['num_jury'];
				$decision=$_POST['decision'];
				$mention=$_POST['mention'];

				$stmt=$pdo->prepare("INSERT INTO soutenance (num_pfe, num_session, num_jury, decision, mention) VALUES (?, ?, ?, ?, ?);");
				$param = array($numPFE, $num_session, $num_jury, $decision, $mention);
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
		?>
	</body>
</html>