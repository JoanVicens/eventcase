<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DVD Renter</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		.list-grid {
			display: grid;
			gap: 2rem;
			grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
		}

		.movie-info {
			display: flex;
			flex-direction: column;
			min-height: 200px;
		}

		.movie-info a.btn {
			margin-top: auto;
		}

		#result-cards {
			margin: 0 auto;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}

		#result-cards .card {
			width: 700px;
		}

		#result-cards a.btn {
			margin-bottom: 30px;
			margin-left: auto;
		}

		html,
		body {
			height: 100%;
		}

		footer {
			background-color: black;
			color: white;
			text-align: center;
			bottom: 0;
			width: 100%;
			position: fixed;
			padding: 4px 0;
			font-size: 16px;
			font-weight: bold;
		}
	</style>
</head>

<body>