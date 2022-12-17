// File contains all functions related to main user's status
let statuses = [];
export function fetchLocalStorage() {
	let local = localStorage.getItem("data");
	if (!local) {
		local = JSON.stringify([]);
		localStorage.setItem("data", local);
	} else {
		statuses = JSON.parse(local);
	}
}

export function updateStatusNumber() {
	let statusDesc = document.querySelector(".status .left .icon");
	statusDesc.setAttribute("data-value", statuses.length);
}

export function statusView() {
	console.log(statuses);
}

export function clearStatusIndexes() {
	let content = document.querySelector("#viewStatus .listStatuses .content");
	let contentElems = content.querySelectorAll(".contentElem");

	contentElems.forEach((contentElem) => {
		content.removeChild(contentElem);
	});
}

function createStatus(totalViewsNumber, timePastNumber, color) {
	let content = document.querySelector("#viewStatus .listStatuses .content");
	let contentElem = document.createElement("div");
	contentElem.classList.add("contentElem");

	let picture = document.createElement("div");
	picture.classList.add("picture");
	picture.style.backgroundColor = color;

	let desc = document.createElement("div");
	desc.classList.add("desc");
	let totalViews = document.createElement("p");
	totalViews.classList.add("totalViews");
	let span = document.createElement("span");
	span.textContent = totalViewsNumber + " views";

	totalViews.append(span);

	let timePast = document.createElement("p");
	timePast.classList.add("timePast");
	timePast.textContent = timePastNumber + " ago";
	desc.append(totalViews, timePast);

	let options = document.createElement("div");
	options.classList.add("options");
	let icon = document.createElement("i");
	icon.classList.add("fa-solid", "fa-ellipsis");
	options.append(icon);

	contentElem.append(picture, desc, options);
	content.append(contentElem);
}

export function fetchStatuses() {
	return statuses;
}
export function createAllStatuses() {
	statuses.forEach((e) => {
		if (e.type === "text") {
			createStatus(e.views, createTimePassed(e.timestamp), e.color);
			return;
		}
	});
}

function createTimePassed(time) {
	let now = Date.now();
	let diff = Math.round((now - time) / 1000);

	if (diff < 60) {
		return `${diff}s`;
	}
	if (diff < 3600) {
		return `${Math.floor(diff / 60)}m`;
	}
	return `${Math.floor(diff / 3600)}h`;
}
