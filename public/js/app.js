//Define an angular module for our app
var TaskApp = angular.module('TaskApp', ['ngRoute', 'multi-select'
]);

TaskApp.config(['$routeProvider', 
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'partials/tasks.html',
        controller: 'tasksController'
      }).
      when('/categories',{
        templateUrl: 'partials/categories.html',
        controller: 'categoryController'
      }).
     
      otherwise({
        redirectTo: '/'
      });
  }]);

TaskApp.controller('tasksController', function($scope, $http) {
  getTask(); // Load all available tasks 
  getCategories();

  $scope.modernWebBrowsers = [
    {              name: "Category 1",                  ticked: true  },
    {    name: "Category 2",           ticked: false },
    {       name: "Category 3",     ticked: true  }
    
]; 


  function getTask(){  
  $http.post("get").success(function(data){
        $scope.tasks = data;

       });
  };

  function getCategories(){
    $http.post("categories/taskCategory").success(function(data){
      $scope.categories = data;
    });
  };
  $scope.addTask = function (task) {
    $http.post("new?task="+task).success(function(data){
        getTask();
        $scope.taskInput = "";
      });
  };
  $scope.deleteTask = function (task) {
    if(confirm("Are you sure you wish to delete this?")){
    $http.post("delete?taskID="+task).success(function(data){
        getTask();
      });
    }
  };
  $scope.deleteCategoryReference = function ( category_id, task_id){
    console.log("Remove reference where Task_id: "+task_id+" with Cat_id: "+category_id);
    
    if(confirm("Are you sure you wish to remove this category?")){
      $http.post("task/delete-category-reference?category_id="+category_id+"&task_id="+task_id).success(function(data){
        getTask();
      });
    }
    
  }

  $scope.toggleStatus = function(item, status) {
    if(status=='2'){status='0';}else{status='2';}
      $http.post("toggle-status?taskID="+item+"&status="+status).success(function(data){
       getTask();
      });
  };

  $scope.updateTask = function(item, status, task){
 
      $http.post("update?taskID="+item+"&task="+task+"&status="+status).success(function(data){
      getTask();
    });

    
  };

  $scope.addTaskCategory = function(category_id, task_id){

    console.log("categories/taskCategory?task_id="+task_id+"&category_id="+category_id);
    
    $http.post("task/add-category?task_id="+task_id+"&category_id="+category_id).success(function(data){
      getTask();
    });

   
    //console.log("task_id: "+ task_id+", cat_id: "+category_id);


  };

});


TaskApp.controller('categoryController', function($scope, $http){

  function getCategories(){  
  $http.post("categories/get").success(function(data){
        $scope.categories = data;

       });
  };

  $scope.addCategory = function (category) {
    $http.post("category/new?category="+category).success(function(data){
        getCategories();
        $scope.categoryInput = "";
      });
  };

  $scope.deleteCategory = function (id) {




    if(confirm("Related tasks will loose this category, Are you sure? ")){
    $http.post("category/delete?id="+id).success(function(data){
        getCategories();

      });
    }

  };

    $scope.updateCategory = function(id, title){
 
      $http.post("category/update?id="+id+"&title="+title).success(function(data){
      getCategories();
    });

    
  };

  $scope.categoryTasks = function (id){
    $http.post("category/has-tasks?id="+id).success(function(data){
      console.log(data);
    });
  };




});




























