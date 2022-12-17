export function postData(path, data) {
	let result = "";
	let xhr = new XMLHttpRequest();
	xhr.open("POST", path);

	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(data);

	xhr.addEventListener("readystatechange", () => {
		if (xhr.readyState == 4 && xhr.status == 200) {
			result = xhr.responseText;
		}
	});
}
