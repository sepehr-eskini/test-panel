window.onload = function() {
	// show password
	var eyeIconBig = document.getElementsByClassName("eye-icon-big");
	var passwordInputBig = document.getElementsByClassName("show-password");
	for (let i = eyeIconBig.length - 1; i >= 0; i--) {
		eyeIconBig[i].onclick = function() {
			if(passwordInputBig[i].type === "password") {
				passwordInputBig[i].type = "text";
				eyeIconBig[i].classList.remove("fa-eye");
				eyeIconBig[i].classList.add("fa-eye-slash");
			} else {
				passwordInputBig[i].type = "password";
				eyeIconBig[i].classList.remove("fa-eye-slash");
				eyeIconBig[i].classList.add("fa-eye");
			}
		}
	}

	var eyeIconSmall = document.getElementsByClassName("eye-icon-small");
	var passwordInputSmall = document.getElementsByClassName("show-password");
	for (let i = eyeIconSmall.length - 1; i >= 0; i--) {
		eyeIconSmall[i].onclick = function() {
			if(passwordInputSmall[i].children[0].type === "password") {
				passwordInputSmall[i].children[0].type = "text";
				eyeIconSmall[i].classList.remove("fa-eye");
				eyeIconSmall[i].classList.add("fa-eye-slash");
			} else {
				passwordInputSmall[i].children[0].type = "password";
				eyeIconSmall[i].classList.remove("fa-eye-slash");
				eyeIconSmall[i].classList.add("fa-eye");
			}
		}
	}

	// another thing

}
