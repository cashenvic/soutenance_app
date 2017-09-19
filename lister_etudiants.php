<!DOCTYPE html>
<html>
	<head>
		<title>Liste des étudiants</title>
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

			$req = $pdo->query('SELECT e.num_etud, e.nom_etud, e.prenom_etud, p.titre from etudiant e, pfe p where e.num_pfe=p.num_pfe;');

			echo '<h1>Liste des étudiants</h1>';
			if($req->rowCount()!=0){

		        echo '<table width="80%" class="resultTable table table-striped">
		                    <thead>
		                        <th>Matricule</th>
		                        <th>Nom</th>
		                        <th>Prénom</th>
		                        <th>Projet</th>
		                    </thead>
		                    <tbody>';

		        while ($donnees = $req->fetch())
		            {   
		                echo "<tr>";
		                    echo '<td>'.$donnees['num_etud'].     '</td>';
		                    echo '<td>'.$donnees['nom_etud'].'</td>';
		                    echo '<td>'.$donnees['prenom_etud'].    '</td>';
		                    echo '<td>'.$donnees['titre'].       '</td>';
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