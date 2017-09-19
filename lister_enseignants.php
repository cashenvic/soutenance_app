<!DOCTYPE html>
<html>
	<head>
		<title>Liste des enseignants</title>
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

			$req = $pdo->query('SELECT * from enseignant;');

			echo '<h1>Liste des enseignants</h1>';
			if($req->rowCount()!=0){

		        echo '<table width="80%" class="resultTable table table-striped">
		                    <thead>
		                        <th>Numéro</th>
		                        <th>Nom</th>
		                        <th>Prénom</th>
		                        <th>Spécialité</th>
		                    </thead>
		                    <tbody>';

		        while ($donnees = $req->fetch())
		            {   
		                echo "<tr>";
		                    echo '<td>'.$donnees['num_ens'].    '</td>';
		                    echo '<td>'.$donnees['nom_ens'].	'</td>';
		                    echo '<td>'.$donnees['prenom_ens']. '</td>';
		                    echo '<td>'.$donnees['specialite']. '</td>';
		                echo '</tr>';
		            }

		        echo    '</tbody>
		             </table>';
		    }

		    else
		        echo '<h1 style="color: gray;">Aucun résultat</h1>';
		?>
	</body>
</html>