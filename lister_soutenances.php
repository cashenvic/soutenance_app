<!DOCTYPE html>
<html>
	<head>
		<title>Liste des soutenances</title>
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

			$req = $pdo->query('SELECT s.id_soutenance, p.titre, p.specialite, s.num_jury, s.decision, s.mention from soutenance s, pfe p where s.num_pfe=p.num_pfe;');

			echo '<h1 class="shadow">Liste des soutenances</h1>';
			if($req->rowCount() !=0 ){

		        echo '<table width="80%" class="resultTable table table-striped">
		                    <thead>
		                        <th>Numéro</th>
		                        <th>Titre du projet</th>
		                        <th>Spécialité</th>
		                        <th>Numéro du jury</th>
		                        <th>Décision</th>
		                        <th>Mention</th>
		                    </thead>
		                    <tbody>';

		        while ($donnees = $req->fetch())
		            {   
		                echo '<tr>';
		                    echo '<td>'.$donnees['id_soutenance'].'</td>';
		                    echo '<td>'.$donnees['titre'].	'</td>';
		                    echo '<td>'.$donnees['specialite']. 	'</td>';
		                    echo '<td>'.$donnees['num_jury'].'</td>';
		                    echo '<td>'.$donnees['decision'].'</td>';
		                    echo '<td>'.$donnees['mention'].'</td>';
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
