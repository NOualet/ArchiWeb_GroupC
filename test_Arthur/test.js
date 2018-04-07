/*function enter() {
	var image = document.createElement("img") ;
   	var x = document.getElementById("lol") ;
   	image.setAttribute("src", "http://www.couleurvoyage.com/wp-content/uploads/2017/02/10-sites-pour-organiser-le-meilleur-des-voyages.jpg") ;
   	image.setAttribute("class", "img-responsive img-thumbnail")
   
   	x.appendChild(image) ;
   
}*/

var token = '7438251793.1677ed0.83537064b66b41b5b3f23183d62ac098',
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
    side=null;
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

              sphoto='<img class="img-responsive img-thumbnail" width="110" height="100" onclick="cli('+x+')" src="'+imgbig[x]+'"/>';
              lp=lp+'<div>'+sphoto+'</div>';
              side=side+'<a class="item">'+sphoto+'</a>';

              document.getElementById("side").innerHTML=side;
     		    }
       },
       error: function(data){
           console.log(data);
       }
   });
}