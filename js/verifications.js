import { verifyCode, displayError, clearErrorOnInputFocus } from "./imports/verifications.js";
import { PostData } from "./imports/dataPost.js";
// Submitting form

(function () {
	let form = document.querySelector("form");
	form.addEventListener("submit", (e) => {
		e.preventDefault();
		let formData = new FormData(form);
		let code = formData.get("code");
		if (!code) {
			displayError("Please fill in all fields ");
			return;
		}
		let validity = verifyCode(code);
		if (validity !== true) return displayError(validity);

		// Post data to php
		let postString = `type=verify&code=${code}`;

		let post = new PostData("ajax/verifications.ajax.php", postString);
		post.sendRequest(function (response) {
			if (response === "success") {
				window.location.href = "./chat";
			} else {
				displayError(response);
			}
		});
	});
	clearErrorOnInputFocus(form);
})();
