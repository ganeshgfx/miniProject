const site = ".";
function signup() {
	const user_id = document.getElementById("user_id");
	const password = document.getElementById("password");
	if (user_id.value != "" && password.value != "") {
		$.ajax({
			url: site + "/php/signup.php",
			method: "POST",
			data: {
				user_id: user_id.value,
				password: password.value,
			},
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				if (data.alreadyExist) {
					alert("User name already exists");
				}
				if (data.created) {
					location.reload();
				}
			},
		});
	} else {
	}
}
function login() {
	const user_id = document.getElementById("user_id");
	const password = document.getElementById("password");
	if (user_id.value != "" && password.value != "") {
		$.ajax({
			url: site + "/php/login.php",
			method: "POST",
			data: {
				user_id: user_id.value,
				password: password.value,
			},
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				if (!data.loggedIn) {
					alert("Check your username or password");
				} else {
					location.reload();
				}
			},
		});
	} else {
	}
}
function post() {
	const todoTitle = document.getElementById("todoTitle");
	const todoContent = document.getElementById("todoContent");
	if (todoTitle.value != "" && todoContent.value != "") {
		$.ajax({
			url: site + "/php/postTodo.php",
			method: "POST",
			data: {
				title: todoTitle.value,
				content: todoContent.value,
			},
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				if (!data.sent) {
					alert("Error posting todo");
				}
				if (data.sent) {
					location.reload();
				}
			},
		});
	} else {
	}
}
function loadTodo() {
	$.ajax({
		url: site + "/php/postTodo.php",
		method: "POST",
		data: {
			title: todoTitle.value,
			content: todoContent.value,
		},
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			if (!data.sent) {
				alert("Error posting todo");
			}
			if (data.sent) {
				location.reload();
			}
		},
	});
}
