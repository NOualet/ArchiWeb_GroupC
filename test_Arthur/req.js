
var accessToken = "7438251793.1677ed0.83537064b66b41b5b3f23183d62ac098" ;

/*ajaxGet("https://api.instagram.com/v1/users/self/media/recent/?access_token=7206163106.1677ed0.7c51405b2e6e47b7a16f94834ab18423", 
		function (reponse) {
    
    		var identity = JSON.parse(reponse);
  
    			var test = document.getElementById("test") ;
    			var x = document.createElement("img") ;
    			x.src = identity.data[2].images.standard_resolution.url;
    			
    			test.appendChild(x) ;
    			
    		// obtenir infos localisation d'une photo 
    		/*var lat = identity.data[1].location.latitude ;
    		var long = identity.data[1].location.longitude ;
    		document.getElementById("test").innerHTML = y ;
    	}
    
);*/




function generationLien(id) {
	var client_id = "d55a4d72a41348d1b968ab248ed9a8ec" ;

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

	accessToken = url2.searchParams.get("access_token") ;
	console.log(accessToken) ;
}


function placeByTag() {
	ajaxGet("https://api.instagram.com/v1/users/self/media/recent/?access_token=7206163106.1677ed0.7c51405b2e6e47b7a16f94834ab18423", 
		function (reponse) {
    
    		var place = JSON.parse(reponse);
    			
    		/*for(i = 0 ; i < place.data[0].carousel_media.length ; i++) {

    		}*/

    		var x = place.data[0].location.name ;

    		document.getElementById("test").innerHTML = x ;
    		
    			
    		
    	}
    
	);
}

function showDiv(id) {
    document.getElementById(id).style.display = "block" ;
}

function notShowDiv(id) {
    document.getElementById(id).style.display = "none" ;
}


 var token = '1362124742.3ad74ca.6df307b8ac184c2d830f6bd7c2ac5644',
    num_photos = 30;
var listh=[]
var listv=[]
var img=[]
var nom=[]
var imgbig=[]
var contentleft;
var lp='';
var markerls=[];
var map;
/*
var name='rudrastyh';
var dataid;
$.ajax({ // the first ajax request returns the ID of user rudrastyh
	url: 'https://api.instagram.com/v1/users/search',
	dataType: 'jsonp',
	type: 'GET',
  async:false,
	data: {access_token: token, q: name}, // actually it is just the search by username
	success: function(dataid){
		console.log(dataid);
  },
    error: function(dataid){
		console.log(dataid);
	}
});*/




 function initMap() {


      }

function cli(n){

  map.setZoom(8);
  map.setCenter(markerls[n].getPosition());
  console.log(n);
}



function enter(){
    usrname=document.getElementById("username").value;
    side=null;
    $.ajax({
       url: 'https://api.instagram.com/v1/users/'+ usrname +'/media/recent',
       dataType: 'jsonp',
       type: 'GET',
       async:false,
       data: {access_token: token, count: num_photos},
       success: function(data){
           console.log(data);
             for( x in data.data ){
               	//console.log(data.data[x].location.latitude);
                 if(data.data[x].location!=null){
             			listh.push(data.data[x].location.latitude);
             			listv.push(data.data[x].location.longitude);
             			nom.push(data.data[x].location.name);
                 }
                 else{
                    listh.push( -25.363);
             			  listv.push(131.044);
             			  nom.push("no location");
                 }
             			  img.push(data.data[x].images.thumbnail.url);
           			    imgbig.push(data.data[x].images.standard_resolution.url);
             }

     		      var uluru = {lat: -25.363, lng: 131.044};
                 map = new google.maps.Map(document.getElementById('map'), {
                 zoom: 1,
                 center: uluru
              });

              for( x in listh ){

             	uluru = {lat: listh[x], lng:listv[x]};
             	var contentString = '<p class="infotext">'+nom[x]+'</p>'+'<img class="info" src="'+imgbig[x]+'">';


             	var icon = {
       				url: img[x], // url
           			 scaledSize: new google.maps.Size(50, 50), // scaled size
           			 origin: new google.maps.Point(0,0), // origin
           			 anchor: new google.maps.Point(0, 0) // anchor
       			  };

     			    infowindow=new google.maps.InfoWindow({
               		content: contentString,
               		maxWidth: 300,
               		maxHeight: 300
             	});
             	marker = new google.maps.Marker({
             	    position: uluru,
             	    map: map,
             	    icon: icon,
             	    infowindow : infowindow
              });

     			//console.log(infowindow[x].content);
            	marker.addListener('click', function() {
               		this.infowindow.open(map, this);
                  map.setZoom(map.getZoom() + 1);
                  map.setCenter(this.getPosition());
             	});
              markerls[x]=marker;

              sphoto='<img class="ui rounded image" onclick="cli('+x+')" src="'+imgbig[x]+'"/>';
              lp=lp+'<div class="eight wide column">'+sphoto+'</div>';
              side=side+'<a class="item">'+sphoto+'</a>';

              document.getElementById("side").innerHTML=side;
     		    }
       },
       error: function(data){
           console.log(data);
       }
   });
}
