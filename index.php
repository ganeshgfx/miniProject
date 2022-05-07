<?php
session_start();
?>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css" />
	<link rel="shortcut icon" href="favicon.svg" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
	<title>Global To-do list</title>
	<script>
		let user_id = '';
		<?php
		if (isset($_SESSION['user_id'])) {
			echo "user_id = '" . $_SESSION['user_id'] . "'";
		}
		?>
	</script>
</head>

<body>
	<div class="mainBody">
		<div class="containTodo" id="containTodo">
			<div class="card" style="width: 18rem">
				<div class="card-body">
					<h5 class="card-title">
						Card title ~<i>Laden</i>
					</h5>
					<p class="card-text">
						Some quick example text to build on the card
						title and make up the bulk of the card's
						content.
					</p>
					<button type="button" class="btn btn-info">
						<i class="bi bi-pin-angle"></i>
						Pin
						<span class="badge badgeX badge-pill badge-light">9</span>
					</button>
				</div>
			</div>
		</div>
		<div>
			<nav class="navbar navbar-light bg-light">
				<div class="container-fluid">
					<span><i class="bi bi-tropical-storm"></i><span class=""> Global Todo</span></span>

					<?php
					if (isset($_SESSION['user_id'])) {
						echo
						'<button data-bs-toggle="modal" data-bs-target="#todoModal" id="newToDo" type="button" class="btn btn-primary"><i class="bi bi-plus-circle-dotted"></i><span class="hide_text2"> New Todo</button>';
					} else {
						echo
						'';
					}
					?>

					<?php
					if (isset($_SESSION['user_id'])) {
						echo
						'<div><button type="button" class="btn"><i class="bi bi-person-circle"></i><span class="hide_text"> ' . $_SESSION['user_id'] . '</span></button><a class="btn" href="./php/logout.php" role="button"><i class="bi bi-power"></i><span class="hide_text"> Logout</span></a><div>';
					} else {
						echo
						'<button data-bs-toggle="modal" data-bs-target="#loginModal" type="button" class="btn"><i class="bi bi-person-circle"></i> Login</button>';
					}
					?>


				</div>
			</nav>
		</div>
	</div>
	<div class="modal todoModal fade" id="todoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">
						New todo item
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Title</span>
						<input id="todoTitle" type="text" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1" />
					</div>
					<div class="input-group">
						<span class="input-group-text">Content</span>
						<textarea id="todoContent" class="form-control" aria-label="With textarea" rows="5"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" onclick="post();" class="btn btn_color btn-primary">
						<i class="bi bi-send"></i>
						Post
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal todoModal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">
						Sign up / Login
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">@</span>
						<input id="user_id" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
						<input id="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn_color btn-secondary" onclick="signup();">
						Sign Up
					</button>
					<button onclick="login();" type="button" class="btn btn_color2 btn_color btn-primary">
						Login
					</button>
				</div>
			</div>
		</div>
	</div>
	<script src="main.js"></script>
</body>

</html>