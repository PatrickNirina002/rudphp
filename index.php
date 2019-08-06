<?php  include('php_code.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM eleves WHERE id=$id");

		if (@count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$nom = $n['nom'];
			$prenom = $n['prenom'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="style.css"/>
</head>
<body>


<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

	<form method="post" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Nom</label>
			<input type="text" name="nom" value="<?php echo $nom; ?>" required>
		</div>
		<div class="input-group">
			<label>Prenom</label>
			<input type="text" name="prenom" value="<?php echo $prenom; ?>" required>
		</div>
		<div class="input-group">
		<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >ajouter</button>
<?php endif ?>
		</div>

        
	</form>
	<?php $results = mysqli_query($db, "SELECT * FROM eleves"); ?>

<table>
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
		    <td><?php echo $row['id']; ?></td>
			<td><?php echo $row['nom']; ?></td>
			<td><?php echo $row['prenom']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="php_code.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
</body>


</html>
