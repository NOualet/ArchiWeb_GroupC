//active bouton backtotop
addEvent(window, 'load', function() {
addEvent(window, 'scroll', function() {
document.getElementById("bt_backtotop").className = (window.pageYOffset > 100) ? "bt_backtotop_visible" : "bt_backtotop_invisible";
})
});

//active clic avis&question



//FONCTIONS JS GENERIQUES
function addEvent(el, event, func){if(el.addEventListener){el.addEventListener(event, func, false);}else{el.attachEvent('on'+event, func);}}

function replace_specialchar(str) {
str=str.replace("\'","'");
return str;
}

function getXMLHttpRequest()
{
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject)
	{
		if (window.ActiveXObject)
		{
			try
			{
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e)
			{
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
		else
		{
			xhr = new XMLHttpRequest(); 
		}
	}
	else
	{
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}