<?php 

	session_start(); 

	$message = "";

	if (isset($_SESSION['message'])) {

		$message = $_SESSION['message'];

		$_SESSION['message'] = "";
 	}

	require_once "database.php";

	$imagens = getAll();

	if(count($imagens) > 0) {

		$treatment = array();

		foreach($imagens as $imagem) {

			$format = "data:image;base64,{$imagem['imagem']}";

			array_push( $treatment , $format );

		}

		$imagens = $treatment;
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Title</title>
</head>
<body>


	<p> <?= $message ?></p>

	<form action="save.php" enctype="multipart/form-data" method="POST">
		
		<input type="file" name="imagem" required />

		<button type="submit"> Submit </button>
	</form>

	<hr />

	<?php 
		if(count($imagens) > 0): 

			foreach($imagens as $imagem):
	?>

				<img src="<?= $imagem  ?>" style="width: 300px; height: 300px;" />

	<?php
			endforeach;
		endif;
	?>

</body>
</html>