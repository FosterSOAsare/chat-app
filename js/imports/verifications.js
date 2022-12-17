export function phoneVerification(number) {
	number = typeof number === "string" ? parseInt(number) : number;
	if (!number || !/^[0-9]{9,10}$/.test(number)) return "Please enter a valid phone number";
	return true;
}
