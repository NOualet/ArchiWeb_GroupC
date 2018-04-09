'use strict';

/**
 * @ngdoc function
 * @name instamapApp.controller:MapCtrl
 * @description
 * # MapCtrl
 * Controller of the instamapApp
 */
angular.module('instamapApp')
  .controller('MapCtrl', function ($scope) {
	$rootScope.initMap = function() {
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
  });