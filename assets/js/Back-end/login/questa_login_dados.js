var base_url = "http://localhost/energia/index.php/";

angular.module("sigere", ['ngMessages']);
angular.module("sigere").controller("telaDeLoginCtrl", function ($scope, $http) {

    $scope.app = "sigere";
   
    $scope.validaLogin = function (dadosLogin) {

        if (dadosLogin) {
            $http({
                method: 'POST',
                url: base_url + "Login/validador_login",
                data: $.param({email_login: dadosLogin.email, pwd_login: dadosLogin.senha}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {

                switch (response.data.existe_erro) {
                    case "email":
                        $scope.login.mensagem = response.data.mensagem;
                        break;

                    case "senha":
                        $scope.login.mensagem = response.data.mensagem;
                        break;

                    case "valido":
                        location.href = "http://localhost/energia/index.php/Home/index";
                        break;
                }
            });

        }
    };


    $scope.validaCadastro = function (dadosCadastro) {


    };



});


