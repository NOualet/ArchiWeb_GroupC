/*var test = document.getElementById("insta") ;
var text = "" ;

ajaxGet("https://api.instagram.com/v1/users/self/media/recent/?access_token=7206163106.1677ed0.50a736093ff74da59dff518cc556a89d", 
		function (reponse) {
    
    		var identity = JSON.parse(reponse);
    		//test.innerHTML = identity.data[0].images.thumbnail.width;
    		for(i = 0 ; i < identity.data[0].carousel_media.length ; i++) {
    			var x = document.createElement("IMG") ;
    			
    			x.src =identity.data[0].carousel_media[i].images.thumbnail.url;
    			
    			test.appendChild(x) ;
    			
    		}
    		/* obtenir infos localisation d'une photo 
    		var lat = identity.data[1].location.latitude ;
    		var long = identity.data[1].location.longitude ;
    		document.getElementById("test").innerHTML = y ;
    	}
    
);*/


 function initMap() {
 	var icons = {
 		url: "chat.jpg",
	    scaledSize: new google.maps.Size(50, 50), // scaled size
	    origin: new google.maps.Point(0,0), // origin
	    anchor: new google.maps.Point(0, 0) // anchor
	};
	 var uluru = {lat: -25.363, lng: 131.044};
	 var map = new google.maps.Map(document.getElementById('map'), {
	 	zoom: 4,
	 	center: uluru
	});
	 var marker = new google.maps.Marker({
		 position: uluru,
		 icon: icons,
	 	 map: map
 	 });
}



function generationLien(id) {
	var client_id = "9c4fe0163c7545599e409dbb6f1aedf1" ;

	var redirect_url = "http://info.univ-lemans.fr/~l3info025/test_Arthur/Instamap.html" ;
	
	var lien = 	"https://api.instagram.com/oauth/authorize/?client_id=" + client_id + "&redirect_uri="+ redirect_url + "&response_type=token" ;


	var createA = document.createElement('a') ;

	var createAText = document.createTextNode("Inscription API") ;

	createA.setAttribute('href', lien) ;
	
	console.log(lien) ;
	createA.appendChild(createAText) ;

	var element = document.getElementById(id) ;

	element.appendChild(createA) ;
}


function accessToken() {

	var url = window.location.href ; // Récupère le lien de la page

	var url_replace = url.replace("#","?") ; // Remplace le "#" par le "?"
	
	console.log(url) ;

	var url2 = new URL(url_replace) ;

	var token = url2.searchParams.get("access_token") ;
	console.log(token) ;
}
	