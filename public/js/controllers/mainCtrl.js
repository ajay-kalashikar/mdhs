angular.module('mainCtrl', [])

	.controller('mainController', function($scope, $http, Search, PagerService) {
		// object to hold all the data for the new comment form
		$scope.searchData = {};
		$scope.searchResult = [];
		$scope.pager = {};
    	$scope.setPage = setPage;
    	$scope.errorMsg = "";

    	//Pagination init
    	function initController() {
        // initialize to page 1
        	$scope.setPage(1);
    	}

    	
		//Get Providers Type
		Search.getProviderTypes()
		.then(
			function(response){
				$scope.providerType = response;
			},
			function(error){
				console.log("Error Log",error.statusText);
			}
		);

		//Get Cities
		Search.getCities()
		.then(
			function(cities){
				$scope.cities = cities;
			},
			function(error){
				console.log("Error Log",error.statusText);
			}
		);

		//Get Counties
		Search.getCounties()
		.then(
			function(counties){
				$scope.counties = counties;
			},
			function(error){
				console.log("Error Log",error.statusText);
			}
		);

		//County Callback for loading cities

		$scope.loadCities = function(county_id){

			Search.getCitiesByCountyId(county_id)
			.then(
				function(cities){
					$scope.cities = cities;
				},
				function(error){
					console.log("Error Log",error.statusText);
				}
			);
		}

		//Get Ratings
		Search.getRatings()
			.then(
				function(ratings){
					$scope.ratings = ratings;
				},
				function(error){
					console.log("Error Log",error.statusText);
				}
		);

		// loading variable to show the spinning loading icon
		$scope.loading = true;
		
		// get all the comments first and bind it to the $scope.comments object
		/*Search.get()
			.success(function(data) {
				$scope.comments = data;
				$scope.loading = false;
			});
*/

		// function to handle submitting the form
		$scope.search = function() {
			$scope.loading = true;
			$scope.errorMsg = "";
			// Fetch results
			Search.search($scope.searchData)
				.then(
				function(data){
					if(data.data){
						$scope.searchResult = data.data;
						setPage(1);
					}else if(data.error){
						$scope.searchResult = [];
						$scope.errorMsg = data.error;
					}
					
				},
				function(error){
					$scope.errorMsg = error.error;
					console.log("Error Log",error.statusText);
				}
			);
		};

		function setPage(page) {
			
	        if (page < 1 ) {
	        	console.log("REturn");
	            return;
	        }
 
        // get pager object from service
	        $scope.pager = PagerService.GetPager($scope.searchResult.length, page);
	 		
	        // get current page of items
	        $scope.items = $scope.searchResult.slice($scope.pager.startIndex, $scope.pager.endIndex + 1);
    	}

    	initController();

	});