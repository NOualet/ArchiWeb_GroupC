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
  	$scope.openConnectionDialog = function(){
  		$scope.showConnectionDialog = true;
  		};
  	$scope.closeConnectionDialog = function(){
  		$scope.showConnectionDialog = false;
  		};
  		
  	$scope.openConnectionDialog();
  });
