var base_url = "http://localhost/questa/index.php/";

angular.module("questa", []);
angular.module("questa").controller("telaDeLoginCtrl", function ($scope, $http) {

    $scope.app = "questa";
    $scope.mostraLogin = true;
    $scope.cadastro;
    $scope.usuarios;
    var excluir = [];
    $scope.mostraEdit = true;
    $scope.id_click = "";
    $scope.edit = {nome: "", email: "", data_nascimento: "", cpf: "", id: ""};
    vazio = {nome: "", email: "", data_nascimento: "", cpf: "", id: ""};

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
                    $scope.getUsuarios();
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
    $scope.openTabela = function () {
        $scope.mostraTabela = true;
        $scope.mostraLogin = false;
    };
    $scope.closeTabela = function () {
        $scope.mostraTabela = false;
        $scope.mostraLogin = true;
    };

    $scope.getUsuarios = function () {
        console.log("teste");
        $http({
            method: 'POST',
            url: base_url + "Home/get_usuarios",
            data: $.param({valido: 1}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {
            if (response.data.sucess) {
                $scope.usuarios = response.data.usuarios;
            } else {
                console.log("não foi");
            }
        });
    };

    $scope.getUsuarios();

    $scope.excluirUsuario = function (id) {

        if (id !== null) {
            excluir = id;
        } else {

        }
        console.log(excluir);
        $http({
            method: 'POST',
            url: base_url + "Login/delete",
            data: $.param({id: excluir}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {
            if (response.data.sucess) {
                console.log("excluiu");
                $scope.getUsuarios();
            } else {

            }
        });
    };



    $scope.armazenaID = function (id, selecionado) {

        deleteArray(excluir, id);
        if (selecionado) {
            excluir.push(id);
        }
        if (selecionado === false) {
            deleteArray(excluir, id);
        }
        if (excluir.length > 1) {
            $scope.massa = true;
        } else {
            $scope.massa = false;
        }
        console.log(excluir);
    };

    $scope.armazenaTodosID = function (selecionado) {

        if (selecionado) {
            $scope.massa = true;
            $scope.allchecked = true;
            var id_usuario = $scope.usuarios;
            excluir = [];

            $.each(id_usuario, function (key, value) {
                excluir.push(value.id);
            });
            console.log(excluir);

        } else {
            $scope.allchecked = false;
            $scope.massa = false;
            excluir = [];
        }



    };

    deleteArray = function (excluir, id) {
        var i;
        for (i = 0; i < excluir.length; i++) {
            if (id === excluir[i]) {
                excluir.splice(i, 1);
            }

        }
    };

    $scope.editarClick = function (id) {
        $scope.id_click = id;
        $scope.edit = vazio;
    };

    $scope.cancelaEdit = function () {
        $scope.id_click = "";
    };
    //ngkeyup//

    $scope.editNome = function (nome) {

        $scope.edit.nome = nome;
    };
    $scope.editEmail = function (email) {

        $scope.edit.email = email;
    };
    $scope.editData_Nascimento = function (data) {

        $scope.edit.editData_Nascimento = data;
    };
    $scope.editcpf = function (cpf) {

        $scope.edit.cpf = cpf;
    };
    ////
    $scope.editarUsuario = function (id) {
        $scope.edit.id = id;

        $http({
            method: 'POST',
            url: base_url + "Login/edit",
            data: $.param($scope.edit),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {
            if (response.data.sucess) {
                console.log("excluiu");
                $scope.getUsuarios();
                $scope.id_click = "";
            } else {

            }
        });
    };
});
