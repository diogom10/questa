<div class="geral_cadastro" ng-show="modalCadastro">
    <div class="visual_modal">

        <span class="txt-title">Cadastre o Usuario</span>
        <form name="cadastroForm">
            <input class="form-control"  name="nome" type="text" ng-model="cadastro.nome" placeholder="Digite sua Nome" ng-required="true"/>
            <input class="form-control"  name="email" type="text" ng-model="cadastro.email" placeholder="Digite sua Email" ng-required="true" ng-pattern="/^[A-Za-z0-9_.-]+@[A-Za-z0-9_]+\.[a-z]{2}/"/>
            <input class="form-control"  name="data" type="date" ng-model="cadastro.data" placeholder="Digite sua Data de Nascimento" ng-required="true"/>
            <input class="form-control"  name="cpf" type="text" ng-model="cadastro.cpf" placeholder="CPF" ng-required="true" ng-pattern="/^[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}/"/>
            <input class="form-control"  name="senha" type="password" ng-model="cadastro.senha" placeholder="senha" ng-required="true"/>
            <input class="form-control"  name="senha2" type="password" ng-model="cadastro.senha2" placeholder="Confirme a senha"ng-required="true"/>

        </form>

        <div ng-show="cadastroForm.nome.$error.required && cadastroForm.nome.$dirty">
            Nome esta Vazio
        </div>
        <div ng-show="cadastroForm.email.$error.pattern">
            Formato de email incorreto
        </div>
        <div ng-show="cadastroForm.senha.$error.required && cadastroForm.senha.$dirty">
            Campo Senha Vazio
        </div>
        <div ng-show="cadastroForm.senha2.$error.required && cadastroForm.senha2.$dirty">
            Campo confirmação de senha Vazio
        </div>
        <div ng-show="cadastroForm.cpf.$error.pattern">
            Formato CPF Invalido
        </div>
        <div ng-show="cadastroForm.cpf.$error.required && cadastroForm.cpf.$dirty">
            Campo CPF Vazio
        </div>
        <div ng-show="cadastroForm.data.$error.required && cadastroForm.data.$dirty">
            Campo data Vazio
        </div>
<!--        <span class="txt-title">Seja Bem Vindo</span>
        <span class="txt-title">Seja Bem Vindo</span>
        <span class="txt-title">Seja Bem Vindo</span>-->
        <button class="col-md-11 col-lg-12 col-sm-12 col-xs-12 btn btn-success" ng-disabled="cadastroForm.$invalid" ng-click="cadastroUsuario()">Cadastrar</button>
    </div>
    
</div>