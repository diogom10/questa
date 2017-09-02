var base_url = "http://localhost/questa/index.php/";

angular.module("questa" , []);
angular.module("questa").controller("telaDeLoginCtrl", function ($scope, $http) {

    $scope.app = "questa";
    $scope.mostraLogin = true;
    $scope.cadastro;
    console.log($scope.mostraLogin);

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

                    case "permicao":
                        $scope.login.mensagem = response.data.mensagem;
                        break;

                    case "valido":
                        location.href = "http://localhost/energia/index.php/Home/index";
                        break;
                }
            });

        }
    };


    $scope.openModal = function () {
        $scope.modalCadastro = true;
        // $scope.modalMascara = true;
        console.log($scope.modalCadastro);
    };
    $scope.closeModal = function () {
        $scope.modalCadastro = false;
        //  $scope.modalMascara = false;
    };

    $scope.cadastroUsuario = function () {
        console.log($scope.cadastro);

        $http({
            method: 'POST',
            url: base_url + "Login/validador_cadastro",
            data: $.param($scope.cadastro),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {
            if (response.data.existe_erro) {
                console.log(response.data.mensagem_cpf, response.data.mensagem_email);
            } else {
                alert("Usuario Cadastrado com Sucesso");
            }

        });


    };



});


