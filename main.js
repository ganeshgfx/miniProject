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
	const containTodo = document.getElementById("containTodo");
	$.ajax({
		url: site + "/php/fetchTodo.php",
		method: "POST",
		data: {
			title: todoTitle.value,
			content: todoContent.value,
		},
		dataType: "JSON",
		success: function (data) {
			containTodo.innerHTML = "";
			let todoList = "";
			data.forEach((data) => {
				todo = data.todo;
				todoList += `<div class="card" ><div style="max-width: 18rem;" class="card-body"><h5 class="card-title">${todo.title} ~<i>${todo.user_id} </i></h5><p class="card-text">${todo.content}</p><button type="button" onclick="pin(${data.todo.todo_id})" class="btn btn-info"> <i class="bi bi-pin-angle"></i>Pin <span class="badge badgeX badge-pill badge-light">${data.pins}</span></button></div></div>`;
			});
			containTodo.innerHTML = todoList;
			console.log(data);
		},
	});
}
loadTodo();

function pin(id) {
	$.ajax({
		url: site + "/php/pin.php",
		method: "POST",
		data: {
			todo_id: id,
		},
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			loadTodo();
		},
	});
}
