<?$HOST = "http://localhost"; ?>
<script type="text/javascript">

	// window.location.href = 'index.php';

	var myApp = angular.module("crud", ["ngRoute"]);
	myApp.config(function($routeProvider){
		$routeProvider
		.when('/',{
			templateUrl: 'Templates/posts.html',
			controller: 'postsCtrl'
		})
		.when('/createPost',{
			templateUrl: 'Templates/create.html',
			controller: 'createCtrl'
		})
		.when('/post/:id',{
			templateUrl: 'Templates/view.html',
			controller: 'viewCtrl'
		})
		.when('/delete/:id',{
			templateUrl: 'Templates/delete.html',
			controller: 'deleteCtrl',
		})
		.otherwise({ redirectTo: '/' });
	});

	myApp.controller("postsCtrl", function($scope, $http){
		$http.get("<?=$HOST?>/angularjs-php-crud/webservices/allPosts.php")
		.then(function(response){
			$scope.posts = response.data;
			console.log($scope.posts);
		});
	});
	myApp.controller("viewCtrl", function($scope, $http, $routeParams){
		$http({
			url: "<?=$HOST?>/angularjs-php-crud/webservices/getPost.php",
			params: {id: $routeParams.id},
			method: "get"
		})
		.then(function(response){
			$scope.post = response.data;
		});
	});
	myApp.controller("deleteCtrl", function($scope, $http, $routeParams , $window){
		$http({
			url: "<?=$HOST?>/angularjs-php-crud/webservices/deletePost.php",
			params: {id: $routeParams.id},
			method: "get"
		})
		.then(function(response){
			$scope.posts = response.data;
			console.log($scope.posts.msg);

			var toastr_action =  'success';
			var toastr_msg = $scope.posts.msg;
			show_toastr(toastr_action,toastr_msg);
		});
	});
	myApp.controller("createCtrl", function($scope){
		$("#submit").click(function(){
			var success_div = $("#alert_success");
			var danger_div = $("#alert_danger");
			var title = $("#title").val();
			var description = $("#description").val();
			var data_string = $("#create_post").serialize();
			var toastr_action = "";
			var toastr_msg = "";

			if(title == "" || description == ""){
				toastr_action =  'error';
				toastr_msg = "Please fill all details";
				show_toastr(toastr_action,toastr_msg);
			}else{
				$.ajax({
					type: "POST",
					url: "<?=$HOST?>/angularjs-php-crud/webservices/addPost.php",
					data: data_string,
					cache: false,
					success: function(result){
						toastr_action =  'success';
						toastr_msg = result;
						show_toastr(toastr_action,toastr_msg);
						var title = $("#title").val("");
						var description = $("#description").val("");
					}
				});
			}
			return false;
		});
	});
</script>