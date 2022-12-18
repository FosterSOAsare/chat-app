// Fetching countries and setting up select field
import { countries } from "./imports/country.js";
import { PostData } from "./imports/dataPost.js";
import { phoneVerification, displayError, clearError } from "./imports/verifications.js";
setValues(countries[0].name);

phoneVerification("004567890");
// Creating option fields in select
(async function () {
	let select = document.querySelector(".country select");
	countries.forEach((e) => {
		let option = document.createElement("option");
		option.setAttribute("value", e.name);
		option.textContent = e.name.length < 30 ? e.name : `${e.name.substring(0, 30)}...`;
		select.appendChild(option);
	});
})();

(function () {
	let select = document.querySelector(".country select");
	let inputs = document.querySelectorAll("#inputSection input");
	select.addEventListener("change", () => {
		setValues(select.value);
	});
	select.addEventListener("focus", clearError);
	inputs.forEach((e) => {
		e.addEventListener("focus", clearError);
	});
})();

// Setting image
function setValues(name) {
	let data = countries.find((e) => e.name === name);
	let flag = document.querySelector(".flag img");
	flag.src = data.flag;
	let code = document.querySelector(".code");
	code.textContent = data.code;
}

// Form Submission
(function () {
	let form = document.querySelector("form");
	form.addEventListener("submit", (e) => {
		e.preventDefault();
		let formData = new FormData(form);
		let country = formData.get("country");
		let code = document.querySelector(".code").textContent;
		let phone = formData.get("phone");
		let ver = phoneVerification(parseInt(phone));
		if (!phone) {
			displayError("Please fill in all fields");
			return;
		}
		if (ver !== true) {
			displayError(ver);
			return;
		}
		let postString = `phone=${parseInt(phone)}&code=${code}&type=login&country=${country}`;

		let post = new PostData("ajax/verifications.ajax.php", postString);
		post.sendRequest(function (response) {
			if (response === "success") {
				window.location.href = "./verifications";
			} else {
				displayError(response);
			}
		});
	});
})();

(function () {})();
