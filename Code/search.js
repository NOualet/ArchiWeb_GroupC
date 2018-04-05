const form = document.forms["form_js_verified"];

const remove = node => {
	node.parentNode.removeChild(node);
}

const removeAllError = () => {
	Array.from(document.getElementsByClassName("error")).forEach(e=>remove(e));
}

const displayError = (id, msg) => {
	const row = document.getElementById(id);
	const oldError = document.getElementById(id + "_error");

	if (oldError != null) remove(oldError);

	const error = document.createElement("td");
	error.className = "error";
	error.id = id + "_error";
	error.innerText = msg;
	row.appendChild(error);
}

const verifyHastags = h => {
	if ((h.length > 2)&&(h.charAt(0)=='@')) return true;
	displayError("select_hashtag", "Un hastag doit commencer par un @ et contenir plus de deux caractères");

	return false;
};






const validateFormPlus = () => {

	removeAllError();

	const verification = [
		verifyHashtags(form["hashtags"].value),
		verifyPhotos(form[""]
	];
	
	return verification.every(e => e);
};


const viewForm = () => {
	console.log(
		[
			form["select_hashtag"].value,
		]
	);
};

