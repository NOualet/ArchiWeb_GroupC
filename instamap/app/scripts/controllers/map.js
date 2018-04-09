'use strict';

/**
 * @ngdoc function
 * @name instamapApp.controller:MapCtrl
 * @description
 * # MapCtrl
 * Controller of the instamapApp
 */
angular.module('instamapApp')
  .controller('MapCtrl', function ($scope, $http) {
	$scope.initMap = function() {
    	var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 4,
			center: uluru
        	});
        var marker = new google.maps.Marker({
			position: uluru,
			map: map
			});
		};
		
	$http.get("https://maps.googleapis.com/maps/api/js?key=AIzaSyDczsPlVhhXlgcxO7GDaHj3pDQMqife1tA&callback=")
		.then(function(response) { $scope.result = response.data;
		});
	console.log($scope.result);
  });