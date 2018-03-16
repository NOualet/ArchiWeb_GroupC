

var h="https://scontent.cdninstagram.com/vp/81834cb42906a1ad4287a9b707f84183/5B4109F5/t51.2885-15/s150x150/e35/14334822_1806325886311084_1095502737_n.jpg"
var token = '2057203406.4776830.a9bf71fa0d354caf951335e822d138ad', // learn how to obtain it below
    userid = 'self', // User ID - get it in source HTML of your Instagram profile or look at the next example :)
    num_photos = 4; // how much photos do you want to get

	document.write('<img src="'+h+'"/>'); // data.data[x].images.low_resolution.url - URL of image, 306х306
alert('charge');
$.ajax({

	url: 'https://api.instagram.com/v1/users/' + userid + '/media/recent', // or /users/self/media/recent for Sandbox
	dataType: 'jsonp',
	type: 'GET',
	data: {access_token: token, count: num_photos},
	success: function(data){
 		console.log(data);
		for( x in data.data ){
			$('ul').append('<li><img src="'+data.data[x].images.low_resolution.url+'"></li>'); // data.data[x].images.low_resolution.url - URL of image, 306х306
			// data.data[x].images.thumbnail.url - URL of image 150х150
			// data.data[x].images.standard_resolution.url - URL of image 612х612
			// data.data[x].link - Instagram post URL 
		}
	},
	error: function(data){
		console.log(data); // send the error notifications to console
	}
});

