var base_url = "http://localhost/questa/index.php/";

angular.module("questa", []);
angular.module("questa").controller("telaDeLoginCtrl", function ($scope, $http) {

    $scope.app = "questa";
    $scope.mostraLogin = true;
    $scope.cadastro;
    console.log($scope.mostraLogin);

    $scope.validaLogin = function () {


        $http({
            method: 'POST',
            url: base_url + "Login/validador_login",
            data: $.param($scope.login),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {

            switch (response.data.existe_erro) {
                case "email":
                    $scope.sisLogin = true;
                    $scope.msgEmail = response.data.mensagem;
                    $scope.msgSenha = "";
                    $scope.msgPermicao = "";
                    break;

                case "senha":
                    $scope.sisLogin = true;
                    $scope.msgSenha = response.data.mensagem;
                    $scope.msgEmail = "";
                    $scope.msgPermicao = "";
                    break;

                case "permicao":
                    $scope.sisLogin = true;
                    $scope.msgPermicao = response.data.mensagem;
                    $scope.msgSenha = "";
                    $scope.msgEmail = "";
                    break;

                case "valido":
                    $scope.sisLogin = false;
                    location.href = "http://localhost/questa/index.php/Home/index";
                 //   alert("entrou");
                    break;
            }
        });

    };



    $scope.openModal = function () {
        $scope.modalCadastro = true;
        $scope.mostraLogin = false;
        console.log($scope.modalCadastro);
    };
    $scope.closeModal = function () {
        $scope.modalCadastro = false;
        $scope.mostraLogin = true;
    };

    $scope.cadastroUsuario = function () {

        if ($scope.cadastro.senha === $scope.cadastro.senha2) {
            $http({
                method: 'POST',
                url: base_url + "Login/validador_cadastro",
                data: $.param($scope.cadastro),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                if (response.data.existe_erro) {
                    $scope.msgCpf = response.data.mensagem_cpf;
                    $scope.msgEmail = response.data.mensagem_email;
                    $scope.sis = true;
                } else {
                    alert("Usuario Cadastrado com Sucesso");
                    $scope.modalCadastro = false;
                    $scope.mostraLogin = true;

                }

            });
        } else {
            $scope.msgEmail = "*Senhas não Coincidem";
            $scope.sis = true;
        }


    };





});


