var base_url = "http://localhost/questa/index.php/";

angular.module("teste", []);
angular.module("teste").controller("telaDeLoginCtrl", function ($scope, $http) {
    $scope.inicio = 0;
    $scope.fim = 5;
    $scope.app = "questa";
    $scope.mostraLogin = true;
    $scope.cadastro = {nome: "", email: "", data_nascimento: "", cpf: "", id: "", permicao: ""};
    $scope.usuarios;
    var excluir = [];
    $scope.mostraEdit = true;
    $scope.id_click = "";
    $scope.limite = 5;
    $scope.edit;
    $scope.paginas = [];
    $scope.vazio = {nome: "", email: "", data_nascimento: "", cpf: "", id: "", permicao: ""};

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
        $scope.cadastro = $scope.vazio;
    };
    $scope.closeModal = function () {
        $scope.modalCadastro = false;
        $scope.mostraLogin = true;
        $scope.cadastro =   $scope.vazio = {nome: "", email: "", data_nascimento: "", cpf: "", id: "", permicao: ""};
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
                    $scope.cadastro =   $scope.vazio = {nome: "", email: "", data_nascimento: "", cpf: "", id: "", permicao: ""};
                    $scope.modalCadastro = false;
                    $scope.mostraLogin = true;
                    $scope.getUsuarios();
                    $scope.cadastro = "";
                    $scope.sis = false;
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
        $scope.criterioDeBusca = "";
        $scope.cancelaEdit();
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
                pagina = Math.ceil($scope.usuarios.length / 5);
                console.log($scope.usuarios.length);
                var i = 0;
                for (i = 1; i <= pagina; i++) {
                    $scope.paginas[i] = i;
                    if (i === pagina) {
                        $scope.ultima_pag = i;
                    }
                }
                $scope.paginacao($scope.ultimaPaginaClicada);
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

    $scope.editarClick = function (dados) {
        $scope.id_click = dados.id;
        $scope.edit = $scope.vazio;
        $scope.edit = {nome: dados.nome, email: dados.email, data_nascimento: dados.data_nascimento, cpf: dados.cpf, permicao: 1, id:dados.id};
        console.log($scope.edit);
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
    $scope.permicao = function (valido) {

        $scope.edit.permicao = valido;

    };
    ////
    $scope.editarUsuario = function () {
       
        console.log($scope.edit);
        $scope.id_click = "";
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
    $scope.paginacao = function (pagina) {
        $scope.ultimaPaginaClicada = pagina;
        $scope.inicio = 0;
        $scope.fim = 0;
        $scope.limite = 5;

        pagina === 1 ? $scope.inicio = 0 : $scope.inicio = (5 * (pagina - 1));

        if (pagina === $scope.ultima_pag) {
            $scope.fim = $scope.usuarios.length;
            $scope.limite = $scope.usuarios.length - $scope.inicio;
        } else {
            $scope: $scope.fim = 5 * (pagina);
        }

    };
    $scope.dataformatada = function (data) {
        split = data.split('-');
        novaData = split[2] + "/" + split[1] + "/" + split[0];
        return novaData;
    };
    $scope.filtro = function (filtro) {
        $scope.limite = 5;
        teste = filtro;
    };
});
