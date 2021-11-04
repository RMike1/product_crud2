
<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=product_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * from products ORDER BY date DESC');
$statement->execute();
$products=$statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!Doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="app.css">
		<title>Product Crud</title>
	</head>
	<body style="background-color:#9aa5af">
		<h1>Product Crud</h1>

		<p>
			<a href="Create.php" class="btn btn-success">Create Product</a>
		</p>
		
		<table class="table">
			<thead>
				<tr>
					<th scope="col">##</th>
					<th scope="col">Image</th>
					<th scope="col">Title</th>
					<th scope="col">Price</th>
					<th scope="col">Date</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($products as $i => $product ): ?>
				<tr>
					<td scope="row"><?php echo $i + 1 ?></td>
					<td scope="row"><?php echo $product['title'] ?></td>
					<td scope="row"><?php echo $product['price'] ?></td>
					<td scope="row"><?php echo $product['date'] ?></td>
					<td>
						<button type="button" class="btn btn-secondary">Edit</button>
						<button type="button" class="btn btn-danger">Delete</button>
					</td>
					
				</tr>
				<?php endforeach ?>
			
				
			</tbody>
		</table>

		
	</body>
</html>