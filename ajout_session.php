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
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<fieldset>
				<legend><span>Ajouter une session</span></legend>
				<table>
					<tr>
						<td><label>Date de debut:</label></td>
						<td><input class="form-control" type="date" name="dateDeb" required="" placeholder="aaaa/mm/jj" /></td>
					</tr>
					<tr>
						<td><label>Date de fin:</label></td>
						<td><input class="form-control" type="date" name="datefin" required="" placeholder="aaaa/mm/jj"/></td>
					</tr>
				</table>
				
				<div class="formTab">
					<input class="btn btn-primary" type="submit" name="send" value="Ajouter"/>&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" type="reset" name="effacer" value="Effacer"><hr/>
				</div>
			</fieldset>
		</form>
		<?php
			include 'connect.php';

			if(isset($_POST['dateDeb']) && isset($_POST['datefin'])){
				$dateDeb=$_POST['dateDeb'];
				$dateFin=$_POST['datefin'];

				if($dateDeb<=$dateFin && $dateDeb>date("Y-m-d")){
					$stmt=$pdo->prepare("INSERT INTO session (date_deb, date_fin) VALUES (?, ?);");
					$param = array($dateDeb, $dateFin);
					$stmt->execute($param);

					if(($stmt->rowCount())==0)//si le nombre de ligne affecté est nul
						include 'insert_failed.php';
					else{
						include 'insert_success.php';
					}
				}else
					include 'insert_incorrect_date.php';

				$dateDeb=null;
				$dateFin=null;
				$stmt=null;
			}
		?>
	</body>
</html>