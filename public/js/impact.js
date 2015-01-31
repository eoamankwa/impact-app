var app = angular.module("app", ['ngRoute']);
app.config( function($routeProvider){
	$routeProvider.when('/login', {
		templateUrl:'templates/login.html',
		controller:'LoginController'
	});

	$routeProvider.when('/index', {
		templateUrl: 'templates/index.html',
		controller: 'UserController'
	});

	$routeProvider.when('/show/:username', {
		templateUrl:'templates/show.html',
		controller:'UserShowController'
	});

	$routeProvider.when('/edit', {
		templateUrl:'templates/edit.html',
		controller:'UserController'
	});

	$routeProvider.when('/create', {
		templateUrl:'templates/create.html',
		controller:'UserCreateController'
	});

	$routeProvider.when('/delete', {
		controller:'UserController'	
	});
	
	$routeProvider.when('/home', {
		templateUrl:'templates/home.html',
		controller:'HomeController'
	});

	$routeProvider.when('/profile/index',{
		templateUrl:'templates/profile/index.html',
		controller:'ProfileController'
	});

	$routeProvider.when('/profile/create', {
		templateUrl: 'templates/profile/create.html',
		controller: 'ProfileController'
	});

	$routeProvider.when('/profile/edit',{
		templateUrl: 'templates/profile/edit.html',
		controller: 'ProfileController'
	});

	$routeProvider.when('/profile/destory', {
		templateUrl: 'templates/profile/delete',
		controller: 'ProfileController'
	});
	$routeProvider.otherwise({ redirectTo: '/login'});
});


app.factory("AuthenticationService", function($http) {
	return{
		login: function(credentials) {
			return $http.post("/auth/login", credentials);
		},
		
		logout:function() {
			return $http.get("/auth/logout");
		}
	}
});

app.factory("UserService", function($http) {
	return{
		index:function(){
			return $http.get("/users/index");
		},

		show:function(credentials){
			return $http.get("/users/show/"+credentials);
		},

		create: function(credentials) {
			return $http.post("/users/store", credentials);
		},

		update: function(credentials){
			return $http.post("/users/update", credentials);
		},

		remove: function(credentials){
			return $http.post("/users/destroy", credentials);
		}

	};
});

app.controller('UserController', function($scope, UserService){
	$scope.users = [];
	UserService.index().
	success(function(data){
		if(angular.isArray(data)){ 
			$scope.users = data;
		}
	});
});

app.controller('UserCreateController', function($scope, UserService) {
	$scope.credentials = {email:"", password:"", username:"", type:""};
	$scope.create = function() {
		UserService.create($scope.credentials);
	}
});

app.controller('UserShowController' , function($scope, $routeParams, UserService) {
	$scope.credentials = $routeParams.username;
	UserService.show($scope.credentials).
	success(function(data){
		if(angular.isArray(data)){ 
			$scope.users = data;
		}
	});

});
/*
app.controller('UserController', function($scope, UserService) {

	$scope.index = function() {
		$scope.user = UserService.index();
	},

	$scope.update = function() {
		UserService.update($scope.credentials);
	}
});
*/
app.factory("ProfileService", function($http) {
	return{
		index:function(){
			return http.post("/profile/index");
		},

		create:function(credentials){
			return http.post("/profile/store", credentials);
		},

		edit:function(credentials){
			return http.post("/profile/edit", credentials);
		},

		remove:function(credentials){
			return http.post("/profile/destroy", credentials);
		}
	};
});

app.controller('LoginController', function($scope, $location, AuthenticationService) {
	$scope.credentials = {email:"", password:""};

	$scope.login = function() {
		AuthenticationService.login($scope.credentials).success(function() {
			$location.path('/profile/create');
		});
	};
});


app.controller('HomeController', function($scope, AuthenticationService) {
	$scope.title = "Home";
	$scope.message = "Home";

	$scope.logout = function() {
		AuthenticationService.logout();
	};
});

app.controller('ProfileController', function($scope, ProfileService) {
	$scope.credentials = {first:"", last:"", address:"", city:"", state:"", zip:"", phone:""};

	$scope.create = function() {
		ProfileService.create($scope.credentials);
	}
});

app.controller('UserTypeController',function($scope){
	   $scope.items = ['Employee','Allfilates']
});

app.directive('showsMessageWhenHovered', function() {
	return {
			resttrict: "A",
			link: function(scope, element, attributes){
				var originalMessage = scope.message;
			element.bind("mouseover", function() {
				scope.message = attributes.message;
				scope.$apply();
			});
			element.bind("mouseout", function() {
				scope.message = originalMessage;
				scope.$apply();
			});
		}

	}
})

