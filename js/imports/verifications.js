export function phoneVerification(number) {
	number = typeof number === "string" ? parseInt(number) : number;
	if (!number || !/^[0-9]{9,10}$/.test(number)) return "Please enter a valid phone number";
	return true;
}

export function verifyCode(code) {
	if (!code || !/^[0-9]{6}$/.test(code)) return "Please enter a valid code";
	return true;
}

export function displayError(msg) {
	let err = document.querySelector(".err");
	err.textContent = msg;
	err.style.display = "block";
}

export function clearError() {
	let err = document.querySelector(".err");
	err.textContent = "";
	err.style.display = "none";
}

export function clearErrorOnInputFocus(form) {
	let inputs = form.querySelectorAll("input");
	inputs &&
		inputs.forEach((input) => {
			input.addEventListener("focus", clearError);
		});
}
