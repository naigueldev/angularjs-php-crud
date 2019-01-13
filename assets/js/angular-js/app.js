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
  .otherwise({ redirectTo: '/' });
});
myApp.controller("postsCtrl", function($scope, $http){
  $http.get("http://localhost/angularjs-php-crud/webservices/allPosts.php")
  .then(function(response){
    $scope.posts = response.data;
    console.log($scope.posts);
  });
});
myApp.controller("createCtrl", function($scope){
    $("#submit").click(function(){
      var title = $("#title").val();
      var description = $("#description").val();
      var data_string = $("#myform").serialize();

      if(title == "" || description == ""){
        $("#msg").html("Please fill all details");
      }else{
        $.ajax({
          type: "POST",
          url: "http://localhost/angularjs-php-crud/webservices/addPosts.php",
          data: data_string,
          cache: false,
          success: function(result){
            $("#msg").html(result);
            var title = $("#title").val("");
            var description = $("#description").val("");
          }
        });
      }
      return false;
    });
});
