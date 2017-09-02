var base_url = "http://localhost/questa/index.php/";

angular.module("questaHome", []);
angular.module("questaHome").controller("homeCtrl", function ($scope, $http) {

    $scope.app = "questaHome";

    $scope.getUsuarios = function () {
        console.log("teste");
        $http({
            method: 'POST',
            url: base_url + "Home/get_usuarios",
            data: $.param({valido: 1}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {
            if (response.data.sucess) {
                console.log(response.data.usuarios);
            } else {
                console.log("não foi");
            }

        });
    };

});


