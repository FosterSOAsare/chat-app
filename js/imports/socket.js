export const socket = new WebSocket("ws://localhost:8080");

// Connection opened
export function startSocket(callback) {
	socket.addEventListener("open", (event) => {
		callback(true);
		console.log("Websocket connection started");
	});

	// Listen for messages
	socket.addEventListener("message", (event) => {
		let data = JSON.parse(event.data);
		// console.log(data);
	});

	socket.addEventListener("close", (event) => {
		console.log("WebSocket connection closed");
	});

	// Log errors
	socket.addEventListener("error", (error) => {
		console.log("WebSocket error:", error);
	});
}
