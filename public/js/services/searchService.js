angular.module('searchService', [])

	.factory('Search', function($http,$q) {
						
		return {
			getProviderTypes : function() {
				var deferred = $q.defer();
				return $http.get("careproviders/get/provider_types")
				.then(function(providers){
					deferred.resolve(providers.data);
					return deferred.promise;
				}, function(providers){
					deferred.reject(providers);
					return deferred.promise;
				});

			},
			getCounties : function() {
				var deferred = $q.defer();
				return $http.get("careproviders/get/counties")
				.then(function(counties){
					deferred.resolve(counties.data);
					return deferred.promise;
				}, function(counties){
					deferred.reject(counties);
					return deferred.promise;
				});

			},
			getCities : function() {
				var deferred = $q.defer();
				return $http.get("careproviders/get/cities")
				.then(function(cities){
					deferred.resolve(cities.data);
					return deferred.promise;
				}, function(cities){
					deferred.reject(cities);
					return deferred.promise;
				});

			},
			getCitiesByCountyId : function(county_id) {
				var deferred = $q.defer();
				return $http({
					method: 'GET',
					url: 'careproviders/get/cities',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					params: {county:county_id}
				})
				.then(function(cities){
					deferred.resolve(cities.data);
					return deferred.promise;
				}, function(cities){
					deferred.reject(cities);
					return deferred.promise;
				});
			},
			
			getRatings : function() {
				var deferred = $q.defer();
				return $http.get("careproviders/get/ratings")
				.then(function(ratings){
					deferred.resolve(ratings.data);
					return deferred.promise;
				}, function(ratings){
					deferred.reject(ratings);
					return deferred.promise;
				});

			},

			search : function(searchData) {
				var deferred = $q.defer();
				return $http({
					method: 'GET',
					url: 'careproviders/get',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					params: searchData
				})
				.then(function(data){
					deferred.resolve(data.data);
					return deferred.promise;
				}, function(data){
					deferred.reject(data);
					return deferred.promise;
				});
			},
			destroy : function(id) {
				return $http.delete('api/comments/' + id);
			}
		}

	});