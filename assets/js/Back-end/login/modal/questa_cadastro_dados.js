var base_url = "http://localhost/questa/index.php/";

angular.module("sigere", []);
angular.module("sigere").controller("telaDeLoginCtrl", function ($scope, $http) {

    $scope.app = "sigere";
    $scope.cadastro;

    $scope.openModal = function () {
        $scope.modalCadastro = true;
        $scope.modalMascara = true;
    };
    $scope.closeModal = function () {
        $scope.modalCadastro = false;
        $scope.modalMascara = false;
    };

    $scope.cadastroUsuario = function () {
        console.log($scope.cadastro);
       
            $http({
                method: 'POST',
                url: base_url + "Login/validador_cadastro",
                data: $.param($scope.cadastro),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                     if(response.data.existe_erro){
                         console.log(response.data.mensagem_cpf, response.data.mensagem_email);
                     }
                     else{
                         alert("Usuario Cadastrado com Sucesso");
                     }
                 
            });

        
    };




});


