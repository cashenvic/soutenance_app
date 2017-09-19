<?php
	
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
		echo "La date de debut est: ".$dateDeb;
		echo "<br>La date de fin est: ".$dateFin;
		echo "<br>La date actuelle est: ".date("Y-m-d");
	}
?>