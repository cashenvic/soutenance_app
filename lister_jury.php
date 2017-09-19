<!DOCTYPE html>
<html>
	<head>
		<title>Liste des jury</title>
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

			$req = $pdo->query('SELECT * from jury');
		
			echo '<h1>Liste des jurys</h1>';
			if($req->rowCount()!=0){

				$req1 = $pdo->query('SELECT * from jury j, enseignant e where j.codeEnsPr=e.num_ens');
				$req2 = $pdo->query('SELECT * from jury j, enseignant e where j.codeEnsM1=e.num_ens');
				$req3 = $pdo->query('SELECT * from jury j, enseignant e where j.codeEnsM2=e.num_ens');

		        echo '<table width="80%" class="resultTable table table-striped">
		                    <thead>
		                        <th>Numéro de jury</th>
		                        <th>President</th>
		                        <th>Membre 1</th>
		                        <th>Membre 2</th>
		                    </thead>
		                    <tbody>';

		        while ($donnees = $req->fetch())
		            {   
		            	$pr=$req1->fetch(); $m1=$req2->fetch(); $m2=$req3->fetch();
		                echo "<tr>";
		                    echo '<td>'.$donnees['num_jury'].'</td>';
		                    echo '<td>'.$pr['nom_ens'].' '.$pr['prenom_ens'].'</td>';
		                    echo '<td>'.$m1['nom_ens'].' '.$m1['prenom_ens'].'</td>';
		                    echo '<td>'.$m2['nom_ens'].' '.$m2['prenom_ens'].'</td>';
		                echo '</tr>';
		            }

		        echo    '</tbody>
		             </table>';
		    }

		    else
		        echo '<h1 style="color: gray;">Aucun résultat</h1>';
		    $pdo=null;
		?>
	</body>
</html>