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
      var success_div = $("#alert_success");
      var danger_div = $("#alert_danger");
      var title = $("#title").val();
      var description = $("#description").val();
      var data_string = $("#create_post").serialize();
      var toastr_action = "";
      var toastr_msg = "";

      if(title == "" || description == ""){
        // danger_div.find("#msg").html("Please fill all details");
        // danger_div.show();
        toastr_action =  'error';
        toastr_msg = "Please fill all details";
        show_toastr(toastr_action,toastr_msg);
      }else{
        $.ajax({
          type: "POST",
          url: "http://localhost/angularjs-php-crud/webservices/addPost.php",
          data: data_string,
          cache: false,
          success: function(result){
            // success_div.show();
            // success_div.find("#msg").html(result);
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
