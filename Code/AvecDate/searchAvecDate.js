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


function verifdbt(){
    var date_pas_sure = document.getElementById('textdatedbt').value;
    var format = /^(\d{1,2}\/){2}\d{4}$/;
    if(!format.test(date_pas_sure)){alert('Date non valable !')}
    else{
        var date_temp = date_pas_sure.split('/');
        date_temp[1] -=1;        // On rectifie le mois !!!
        var ma_date = new Date();
        ma_date.setFullYear(date_temp[2]);
        ma_date.setMonth(date_temp[1]);
        ma_date.setDate(date_temp[0]);
        if(ma_date.getFullYear()==date_temp[2] && ma_date.getMonth()==date_temp[1] && ma_date.getDate()==date_temp[0]){
            alert('Date debut valable !');
		return(1);
        }
        else{
            alert('Date dbt non valable !');
        }
    }
}

function veriffin(){
    var date_pas_sure = document.getElementById('textdatefin').value;
    var format = /^(\d{1,2}\/){2}\d{4}$/;
    if(!format.test(date_pas_sure)){alert('Date non valable !')}
    else{
        var date_temp = date_pas_sure.split('/');
        date_temp[1] -=1;        // On rectifie le mois !!!
        var ma_date = new Date();
        ma_date.setFullYear(date_temp[2]);
        ma_date.setMonth(date_temp[1]);
        ma_date.setDate(date_temp[0]);
        if(ma_date.getFullYear()==date_temp[2] && ma_date.getMonth()==date_temp[1] && ma_date.getDate()==date_temp[0]){
            alert('Date fin valable !');
		return(1);
        }
        else{
            alert('Date fin non valable !');
        }
    }
}

function comparDate(){
	if ((verifdbt())&&(veriffin())){
		var datedbt = (document.getElementById('textdatedbt').value).split('/');
		var datefin = (document.getElementById('textdatefin').value).split('/');
	
	}
	

}



const validateFormPlus = () => {

	removeAllError();

	const verification = [
		verifyHashtags(form["hashtags"].value),
		veriffin(),
		verifdbt()
	];
document.write("<p> Du texte écrit en JS.</p>")
alert("Hello World !!")
	//return verification.every(e => e);
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

