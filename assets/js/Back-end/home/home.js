var base_url = "http://localhost/questa/index.php/";

angular.module("testeHome", []);
angular.module("testeHome").controller("homeCtrl", function ($scope, $http) {

    $scope.app = "questaHome";
    
     $scope.deslogar = function () {
         console.log("teste");
        $http({
            method: 'POST',
            url: base_url + "Home/sair",
            data: $.param({login:true}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {
            if (response.data.sucess) {
                 window.location.href = base_url;
            } else {

            }
        });
    };

});


