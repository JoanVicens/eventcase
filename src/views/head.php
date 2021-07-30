<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rent <?php echo $title ?></title>
	<style>
		body {
			margin: 0;
			padding: 0;
		}

		main {
			padding: 10px 30px;
		}

		form {

			padding: 10px;

		}

		input {

			display: block;

			margin-bottom: 15px;

		}

		.list-grid {
			display: grid;
			gap: 2rem;
			grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
		}

		.card {
			border: 2px solid teal;
			background-color: lightsteelblue;
			border-radius: 5px;
			padding: 5px 15px;
			text-align: center;
			display: flex;
			flex-direction: column;
		}

		.card p {
			margin: 8px 0px 16px 0px;
			display: inline;
		}

		a.button {
			-webkit-appearance: button;
			-moz-appearance: button;
			appearance: button;
			background-color: teal;
			color: white;
			font-weight: bold;
			margin: auto 0 16px 0;
			padding: 10px;
			border-radius: 5px;
			text-decoration: none;
		}
	</style>
</head>

<body>
	<!-- <main> -->

	<!-- <h2>Your contact inforamtion</h2>

		<form action="rent/$movieId" method='post'>

			<label for="name">Name</label>
			<input type="text" name="name" placeholder="Phil" required>

			<label for="phone">Contact Phone</lable>
				<input type="text" name="phone" placeholder="123-45-678" required>

				<label for="shippingAddress">Where to Shipping Addres</labal>
					<input type="text" name="shippingAddress" placeholder="5019 Leverton Cove Road" required>

					<label for="email">Contact e-mail</label>
					<input type="email" name="email" placeholder="email@address.com">

					<label for="birthDate">Date of birth</label>
					<input type="date" name="birthDate">

					<input type="submit" value="Rent it!"></input>
		</form>
	</main>
</body> -->