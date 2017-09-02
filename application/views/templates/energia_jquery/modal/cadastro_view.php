

<div class="geral_modal">
    <div class="visual_modal">
        <div class="header-cadastro">
            Cadastrar Usuario
        </div>

        <div class="section-cadastro">
            <input type="text" name="nome" class="ipt-geral-modal ipt-modal-nome" placeholder="Digite seu Nome Completo" >
            <input type="email" name="email" class="ipt-geral-modal ipt-modal-email" placeholder="Digite seu Email">
            <div class="controle-senha">
                <input type="password" name="senha" class="ipt-geral-modal ipt-modal-senha" placeholder="Digite sua Senha">
                <input type="password" name="senha2" class="ipt-geral-modal ipt-modal-senha2" placeholder="Digite sua senha Novamente">
            </div>
        </div>
        <div class="footer-cadastro">
            <div id="err-nome" class="err-geral">*Caracter Invalido no Nome</div>
            <div id="err-nome2" class="err-geral">*Numero Minimo de Caracteres</div>
            <div id="err-nome3" class="err-geral">*Campo Nome Obrigatorio</div>
            <div id="err-email" class="err-geral">*Formato de Email Invalido</div>
            <div id="err-email2" class="err-geral">*Campo Email Obrigatorio</div>
            <div id="err-senha" class="err-geral">*Senhas Não Coincidem</div>
            <div id="err-senha2" class="err-geral">*Minimimo Aceito 6 Caracteres, com 1 Letra Maiuscula e 1 Numero</div>
            <div id="err-php" class="err-geral">*teste</div>
            <div class="sucesso-cadastro">
                <img class="sucesso-imagem" src="<?php echo base_url() ?>assets/images/certo.png" />
            </div>
            <div class="btn-voltar">
                <div class="text-btn-voltar">Voltar</div>
            </div>


            <div class="btn-done">
                <div class="text-btn-done">Cadastrar</div>
            </div>
            <!-- <div class="btn-cancelar">Cancelar</div>-->
        </div>
    </div>
</div>