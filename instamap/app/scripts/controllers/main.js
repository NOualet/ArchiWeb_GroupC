'use strict';

/**
 * @ngdoc function
 * @name instamapApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the instamapApp
 */
angular.module('instamapApp')
  .controller('MainCtrl', function ($scope) {
  	$scope.genLink = function() {
		var client_id = "79c2fda8f26746afb59faac43b38f369" ;
		var redirect_url = "http://localhost:9000" ;
		var link = 	"https://api.instagram.com/oauth/authorize/?client_id=" + client_id + "&redirect_uri="+ redirect_url + "&response_type=token" ;
		return link;
		};
	$scope.getAccessToken = function() {
		var url = window.location.href ; // Récupère le lien de la page
		var url_replace = url.replace("#!#","?") ; // Remplace le "#" par le "?"
		var url2 = new URL(url_replace) ;
		var accessToken = url2.searchParams.get("access_token") ;
		return accessToken;
		};
  	$scope.openConnectionDialog = function(){
  		var token = $scope.getAccessToken();
  		if(token==null)
  			$scope.showConnectionDialog = true;
  		else{
  			$scope.showConnectionDialog = false;
  			$scope.token = token;
  		}
  		};
  	$scope.connect = function(){
  		window.location.replace($scope.genLink());
  		};
  	
  	$scope.openConnectionDialog();
  	//console.log($scope.token);
  });
