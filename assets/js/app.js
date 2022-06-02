var app = angular.module('myApp', ["ngRoute",]);
app.controller('myCtrl', function($scope, $http, $route) {
    $scope.reloadRoute = function locationreload() {
 
        // Reload only the route which will re-instantiate
        $route.reload();
    };
    
      

$scope.firstName="Angela Maglovska";
$scope.error=false;

function alertFun()
{
    console.log("AlertFun");
}
$scope.save=function()
{
    alertFun();
    console.log("\nHello " + $scope.first_name);
    $scope.error=true;
}

$scope.team=[];
$http.get("model/select.php?table_name=team").then(function(response)
{
    $scope.team = response.data;
});
$scope.natprevari=[];
$http.get("model/select.php?table_name=natprevari").then(function(response)
{
    $scope.natprevari = response.data;
});
$scope.statistcs=[];
$http.get("lib/readdata.php").then(function(response)
{
    $scope.statistcs = response.data
});


$scope.deleteRow= function(filename, pk_id){
    if (confirm("Дали сте сигурни дека сакате да избришете?") == true){
        var objDelete = [];
        objDelete.push({"filename":filename, "action":"delete", "pk_id":pk_id});
        postData(filename, objDelete); 
    }
    window.location.reload();   
}
$scope.updateRow = function(params){
    $http.put("http://localhost/youtube_learn/php/"+params.pk_id, params)
       .then(function(response){
           console.log(response);
           $scope.getData();
       });
}
function postData(filename, objData )
{
    $http({
        method : "POST",
        url : "model/" + filename, 
        data : objData
      }).then(function mySuccess(response) {
        $scope.successText = "Пополнете ги сите полиња!";
        $scope.showSuccess = true;
      }, 
      function myError(response) {
        $scope.myWelcome = response.statusText;
      });
    
}


  
$scope.addTeam= function(team_name)
{
   
   var objTeam= [];
   objTeam.push
   ({
       //json -> property:value
      
       "team_name":team_name,
       "action":"insert"

   });  
   
   console.log(objTeam);
   postData("model_team.php", objTeam); 
   
}
$scope.addNatprevar= function(kolo, datum, vreme, tim1, tim2, poluvreme, postignati_golovi_tim1, postignati_golovi_tim2)
{
   
   var objNatprevar= [];
   objNatprevar.push
   ({
       //json -> property:value
      
       "kolo":kolo,
       "datum":datum,
       "vreme":vreme,
       "tim1":tim1,
       "tim2":tim2,
       "poluvreme":poluvreme,
       "postignati_golovi_tim1":postignati_golovi_tim1,
       "postignati_golovi_tim2":postignati_golovi_tim2,
       "action":"insert"

   });  
   
   console.log(objNatprevar);
   postData("model_natprevar.php", objNatprevar); 
   
}

});