const socket = new WebSocket("ws://localhost:8080");

// Connection opened
socket.addEventListener("open", (event) => {
	socket.send("Hello Server!");
});

// Listen for messages
socket.addEventListener("message", (event) => {
	console.log("Message from server:", event.data);
});

socket.addEventListener("close", (event) => {
	console.log("WebSocket connection closed");
});

// Log errors
socket.addEventListener("error", (error) => {
	console.log("WebSocket error:", error);
});
