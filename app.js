import { fetchLocalStorage, updateStatusNumber, statusView, createAllStatuses, fetchStatuses, clearStatusIndexes } from "./status.js";

let colors = ["red", "green", "pink", "indigo", "#678983", "#272822", "grey", "#439A97", "#2D033B", "#FF7000"];
let fontFamilies = ["'Courier New', Courier, monospace", " 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif", "'Times New Roman', Times, serif", "Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif", "'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"];
let start = 0;
let family = '"Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif';
// Check LocalStorage
(function () {
	fetchLocalStorage();
	updateStatusNumber();
	statusView();
})();
// Displaying text area
(function () {
	let write = document.querySelector(".write");
	let textArea = document.querySelector(".textArea");
	let focusPoint = textArea.querySelector(".area");
	write.addEventListener("click", () => {
		textArea.style.display = "block";
		focusPoint.focus();
		// Display random backgroundColor
		let random = getRandomColor();
		textArea.style.backgroundColor = colors[random];
		start = random;
	});
})();

function getRandomColor() {
	let rand = Math.floor(Math.random() * colors.length);
	return rand;
}

// Switching colors
(function () {
	let textArea = document.querySelector(".textArea");
	let switchColor = textArea.querySelector(".right .bgColor");
	let focusPoint = textArea.querySelector(".area");
	switchColor.addEventListener("click", () => {
		if (start === colors.length - 1) {
			start = 0;
		} else {
			start++;
		}
		focusPoint.focus();
		textArea.style.backgroundColor = colors[start];
	});
})();

// Switching fonts
(function () {
	let textArea = document.querySelector(".textArea");
	let switchFont = textArea.querySelector(".right .fontFamily");
	let focusPoint = textArea.querySelector(".area");
	let start = 0;
	switchFont.addEventListener("click", () => {
		if (start === fontFamilies.length - 1) {
			start = 0;
		} else {
			start++;
		}
		family = fontFamilies[start];
		focusPoint.focus();
		focusPoint.style.fontFamily = family;
	});
})();

// Close text Area
(function () {
	let textArea = document.querySelector(".textArea");
	let close = textArea.querySelector(".top .close");
	let focusPoint = textArea.querySelector(".area");
	close.addEventListener("click", () => {
		textArea.style.display = "none";
		focusPoint.textContent = "";
	});
})();

// textArea functionality
(function () {
	let textArea = document.querySelector(".textArea");
	let area = textArea.querySelector(".area");
	let sendButton = textArea.querySelector(".bottom .sendButton");
	area.addEventListener("keyup", (e) => {
		let textContent = area.textContent;
		// Display send button when there is content
		if (textContent.length > 0) {
			sendButton.style.display = "flex";
		} else {
			sendButton.style.display = "none";
		}
	});
})();
function formatHours(hour) {
	return {
		value: +hour <= 12 ? hour : +hour - 12,
		meridian: +hour < 12 ? "am" : "pm",
	};
}

function formatNumber(number) {
	return +number < 10 ? `0${number}` : number;
}

// Send Text Button Functionality
(function () {
	let textArea = document.querySelector(".textArea");
	let sendButton = document.querySelector(".textArea .bottom .sendButton");
	let area = document.querySelector(".textArea .bottom .area");
	sendButton.addEventListener("click", () => {
		let textValue = area.textContent;

		// Store data
		area.focus();
		let date = new Date();
		let hours = formatHours(date.getHours());

		let data = {
			type: "text",
			value: textValue,
			time: `${formatNumber(hours.value)}: ${formatNumber(date.getMinutes())}${hours.meridian}`,
			color: colors[start],
			font: family,
			views: 0,
			timestamp: date.getTime(),
		};
		console.log(data);
		storeData(data);
		area.textContent = "";
		textArea.style.display = "none";
	});
})();

function storeData(data) {
	// Get localStorage Data
	let local = JSON.parse(localStorage.getItem("data"));
	local.push(data);
	data = localStorage.setItem("data", JSON.stringify(local));
}

// Display created Statuses
(function () {
	let leftStatus = document.querySelector("main .status .left");
	let viewStatus = document.querySelector("#viewStatus");
	leftStatus.addEventListener("click", (e) => {
		// Display viewStatus
		let statuses = fetchStatuses();
		viewStatus.style.display = statuses.length > 0 ? "block" : "none";
		createAllStatuses();
	});
})();

// close create statuses
(function () {
	let closeStatus = document.querySelector("#viewStatus .listStatuses .top .back");
	let viewStatus = document.querySelector("#viewStatus");
	closeStatus.addEventListener("click", (e) => {
		viewStatus.style.display = "none";
		clearStatusIndexes();
	});
})();
