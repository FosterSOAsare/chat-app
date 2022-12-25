import { socket, startSocket } from "./imports/socket.js";
let data = getUser();

startSocket((res) => {
	if (res) {
		// Set user's status
		socket.send(
			JSON.stringify({
				type: "connected",
				user: data.user_id,
			})
		);
		// Fetch chats
		socket.send(
			JSON.stringify({
				type: "fetchChats",
				user: data.user_id,
			})
		);
	}
});
