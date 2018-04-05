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

const verifyHastags = select_hashtag => {
	if (select_hashtag.length >= 6) return true;
	displayError("select_hashtag", "Un hastag doit commencer par un @");

	return false;
};


const verifyDate = date => {
	if (date !== "") return true;
	displayError("date", "La date de fin doit respecté le format JJ/MM/AAAA.");

	return false;
};

const comparDate{

	

}

var datedbt = textdatedbt.split('').reverse('').join('');
var datefin = textdatefin.split('').reverse('').join('');

const validateForm = () => {

	removeAllError();

	const verification = [
		verifyHashtags(form["select_hashtag"].value),
		verifyDateDbt(form["textdatedbt"].value),
		verifyDateFin(form["textdatefin"].value),
	];

	return verification.every(e => e);
};


const viewForm = () => {
	console.log(
		[
			form["select_hashtag"].value,
			form["textdatedbt"].value,
			form["textdatefin"].value,
		]
	);
};

