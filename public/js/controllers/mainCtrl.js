angular.module('mainCtrl', [])

	.controller('mainController', function($scope, $http, Search, PagerService) {
		// object to hold all the data for the new comment form
		var vm = this;
		$scope.searchData = [];
		$scope.pager = {};
    	$scope.setPage = setPage;

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
			
			// Fetch results
			Search.search($scope.searchData)
				.then(
				function(data){
					$scope.searchData = data.data;
					setPage(1);
				},
				function(error){
					console.log("Error Log",error.statusText);
				}
			);
		};

		function setPage(page) {
			console.log("Page",page);
	        if (page < 1 ) {
	        	console.log("REturn");
	            return;
	        }
 
        // get pager object from service
	        $scope.pager = PagerService.GetPager($scope.searchData.length, page);
	 		console.log("Pager",$scope.pager);
	        // get current page of items
	        $scope.items = $scope.searchData.slice($scope.pager.startIndex, $scope.pager.endIndex + 1);
    	}

    	initController();

	});