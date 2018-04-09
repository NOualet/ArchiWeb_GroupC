/*function enter() {
	var image = document.createElement("img") ;
   	var x = document.getElementById("lol") ;
   	image.setAttribute("src", "http://www.couleurvoyage.com/wp-content/uploads/2017/02/10-sites-pour-organiser-le-meilleur-des-voyages.jpg") ;
   	image.setAttribute("class", "img-responsive img-thumbnail")
   
   	x.appendChild(image) ;
   
}*/
function selection_photos(){
	select = document.getElementById("nb_photos");
	choice = select.selectedIndex  
 
	valeur_cherch = select.options[choice].value;
  if(valeur_cherch)
	return valeur_cherch;
}


var listh=[]
var listv=[]
var img=[]
var nom=[]
var imgbig=[]
var contentleft;
var lp='';
var markerls=[];
var map;
var accessToken = "" ;

function initMap() {
    var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
}

function cli(n){

  map.setZoom(8);
  map.setCenter(markerls[n].getPosition());
  console.log(n);
}



function enter(){
	
  var test = document.getElementById("side") ;
  test.innerHTML = "" ;

	var token = accessToken,
 num_photos =selection_photos(); 
    side="";
    $.ajax({
       url: 'https://api.instagram.com/v1/users/self/media/recent',
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
             	contentString = '<p class="infotext">'+nom[x]+'</p>'+'<img class="info" src="'+imgbig[x]+'">';


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
		
              sphoto='<img class="img-responsive img-thumbnail" onclick="cli('+x+')" src="'+img[x]+'"/>';
              lp=lp+'<div>'+sphoto+'</div>';
              side=side+'<a class="item">'+sphoto+'</a>';

              document.getElementById("side").innerHTML=side;
     		    }
       },
       error: function(data){
           console.log(data);
       }
   });
   listh=[]
   listv=[]
   img=[]
   nom=[]
   imgbig=[]
   markerls=[];
}

function generationLien(id) {

  var client_id = "c77ad835ecbe444d886ad9b3d6a01684" ;

  var redirect_url = "http://info.univ-lemans.fr/~l3info025/Code/html/test.html" ;

  var lien =  "https://api.instagram.com/oauth/authorize/?client_id=" + client_id + "&redirect_uri="+ redirect_url + "&response_type=token" ;


  var createA = document.createElement('a') ;

  var createAText = document.createTextNode("Inscription API") ;

  createA.setAttribute('href', lien) ;

  console.log(lien) ;
  createA.appendChild(createAText) ;

  var element = document.getElementById(id) ;

  element.appendChild(createA) ;
}


function getAccessToken() {

  var url = window.location.href ; // Récupère le lien de la page

  var url_replace = url.replace("#","?") ; // Remplace le "#" par le "?"

  console.log(url) ;

  var url2 = new URL(url_replace) ;

  accessToken = url2.searchParams.get("access_token") ;
  console.log(accessToken) ;
}

function imageByHashtag() {
  ajaxGet("https://api.instagram.com/v1/users/self/media/recent/?access_token=7438251793.1677ed0.83537064b66b41b5b3f23183d62ac098",
    function (reponse) {


        var hashtag = JSON.parse(reponse);

          var userHashtag = document.getElementById("hashtag").value ;
          var test = document.getElementById("side") ;
          test.innerHTML = "" ;
          var tag = "" ;

          for(var i = 0 ; i < hashtag.data.length ; i++) {
              if(hashtag.data[i].tags == userHashtag) {
                  var image = document.createElement("img") ;
                  image.src = hashtag.data[i].images.thumbnail.url ;
                  test.appendChild(image) ; 
              }
          }

    }


  );
}

function enterByHashtag(){
  
  var test = document.getElementById("side") ;
  test.innerHTML = "" ;

  var userHashtag = document.getElementById("hashtag").value ;

  var token = accessToken,
 num_photos =selection_photos(); 
    side="";
    $.ajax({
       url: 'https://api.instagram.com/v1/users/self/media/recent',
       dataType: 'jsonp',
       type: 'GET',
       async:false,
       data: {access_token: token, count: num_photos},
       success: function(data){
           console.log(data);
             for( x in data.data ){
                if(data.data[x].location!=null){
                    if(data.data[x].tags[0] == userHashtag) {
                      console.log(data.data[x].tags[0]) ;
                      listh.push(data.data[x].location.latitude);
                      listv.push(data.data[x].location.longitude);
                      nom.push(data.data[x].location.name);
                      img.push(data.data[x].images.thumbnail.url);
                      imgbig.push(data.data[x].images.standard_resolution.url);
                    }
                  }
                 else{
                    listh.push( -25.363);
                    listv.push(131.044);
                    nom.push("no location");
                 }
                    
             }

              var uluru = {lat: -25.363, lng: 131.044};
                 map = new google.maps.Map(document.getElementById('map'), {
                 zoom: 1,
                 center: uluru
              });

              for( x in listh ){

              uluru = {lat: listh[x], lng:listv[x]};
              contentString = '<p class="infotext">'+nom[x]+'</p>'+'<img class="info" src="'+imgbig[x]+'">';


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

              sphoto='<img class="img-responsive img-thumbnail" onclick="cli('+x+')" src="'+img[x]+'"/>';
              lp=lp+'<div>'+sphoto+'</div>';
              side=side+'<a class="item">'+sphoto+'</a>';

              document.getElementById("side").innerHTML=side;
            }
       },
       error: function(data){
           console.log(data);
       }
   });

   listh=[]
   listv=[]
   img=[]
   nom=[]
   imgbig=[]
   markerls=[];
 
}


function showDiv(id) {
    document.getElementById(id).style.display = "block" ;
}

function notShowDiv(id) {
    document.getElementById(id).style.display = "none" ;
}

function compteInsta() {
	 ajaxGet("https://api.instagram.com/v1/users/self/?access_token=7438251793.1677ed0.83537064b66b41b5b3f23183d62ac098",
    function (reponse) {

	var testUser = document.getElementById('username');
        var user = JSON.parse(reponse);

    	var userInsta = user.data.username ;
    	
    	console.log(userInsta) ;
    	
    	document.getElementById('username').value= "@" + userInsta ;
    	


    }


  );
}

