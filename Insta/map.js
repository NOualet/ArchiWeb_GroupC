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
    			listh.push(data.data[x].location.latitude);
    			listv.push(data.data[x].location.longitude);
    			nom.push(data.data[x].location.name);
    			img.push(data.data[x].images.thumbnail.url);
    			imgbig.push(data.data[x].images.standard_resolution.url);
        }

		var uluru = {lat: -25.363, lng: 131.044};
         map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });

        for( x in listh ){

        	uluru = {lat: listh[x], lng:listv[x]};
        	var contentString = nom[x]+'<img class="info" src="'+imgbig[x]+'">';


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

 function initMap() {


      }

function cli(n){

  map.setZoom(8);
  map.setCenter(markerls[n].getPosition());
  console.log(n);
}
