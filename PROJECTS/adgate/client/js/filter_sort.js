var app = angular.module("myApp", ['ui.bootstrap']);
//var app = angular.module("MesaViewer", []);
app.value('fullNames', name_items);
//app.value('fullNames', <?php echo json_encode($name_items);?> );
//[{"name_index":"18","first_name":"jljlkjlkjlk","last_name":"uouiouioujkjkj"}]);
app.controller('myController', ['$scope', '$http', 'filterFilter', 'fullNames',
					function($scope, $http, filterFilter, fullNames) {

	//console.log(fullNames);

	//$scope.names = name_items;
	$scope.names = fullNames;
	console.log("inside controller");
	console.log($scope.names);

   $scope.filteredNamesForPagination = [];
   $scope.currentPage = 1;
   $scope.numPerPage = 5;
   $scope.maxSize = 5;

	$scope.filteredNames = $scope.names;
	$scope.reverse = true;
	$scope.column  = 'name_index';   //default sort column

	$scope.setSort = function(column){
		$scope.column = column;
		$scope.reverse = !$scope.reverse;
	};
	$scope.filterString = '';
	$scope.setFilter = function(value){
		$scope.filteredNames = 
			filterFilter($scope.names, $scope.filterString);
		$scope.$watch('currentPage + numPerPage', function() {
    		var begin = (($scope.currentPage - 1) * $scope.numPerPage);
    		var end = begin + $scope.numPerPage;
    
    		$scope.filteredNamesForPagination = $scope.filteredNames.slice(begin, end);
  		});
	
		//$scope.filteredNamesForPagination = $scope.filteredNames;
	};
   

   $scope.$watch('currentPage + numPerPage', function() {
    var begin = (($scope.currentPage - 1) * $scope.numPerPage);
    var end = begin + $scope.numPerPage;
    
    $scope.filteredNamesForPagination = $scope.filteredNames.slice(begin, end);
  });
  
  $scope.url = 'update_name.php';
  $scope.formSubmit = function(form) {
  		//alert("xyz");
  		//console.log("submit button event handler for angular.js");
  		//console.log($scope.name.index);
  		//console.log($scope.fullname);
  		//console.log($scope.fullname['first']);
  		//console.log($scope.fullname['last']);
  		//alert(form);
  		console.log(form);
  		$http.post($scope.url, form).
  			success(function(data, status) {
  				console.log("call success");	
  			})
  }

}]);