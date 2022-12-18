export class PostData {
	result = "";
	constructor(path, data) {
		this.path = path;
		this.data = data;
	}

	sendRequest(callback) {
		let data = "";
		let xhr = new XMLHttpRequest();
		xhr.open("POST", this.path);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(this.data);
		xhr.addEventListener("readystatechange", () => {
			if (xhr.readyState == 4 && xhr.status == 200) {
				this.result = xhr.responseText;
				callback(this.result);
			} else {
			}
		});
	}
}
