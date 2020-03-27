var app = angular.module('DialToMe', []);
app.constant('base_url',site_url);
app.controller('CityCtrl', function ($scope,AdminServices) {
      
	  
 $scope.popup=	  function onLoadWatingPoupupOpen()
{
		//alert("xxxxxxxxx");
		$('#myPleaseWait').modal({
			 backdrop: 'static',
			});
}
 $scope.popuphide=function onLoadWatingPoupupClose()
{
		//alert("xxxxxxxxx");
		$('#myPleaseWait').modal('hide');
} 
       /*
        * function to check if cat id
        */
       $scope.$watch('country', function (val) {
           if (val) {
               $scope.getStateList(val);
           } 
       });
    
        $scope.getCountryList = function () {
			$scope.popup();
            AdminServices.getCountry().success(function (data) {
            	$scope.countries=data;
            });
	}
	
	
        $scope.getStateList = function (country) {
			$scope.popup();
           AdminServices.getStatesByName(country).success(function (data) {
               $scope.states=data;
           });
       }
	   
	    $scope.getStateList = function (country) {
           AdminServices.stateListByCountry(country).success(function (data) {
               $scope.states=data;
           });
       }
});


app.controller('ZipCodeCtrl', function ($scope,AdminServices) {
    
	
		  
 $scope.popup=	  function onLoadWatingPoupupOpen()
{
		//alert("xxxxxxxxx");
		$('#myPleaseWait').modal({
			 backdrop: 'static',
			});
}
 $scope.popuphide=function onLoadWatingPoupupClose()
{
		//alert("xxxxxxxxx");
		$('#myPleaseWait').modal('hide');
} 
      	
         /*
        * function to check if cat id
       
       $scope.$watch('country', function (val) {
           if (val) {
               $scope.getStateList(val);
           } 
       }); */
       
          /*
        * function to check if cat id
        */
       $scope.$watch('state', function (val) {
           if (val) {
               $scope.getCityList($scope.country,val);
           } 
       });
	   
	  
       
        $scope.getCountryList = function () {
			$scope.popup();
            AdminServices.getCountry().success(function (data) {
            	$scope.countries=data;
					$scope.popuphide()
            });
	}
	
        $scope.getStateList = function () {
			$scope.popup()
			//$scope.country='India'
           AdminServices.getStatesByName($scope.country).success(function (data) {
               $scope.states=data;
			   	$scope.popuphide()
           });
       }
       
        $scope.getCityList = function (country,state) {
			$scope.popup();
               AdminServices.getCity(country,state).success(function (data) {
                   $scope.cities=data;
				   	$scope.popuphide()
				  
               });
        }
		 $scope.getLocationList = function (city) {
			 $scope.popup()
               AdminServices.getlocation(city).success(function (data) {
                   $scope.locationData=data;
				   console.log(data);
				  	$scope.popuphide()
               });
        }
});



app.controller('ShowNextSubCatCtrl', function ($scope,AdminServices) {
        $scope.getMainCatList = function () {
            AdminServices.getMainCat().success(function (data) {
            	$scope.categories=data;
            });
	}
	
        $scope.getSubCatList = function (cat_id) {
           AdminServices.getSubCat(cat_id).success(function (data) {
               $scope.sub_categories=data;
           });
       }
       
        $scope.getNextSubCatList = function (cat_id,sub_cat_id) {
               AdminServices.getNextSubCat(cat_id,sub_cat_id).success(function (data) {
                   $scope.cities=data;
               });
        }
});

app.service('AdminServices', function ($http,base_url) {
    var service = this;
    
    /*
     * function to get list of country
     */
    service.getCountry = function () {
        return $http({
                method: "post",
                url: site_url+"/front-end-app.php?section=countryList",
                headers: { 'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function (data) {
            	return data;
            });
    }
    
    /*
     * function to get list of states
     */
    service.getStates = function (country) {
        return $http({
                    method: "post",
                    data:{country:country},
                    url: site_url+"/front-end-app.php?section=stateList",
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded'}
                }).success(function (data) {
                    return data;
        });
    }
    
    /*
     * function to get list of states
     */
    service.getStatesByName = function (country) {
        return $http({
                    method: "post",
                    data:{country:country},
                    url: site_url+"/front-end-app.php?section=stateListByName",
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded'}
                }).success(function (data) {
                    return data;
        });
    }

    /*
     * function to get a list of cities
     */
    service.getCity = function (country,state) {
        return $http({
                    method: "post",
                    data:{country:country,state:state},
                    url: site_url+"/front-end-app.php?section=cityList",
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded'}
                }).success(function (data) {
                    return data;
        });
    }
    
	
	
	 service.getlocation = function (city) {
        return $http({
                    method: "post",
                    data:{city:city},
                    url: site_url+"/front-end-app.php?section=locationList",
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded'}
                }).success(function (data) {
                    return data;
        });
    }
    
    /*
     * function to get a list of main categories
     */
    service.getMainCat = function () {
        return $http({
                    method: "post",
                    url: site_url+"/front-end-app.php?section=catList",
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded'}
                }).success(function (data) {
                    return data;
        });
    }
    
    
    /*
     * function to get a list of main categories
     */
    service.getSubCat = function (cat_id) {
        return $http({
                    method: "post",
                    data:{cat_id:cat_id},
                    url: site_url+"/front-end-app.php?section=subCatList",
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded'}
                }).success(function (data) {
                    return data;
        });
    }
    
    
    /*
     * function to get a list of main categories
     */
    service.getNextSubCat = function (cat_id,sub_cat_id) {
        return $http({
                    method: "post",
                    data:{cat_id:cat_id,sub_cat_id:sub_cat_id},
                    url: site_url+"/front-end-app.php?section=nextSubCatList",
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded'}
                }).success(function (data) {
                    return data;
        });
    }
});


app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[|').endSymbol('|]');
});
