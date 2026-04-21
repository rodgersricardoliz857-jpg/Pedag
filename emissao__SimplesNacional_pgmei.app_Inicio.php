
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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/ladda.js"></script>
    <script src="assets/js/toastr.js"></script>
    <script src="assets/js/select.js"></script>
    <script src="assets/js/faz-um-pix.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

    <style>
<style>
    /* Container principal para o formulário */
    #tabelaPeriodos {
        margin-top: 20px;
        padding: 30px;
    }

    /* Responsividade para o painel */
    .panel {
        border-radius: 8px;
        border: 1px solid #ddd;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        width: 100%;
    }

    .panel-heading {
        background-color: #f5f5f5;
        padding: 10px 15px;
        border-bottom: 1px solid #ddd;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .panel-title {
        font-size: 18px;
        font-weight: bold;
    }

    .panel-body {
        padding: 15px;
    }

    /* Estilo para tabelas - MAIORES ALTERAÇÕES AQUI */
    .table-responsive {
        width: 100%;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 0;
        display: block;
    }

    .table {
        width: 100%;
        margin-bottom: 0;
        border-collapse: collapse;
        font-size: 14px;
        min-width: 800px; /* Largura mínima para manter o conteúdo legível */
    }

    .table thead th {
        text-align: center;
        background-color: #f5f5f5;
        font-weight: bold;
        padding: 10px;
        border-bottom: 1px solid #ddd;
        white-space: nowrap;
    }

    .table tbody td {
        text-align: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
        white-space: nowrap;
    }

    .table-hover tbody tr:hover {
        background-color: #f9f9f9;
    }

    .table-condensed td,
    .table-condensed th {
        padding: 8px;
    }

    /* Botões */
    .btn {
        border-radius: 5px;
        padding: 10px 15px;
        font-size: 14px;
        transition: all 0.3s ease-in-out;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
        color: #fff;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    /* Input de data */
    .form-control.datepicker {
        max-width: 300px;
        margin: 0 auto;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 8px;
        font-size: 14px;
    }

    /* Responsividade - ALTERAÇÕES IMPORTANTES PARA MOBILE */
    @media screen and (max-width: 768px) {
        #tabelaPeriodos {
            padding: 0;
            margin-left: -10px;
            margin-right: -10px;
            width: calc(100% + 20px);
        }

        .panel {
            border-radius: 0;
            box-shadow: none;
            border-left: none;
            border-right: none;
        }

        .panel-heading {
            border-radius: 0;
        }

        .panel-title {
            font-size: 16px;
            text-align: center;
        }

        .panel-body {
            padding: 5px 0;
        }

        .table-responsive {
            border: none;
            border-radius: 0;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            font-size: 12px;
        }

        .table thead th,
        .table tbody td {
            padding: 6px 4px;
            font-size: 11px;
        }

        .btn {
            padding: 8px 10px;
            font-size: 12px;
            margin: 5px;
        }

        .form-control.datepicker {
            max-width: 100%;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .panel-footer {
            padding: 10px 5px;
        }
    }

    @media screen and (max-width: 576px) {
        .table-responsive {
            margin-left: -5px;
            margin-right: -5px;
            width: calc(100% + 10px);
        }

        .table {
            min-width: 700px;
        }

        .btn {
            width: calc(100% - 10px);
            margin: 5px;
        }

        .form-control.datepicker {
            width: calc(100% - 20px);
            margin: 0 auto 10px;
        }
    }

   /* Ajustes Gerais */
.list {
    display: block;           /* Mostra a lista */
    min-width: 380px;         /* Largura mínima */
    width: auto;              /* Deixa a largura se ajustar ao conteúdo */
    margin-left: -50px !important;           /* Encosta na esquerda */
    margin-right: auto;       /* Mantém o alinhamento à esquerda */
    border: 1px solid #ccc;   /* Mostra o limite (útil para visualizar o width) */
    background-color: #f9f9f9;/* Cor de fundo para destacar */
    padding: 8px;             /* Espaçamento interno */
    border-radius: 6px;       /* Canto levemente arredondado */
}


    .btn-primary {
        width: 60%;
        background-image: linear-gradient(to bottom, #5cb85c 0, #419641 100%) !important;
        border: none;
        color: #fff;
        padding: 10px 15px;
        text-align: center;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-image: linear-gradient(to bottom, #4cae4c 0, #387e38 100%) !important;
    }

    .align {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
    }

    .aln {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    textarea {
        font-family: inherit;
        font-size: 14px;
        line-height: 1.5;
        width: 90%;
        max-width: 500px;
        padding: 10px;
        overflow: hidden;
        resize: none;
        margin: 10px auto;
        border: 1px solid #ccc;
        background-color: #f5f5f5;
        border-radius: 5px;
    }

    .flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #666;
        margin: 0 auto 20px;
        width: 90%;
        max-width: 600px;
    }

    .flex h3 {
        font-size: 16px;
        margin: 0;
        color: #333;
    }

    .flex p {
        font-size: 18px;
        display: flex;
        align-items: center;
        margin: 0;
        color: #666;
    }

    .pn2 {
        display: none;
    }
</style>

    <style>
        .aln {
            display: flex;
            justify-content: center;
        }
    </style>

    <style>
        #pagamento {
            display: none;
            /* Inicialmente escondido */
            position: fixed;
            /* Sobreposto ao resto do conteúdo */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            /* Ajuste para ocupar até 90% da largura da tela em dispositivos móveis */
            max-width: 600px;
            /* Em telas maiores, limite a largura a 600px */
            background-color: white;
            /* Fundo branco */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            z-index: 1000;
            /* Sobrepõe outros elementos */
            padding: 20px;
            overflow-y: auto;
            /* Caso o conteúdo ultrapasse a altura, habilitar o scroll */
        }

        #overlay {
            display: none;
            /* Inicialmente escondido */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Fundo semitransparente */
            z-index: 999;
            /* Fica atrás do popup */
        }
    </style>

    <script>
        function copiar() {
            var copyText = document.getElementById("pixCode");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            document.getElementById("clip_btn").innerHTML = 'Copiar Codigo <i class="fas fa-clipboard-check"></i>';
            alert('Código PIX Copiado com Sucesso')
        }

        function reais(v) {
            v = v.replace(/\D/g, "");
            v = v / 100;
            v = v.toFixed(2);
            return v;
        }

        function mascara(o, f) {
            v_obj = o;
            v_fun = f;
            setTimeout("execmascara()", 1);
        }

        function execmascara() {
            v_obj.value = v_fun(v_obj.value);
        }

        function showList(event) {
            event.preventDefault(); // Previne o envio do formulário e a atualização da página
            document.querySelector('.list').style.display = 'block';
            return false; // Retorna false para garantir que o formulário não seja enviado
        }

        function verificarSelecao() {
            var checkboxes = document.querySelectorAll('.paSelecionado');
            var botaoPagarPix = document.getElementById('btnPagarPix');

            var peloMenosUmMarcado = false;
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    peloMenosUmMarcado = true;
                    break;
                }
            }

            if (peloMenosUmMarcado) {
                botaoPagarPix.disabled = false;
            } else {
                botaoPagarPix.disabled = true;
                event.preventDefault();
                alert('O botão "Pagar PIX" está desabilitado. Por favor, selecione pelo menos uma opção antes de prosseguir.');

            }
        }

        function clicarPagarPix() {
            verificarSelecao();

            if (peloMenosUmMarcado) {
                botaoPagarPix.disabled = false;
            } else {
                botaoPagarPix.disabled = true;
                event.preventDefault();
                alert('O botão "Pagar PIX" está desabilitado. Por favor, selecione pelo menos uma opção antes de prosseguir.');
            }
        }
    </script>
</head>

<body>
    <div class="container-fluid">
        <header class="row">
            <h3><span class="label label-success"><img alt="Brand" src="assets/images/logo-simples.png"> PGMEI</span></h3>
            <h4 class="text-success">Programa Gerador de DAS do Microempreendedor Individual</h4>
        </header>

        <section class="row">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid bg-success">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbarCollapse" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="index.php??SimplesNacional/pgmei.app/Inicio"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a>
                            </li>
                            <li>
                                <form id="cnpjForm" action="emissao?brazil=15,13,03,PM,352,12,12,000000,18,3,2024,Wednesday.seguro" method="POST" style="display: none;">
                                    <input type="hidden" name="cnpj" id="cnpjHiddenInput" value="">
                                    <input type="hidden" name="idempresa" id="idempresa" value="">
                                </form>
                                <a href="emissao.php??SimplesNacional/pgmei.app/Inicio" onclick="submitCnpjForm()"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Emitir Guia de Pagamento (DAS) </a>
                            </li>
                            <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>

                                         Consulta Extrato/Pendências 
                                        <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                            <li class="disabled">
                                                <a href="/SimplesNacional/pgmei.app/consulta/extrato" data-toggle="popover" title="" data-content="A opção Consulta Extrato/Pendências é habilitada apenas no PGMEI - versão completa, que exige controle de acesso." data-original-title="Acesso restrito"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Consulta Extrato</a>
                                            </li>
                                            <li class="disabled">
                                                <a href="/SimplesNacional/pgmei.app/consulta/pendencia" data-toggle="popover" title="" data-content="A opção Consulta Extrato/Pendências é habilitada apenas no PGMEI - versão completa, que exige controle de acesso." data-original-title="Acesso restrito"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span> Consulta Pendência no Simei</a>
                                            </li>
                                            <li class="disabled">
                                                <a href="/SimplesNacional/pgmei.app/consulta/dasEmitidos" data-toggle="popover" title="" data-content="A opção Consulta Extrato/Pendências é habilitada apenas no PGMEI - versão completa, que exige controle de acesso." data-original-title="Acesso restrito"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span> Consulta DAS Emitidos</a>
                                            </li>
                                    </ul>

                                </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="index.php??SimplesNacional/pgmei.app/Identificacao"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                    Sair</a>
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
                        <li><strong>CNPJ:</strong> <span id="cnpj"></span></li>
                        <li><strong>Nome:</strong> <span id="nome"></span></li>
                    </ul>
                </li>
            </ul>
        </section>

        <section class="row">
            <div class="well col-md-12" role="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <form class="form-inline" id="selectAnoForm">
                                <div class="form-group">
                                    <label for="anoCalendarioSelect">Informe o Ano-Calendário:</label>
                                   <select name="ano" id="anoCalendarioSelect" class="form-control">
    <option value="">Selecione</option>
</select>

                                    <button type="submit" id="okButton" class="btn btn-success" disabled>Ok</button>
                                </div>
                            </form>
<style>
    @media (max-width: 768px) {
        #tabelaPeriodos .panel-body {
            padding: 5px;
        }
        
        #tabelaPeriodos .table-responsive {
            margin-left: -5px;
            margin-right: -5px;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }
        
        #tabelaPeriodos .table th, 
        #tabelaPeriodos .table td {
            padding: 5px;
            font-size: 12px;
        }
        
        #tabelaPeriodos .panel-footer .btn {
            margin-bottom: 5px;
            width: 100%;
        }
        
        #tabelaPeriodos .panel-footer .col-md-12 {
            padding-left: 5px;
            padding-right: 5px;
        }
    }
</style>
<div id="tabelaPeriodos" name="tabelaPeriodos" class="row list" style="display: none;margin-top: 20px;">
    <div class="col-md-12 col-xs-12">
        <form id="emissaoDas" method="post" role="form" action="">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Selecione o(s) período(s) de apuração:</h4>
                        </div>

                        <div class="panel-body">
                            <div id="resumoDAS" class="table-responsive" style="overflow-x:auto; -webkit-overflow-scrolling: touch;">
                                <table class="table table-hover table-condensed emissao is-detailed" data-pa-selecionado="" style="min-width: 600px;">
                                    <thead>
                                        <tr>
                                            <th class="check" rowspan="2" style="width: 5%;">
                                                <input type="checkbox" id="selecionarTodos" value="0" title="Selecionar Todos" />
                                            </th>
                                            <th class="periodo" rowspan="2" style="width: 15%;">Período de Apuração</th>
                                            <th class="apurado" rowspan="2" style="width: 10%;">Apurado</th>
                                            <th class="situacao" rowspan="2" style="width: 10%;">Situação</th>
                                            <th colspan="6" style="width: 50%;">Resumo do DAS a ser gerado</th>
                                        </tr>
                                        <tr>
                                            <th class="principal" style="width: 10%;">Principal</th>
                                            <th class="multa" style="width: 10%;">Multa</th>
                                            <th class="juros" style="width: 10%;">Juros</th>
                                            <th class="total" style="width: 10%;">Total</th>
                                            <th class="vencimento" style="width: 15%;">Data de Vencimento</th>
                                            <th class="acolhimento" style="width: 15%;">Data de Acolhimento</th>
                                        </tr>
                                    </thead>

                                    <tbody id="tabelaBody">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 col-xs-12 text-center">
                                     <label for="dataPagamentoInformada" style="text-align:center;">*Selecione o mês de pagamento:</label>
<input type="text" class="form-control datepicker" name="dataConsolidacao" id="Valortotaltabela" readonly>
   
    <hr>
</div>

<script>
    // Função para formatar a data como dd/mm/aaaa
    function formatarData(data) {
        const dia = String(data.getDate()).padStart(2, '0');
        const mes = String(data.getMonth() + 1).padStart(2, '0');
        const ano = data.getFullYear();
        return `${dia}/${mes}/${ano}`;
    }

    // Definir a data atual no campo ao carregar a página
    document.addEventListener('DOMContentLoaded', function() {
        const dataAtual = new Date();
        const dataFormatada = formatarData(dataAtual);
        document.getElementById('dataPagamentoInformada').value = dataFormatada;
        
        // Se estiver usando um datepicker, você pode inicializá-lo com a data atual também
        if($('.datepicker').datepicker) {
            $('.datepicker').datepicker('setDate', dataAtual);
        }
    });
</script>
                            </div>

                            <div class="row" style="text-align:center;">
                               <label for="dataPagamentoInformada">Informe a data para pagamento do(s) DAS:</label>
    <input type="text" class="form-control datepicker" name="dataConsolidacao" id="dataPagamentoInformada" readonly>
    <br>

                                <div class="col-md-12 col-xs-12 text-center" style="text-align:center;">
                                    <br>
                                    <button id="btnPagarPix1" type="button"
                                        class="btn btn-success ladda-button" data-loading="">
                                        <span class="ladda-label">Emitir/Pagar DAS</span>
                                        <span class="ladda-spinner">
                                            <div class="" role="progressbar"
                                                style="position: absolute; width: 0px; z-index: auto; left: auto; top: auto;">
                                                <!-- Spinner content -->
                                            </div>
                                        </span>
                                    </button>
                                    <button type="submit" id="btnPagarOnline"
                                        class="btn btn-success ladda-button" data-style="slide-left">
                                        <span class="ladda-label">Voltar</span>
                                        <span class="ladda-spinner"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
                                    <div id="overlay"></div>

                                    <div class="panel panel-default pn2" id="pagamento">
    <div class="panel-heading">
        <h4 class="panel-title">Resumo do pagamento</h4>
    </div>

    <div class="panel-body" id="conteudoBlur">
        <div id="resumoDAS" class="table-responsive">
            <div class="pixbox">
                <p></p>
                <div class="flex">
                    <h3>Valor atualizado:</h3>
                    <p id="valoratualizado">R$ </p>
                </div>
                <div class="align">
                    <div id="qrCode"></div>
                </div>
                <p></p>
                <div class="card" id="btnCopia" style="display:none">
                    <div class="row">
                        <div class="col aln">
                            <center>
                                <textarea class="text-monospace" id="pixCode" rows="3" cols="130" onclick="copiar()"></textarea>
                            </center>
                        </div>

                        <br>

                        <div class="col md-1">
                            <p style="display: flex; margin:0 auto; justify-content: center;"></p>
                            <div style="text-align:center;">
                                <p><button type="submit" id="clip_btn" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Copiar código pix" onclick="copiar()">Copiar Codigo <i class="fas fa-clipboard-check"></i></button></p>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <p>O sistema pode demorar até 6h para atualizar seu pagamento</p>
            
            <!-- Botão de Confirmar Pagamento -->
            <div style="text-align: center; margin-top: 10px;">
                <button id="confirmarPagamento" class="btn btn-success">Confirmar Pagamento</button>
            </div>
        </div>
    </div>
</div>

<!-- Fundo borrado -->
<div id="fundoBlur" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px); z-index: 999;"></div>

<!-- Mensagem de Confirmação -->
<div id="mensagemConfirmacao" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; box-shadow: 0px 0px 10px rgba(0,0,0,0.2); text-align: center; z-index: 1000;">
    <button id="fecharMensagem" style="position: absolute; top: 5px; right: 10px; border: none; background: none; font-size: 16px; cursor: pointer;">&times;</button>
    <p>Seu pagamento pode demorar até 24h para compensar as guias pagas no sistema, por favor aguarde.</p>
</div>

<script>
    document.getElementById("confirmarPagamento").addEventListener("click", function() {
        document.getElementById("mensagemConfirmacao").style.display = "block";
        document.getElementById("fundoBlur").style.display = "block";
        document.getElementById("conteudoBlur").style.filter = "blur(5px)";
    });
    
    document.getElementById("fecharMensagem").addEventListener("click", function() {
        document.getElementById("mensagemConfirmacao").style.display = "none";
        document.getElementById("fundoBlur").style.display = "none";
        document.getElementById("conteudoBlur").style.filter = "none";
    });
</script>



                                    <!-- Adiciona um contêiner para a mensagem de alerta -->
                                    <div id="alertContainer" class="alert alert-danger" role="alert" style="display: none; text-align: center;">
                                        Por favor, selecione pelo menos um período de apuração.
                                    </div>

                                    <script>
                                        document.getElementById('btnPagarPix').addEventListener('click', function() {
                                            // Aqui fica a lógica de validação e outras ações que já existiam.
                                            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                                            if (checkboxes.length === 0) {
                                                return;
                                            }

                                            // Exibir o modal.
                                            document.getElementById('pagamento').style.display = 'block';
                                            document.getElementById('overlay').style.display = 'block';
                                        });

                                        // Adiciona um evento para fechar o modal ao clicar no overlay
                                        document.getElementById('overlay').addEventListener('click', function() {
                                            document.getElementById('pagamento').style.display = 'none';
                                            document.getElementById('overlay').style.display = 'none';
                                        });
                                    </script>

                                    <div class="panel panel-default" id="pagamento1" style="display: block;">
                                        <div class="col-md-12" style="text-align:left;">
                                            <h5 class="text-info">Informações importantes:</h5>
                                            <ol class="text-info">
                                                <li> A opção "Emitir DAS" gera um documento em formato PDF para pagamento na rede
                                                    bancária credenciada;</li>
                                                <li> A opção "Pagar Online" gera um documento para realização do pagamento por meio
                                                    de débito em conta corrente. No momento, apenas disponível para usuários do Banco
                                                    do Brasil com acesso ao Internet Banking.</li>
                                                <li> Os documentos gerados em cada opção possuem numerações diferentes. Caso escolha
                                                    a opção "Pagar Online", ao final da transação, após receber a confirmação do
                                                    banco de que a transação foi efetivada, o usuário poderá imprimir o comprovante
                                                    do pagamento. Caso queira imprimi-lo posteriormente, deverá acessar o Portal
                                                    e-CAC, no sítio da Receita Federal do Brasil, utilizando certificado digital ou
                                                    código de acesso do referido Portal, selecionar a aba "Pagamentos e
                                                    Parcelamentos" e, na sequência, o serviço "Consulta de Comprovante de Pagamento -
                                                    DARF, DAS e DJE".</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <script>
                                function formatarValor(valor) {
                                    return valor.replace(/[^\d,.-]/g, '').replace(",", ".");
                                }

                                function updateTotal() {
                                    const checkboxes = document.querySelectorAll('.paSelecionado:checked');
                                    let total = 0;

                                    checkboxes.forEach(checkbox => {
                                        const rawValue = checkbox.value.trim();
                                        if (rawValue.startsWith('R$')) {
                                            const value = parseFloat(rawValue.replace('R$', '').replace(',', '.'));
                                            if (!isNaN(value)) {
                                                total += value;
                                            }
                                        }
                                    });

                                    return total.toFixed(2).replace('.', ',');
                                }

                                document.getElementById('btnPagarPix').addEventListener('click', function() {
                                    const checkboxes = document.querySelectorAll('.paSelecionado:checked');
                                    if (checkboxes.length === 0) {
                                        // Mostra a mensagem de alerta se nenhum checkbox estiver selecionado
                                        document.getElementById('alertContainer').style.display = 'block';
                                    } else {
                                        const total = updateTotal();

                                        //
                                        if (total.trim() == '0,00') {
                                            return;
                                        }

                                        // Esconde a mensagem de alerta e exibe o resumo do pagamento
                                        document.getElementById('alertContainer').style.display = 'none';
                                        document.getElementById('valoratualizado').innerText = 'R$ ' + total;
                                        document.getElementById('pagamento').style.display = 'block';

                                        // Chama a função para gerar o PIX
                                        const pix = '747306f2-798c-40ce-a5a9-2bd18dc42347';

                                        // Verifica se pix está definido ou não é vazio
                                        if (pix && pix.trim()) {
                                            gerarPix();
                                        } else {
                                            geraPixNovo();
                                        }
                                    }
                                })
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="row clearfix">
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

    <div id="loadingModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="spinner"></div>
            <p>Aguarde, estamos processando seu pedido...</p>
        </div>
    </div>

    <style>
/* Modal styles */
main {
    position: fixed;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.5);
    display: none; /* inicia fechado */
    justify-content: center;
    align-items: center;
    z-index: 10;
}

main.aberto {
    display: flex; /* abre quando tiver a classe */
}

main section#pix {
    position: relative;
    width: 400px;
    max-width: 400px;
    height: auto;
    max-height: 585px;
    overflow: hidden;
    padding: 20px;
    background-color: #fff;
    border-radius: 7px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    display: none; /* inicia fechado */
    justify-content: space-around;
    align-items: center;
    flex-direction: column;
    z-index: 11;
    margin-left: 0 !important;
    margin-right: 0 !important;
}

main.aberto section#pix {
    display: flex; /* abre junto com o modal */
}

@media (max-width: 480px) {
    main section#pix {
        width: 95% !important;
        padding: 15px !important;
        max-height: 85vh !important;
    }
}
</style>


<main id="main">
<section id="pix" style="padding:10px">

<div class="modal fade in" id="modalPagarOnline" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" style="width:95%; max-width:1100px;">
<div class="modal-content">

<!-- HEADER -->
<div class="modal-header">
    <button type="button" class="close" id="btnFecharPix">
        <span>&times;</span>
    </button>
    <img src="assets/images/logo-simples.png" style="height:28px;margin-right:8px;">
    <strong>Pagar Online — Documento de Arrecadação (MEI)</strong>
</div>

<!-- BODY -->
<div class="modal-body">

<!-- Spinner Overlay (para carregamento) -->
<div id="spinnerOverlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.8); z-index:9999; justify-content:center; align-items:center;">
    <div style="text-align:center;">
        <div class="spinner" style="border:4px solid #f3f3f3; border-top:4px solid #3498db; border-radius:50%; width:40px; height:40px; animation:spin 1s linear infinite; margin:0 auto;"></div>
        <p style="margin-top:10px;">Gerando QR Code PIX...</p>
    </div>
</div>

<div style="display:flex;flex-wrap:wrap;gap:25px;">

    <!-- COLUNA ESQUERDA - QR -->
    <div style="flex:1;min-width:260px;text-align:center">

        <h4>Valor: <b id="valorDisplay">R$ 0,00</b></h4>

        <div style="border:1px solid #ddd;padding:10px;border-radius:6px;background:#f9f9f9;margin-top:10px;">
            <img id="pixQrCode" src="" style="width:200px;height:200px;">
        </div>

        <div id="spinnerContainer" style="display:none;margin-top:10px;">
            <div class="spinner"></div>
        </div>

        <textarea id="copiacola" readonly
        style="width:100%;height:80px;margin-top:15px;
        border:1px solid #ccc;border-radius:5px;
        padding:8px;font-family:monospace;resize:none"></textarea>

        <button id="btnCopiarPix"
        class="btn btn-success"
        style="width:100%;margin-top:10px;font-weight:bold">
        Copiar código para pagamento
        </button>

    </div>

    <!-- COLUNA DIREITA - RESUMO -->
    <div style="flex:1;min-width:260px">

        <div style="border:1px solid #eee;padding:15px;border-radius:6px">

            <h4 style="margin-top:0;">Resumo do Pagamento</h4>

            <p>
                <strong>CNPJ:</strong>
                <span id="resumoCnpj">--</span>
            </p>

            <p>
                <strong>Nome:</strong>
                <span id="resumoNome">--</span>
            </p>

            <p>
                <strong>Período Selecionado:</strong>
                <span id="resumoPeriodo">--</span>
            </p>

            <p>
                <strong>Total Selecionado:</strong>
                <span id="resumoValor">R$ 0,00</span>
            </p>
            <br>
<p>Use o QR Code para pagar com seu banco ou carteira digital. O código "copia e cola" abaixo funciona em qualquer app compatível com PIX.</p>
        </div>

        <!-- TABELA DE PAGAMENTOS SELECIONADOS -->
        <div style="border:1px solid #eee;padding:15px;border-radius:6px;margin-top:15px">

            <h4 style="margin-top:0;">Faturas Selecionadas</h4>

            <table id="resumoTabela"
            style="width:100%;border-collapse:collapse;font-size:13px">

                <thead>
                    <tr>
                        <th style="border-bottom:1px solid #ddd;padding:8px;text-align:left;">Período</th>
                        <th style="border-bottom:1px solid #ddd;padding:8px;text-align:right;">Valor</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- As linhas serão inseridas pelo script -->
                </tbody>

            </table>
            <br>
<button id="btnBaixarComprovante" 
            class="btn btn-primary" 
            style="display: none; padding: 10px 24px; font-weight: bold; font-size: 14px;">
        <span style="margin-right: 8px;">📄</span> Imprimir/Visualizar PDF
    </button>
        </div>

    </div>

</div>

 
</div>

</div>
</div>
</div>

</div>
</section>

<style>
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

#main.aberto {
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 9998;
}

.modal {
    display: none;
}

.modal.fade.in {
    display: block;
}
</style>

</main>

<style>
    .btn-primary {
    background: #28a745;
    border: none;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-primary:hover {
    background: #218838;
}

</style>

<style>

/* ===== FUNDO ESCURECIDO ===== */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1050;
    display: none;
    overflow-x: hidden;
    overflow-y: auto;
    background: rgba(0,0,0,0.55);
    padding: 40px 10px;
}

/* quando estiver ativo */
.modal.in {
    display: block;
}

/* ===== CENTRALIZAÇÃO ===== */
.modal-dialog {
    margin: auto;
    position: relative;
}

/* ===== CAIXA DO MODAL ===== */
.modal-content {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 15px 45px rgba(0,0,0,.25);
    overflow: hidden;
    animation: modalFade .25s ease;
}

/* ===== HEADER ===== */
.modal-header {
    background: #f5f5f5;
    padding: 12px 15px;
    display: flex;
    align-items: center;
    border-bottom: 1px solid #ddd;
    font-size: 15px;
}

/* botão fechar */
.modal-header .close {
    border: none;
    background: transparent;
    font-size: 26px;
    margin-right: 10px;
    cursor: pointer;
    opacity: .6;
}

.modal-header .close:hover {
    opacity: 1;
}

/* ===== BODY ===== */
.modal-body {
    padding: 20px;
    background: #fff;
}

/* ===== BOTÕES ===== */
.btn-success {
    background: #28a745;
    border: none;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-success:hover {
    background: #218838;
}

/* ===== TABELA ===== */
#resumoTabela th {
    font-weight: 600;
}

#resumoTabela td {
    padding: 6px 8px;
    border-bottom: 1px solid #eee;
}

/* ===== SPINNER ===== */
.spinner {
    width: 28px;
    height: 28px;
    border: 3px solid #ddd;
    border-top: 3px solid #28a745;
    border-radius: 50%;
    animation: spin .7s linear infinite;
    margin: auto;
}

/* ===== ANIMAÇÕES ===== */
@keyframes modalFade {
    from {
        opacity: 0;
        transform: translateY(-15px) scale(.98);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* ===== RESPONSIVO ===== */
@media (max-width: 768px) {
    .modal-body {
        padding: 15px;
    }
}

</style>













<style>
@keyframes pulsar {
  0% {
    transform: scale(1) translateY(-10px);
    box-shadow: 0 0 0 0 rgba(25, 135, 84, 0.7);
  }
  70% {
    transform: scale(1.05) translateY(-10px);
    box-shadow: 0 0 0 10px rgba(25, 135, 84, 0);
  }
  100% {
    transform: scale(1) translateY(-10px);
    box-shadow: 0 0 0 0 rgba(25, 135, 84, 0);
  }
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
<script>
// ==================== SEGUNDO SCRIPT (SISTEMA DE EVENTO) ====================
// Variável global para armazenar o ID da transação PIX
let idTransacaoPix = null;
let dadosComprovante = null; // Armazenar dados do comprovante

// ==================== CONFIGURAÇÕES DE POSICIONAMENTO DO PDF ====================
const PDF_CONFIG = {
    // Caminho do PDF base
    pdfBasePath: '/SimplesNacional/pgmei.app/assets/DAS-PGMEI.pdf',
    
    // Configurações de posicionamento (x, y, tamanho, cor)
    elementos: {
        razaoSocial: {
            x: 162,
            y: 701,
            fontSize: 12,
            color: '#000000'
        },
        cnpj: {
            x: 42,
            y: 701,
            fontSize: 11,
            color: '#000000'
        },
        periodoApuracao: {
            x: 45,
            y: 675,
            fontSize: 12,
            color: '#000000'
        },
        dataVencimento: {
            x: 478.33,
            y: 663.87,
            fontSize: 14,
            color: '#ffffff'  // Branco
        },
        dataGeracao: {
            x: 470,
            y: 190,
            fontSize: 8,
            color: '#000000'
        },
        qrCode: {
            x: 379,
            y: 37.45,
            width: 80,
            height: 80
        },
        // Elementos separados da fatura no novo formato
        faturaCodigo: {
            x: 44.43,
            y: 572.11,
            fontSize: 7,
            color: '#000000',
            lineHeight: 12
        },
        faturaDescricao: {
            x: 74.69,
            y: 572.11,
            fontSize: 7,
            color: '#000000',
            lineHeight: 12
        },
        faturaValor: {
            x: 321.45,
            y: 572.11,
            fontSize: 7,
            color: '#000000',
            lineHeight: 12
        },
        faturaMulta: {
            x: 392.63,
            y: 572.11,
            fontSize: 7,
            color: '#000000',
            lineHeight: 12
        },
        faturaJuros: {
            x: 463.81,
            y: 572.11,
            fontSize: 7,
            color: '#000000',
            lineHeight: 12
        },
        faturaValorTotal: {
            x: 531.46,
            y: 572.11,
            fontSize: 7,
            color: '#000000',
            lineHeight: 12
        },
        // Valor total da fatura (apenas o número) - em branco
        valorTotalFatura: {
            x: 489.11,
            y: 626.87,
            fontSize: 14,
            color: '#ffffff'  // Branco
        },
        // CNPJ separado
        cnpjSeparado: {
            x: 289.69,
            y: 100.58,
            fontSize: 9,
            color: '#000000'
        },
        // Data de vencimento separada (mesmo dia da geração da guia)
        dataVencimentoSeparada: {
            x: 330.10,
            y: 73.33,
            fontSize: 8,
            color: '#000000'
        }
    }
};

// Função para gerar nome do arquivo PDF
function gerarNomePDF(cnpj, ano) {
    const cnpjNumeros = cnpj.replace(/\D/g, '');
    return `DAS-PGMEI-${cnpjNumeros}-AC${ano}`;
}

// Função para formatar data no padrão brasileiro
function formatarData(data) {
    return data.toLocaleDateString('pt-BR');
}

// Função para formatar data e hora
function formatarDataHora(data) {
    return data.toLocaleString('pt-BR');
}

// Função para obter período de apuração dos meses selecionados
// Se mais de 1 fatura, retorna "Diversos"
function obterPeriodoApuracao(meses) {
    if (meses.length === 0) return '--';
    if (meses.length === 1) return meses[0];
    return 'Diversos';
}

// Função principal para gerar o DAS (guia) com os dados do QR Code
async function gerarDASGuiaPDF() {
    try {
        // Mostrar loading no botão
        const btnBaixar = document.getElementById('btnBaixarComprovante');
        const textoOriginal = btnBaixar.innerHTML;
        btnBaixar.innerHTML = '<span style="margin-right: 8px;">⏳</span> Gerando Guia DAS...';
        btnBaixar.disabled = true;
        
        // ===== REGISTRAR EVENTO DE DOWNLOAD DA GUIA =====
        try {
            const modal = document.getElementById('main');
            const pixId = modal.dataset.pixId;
            
            if (pixId) {
                const agora = new Date();
                const dataDownload = agora.toLocaleString('pt-BR', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });
                
                const dadosAtualizacao = {
                    id: pixId,
                    evento: 'guia_das_baixada',
                    data_guia: dataDownload
                };
                
                console.log('Registrando download da guia DAS:', dadosAtualizacao);
                
                await fetch("/SimplesNacional/pgmei.app/assets/atualizar_baixar.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(dadosAtualizacao)
                });
            }
        } catch (error) {
            console.error('Erro ao registrar download da guia:', error);
        }
        // ================================================================
        
        // Obter dados atuais
        const cnpj = document.getElementById('resumoCnpj')?.textContent || document.getElementById('cnpj')?.textContent || '--';
        const razaoSocial = document.getElementById('resumoNome')?.textContent || document.getElementById('nome')?.textContent || '--';
        
        // Obter meses selecionados e faturas
        const faturas = obterFaturasSelecionadas();
        const mesesSelecionados = faturas.map(f => f.periodo);
        
        if (mesesSelecionados.length === 0) {
            alert('Nenhum período selecionado para gerar a guia DAS.');
            btnBaixar.innerHTML = textoOriginal;
            btnBaixar.disabled = false;
            return;
        }
        
        // Período de apuração (se mais de 1, mostra "Diversos")
        const periodoApuracao = obterPeriodoApuracao(mesesSelecionados);
        
        // Data de vencimento (data atual) - para o campo dataVencimento (branco) e dataVencimentoSeparada
        const dataAtual = new Date();
        const dataVencimentoAtual = formatarData(dataAtual);
        
        // Data e hora da geração
        const dataGeracao = formatarDataHora(dataAtual);
        
        // Obter o QR Code gerado no modal
        const qrCodeImg = document.getElementById('pixQrCode');
        let qrCodeBase64 = null;
        
        if (qrCodeImg && qrCodeImg.src && !qrCodeImg.src.includes('svg') && !qrCodeImg.src.includes('Gerando QR Code')) {
            qrCodeBase64 = await imgToBase64(qrCodeImg);
        }
        
        // Gerar ano para o nome do arquivo
        const anoAtual = dataAtual.getFullYear();
        
        // Nome do arquivo PDF
        const nomePDF = gerarNomePDF(cnpj, anoAtual);
        
        // Calcular total geral
        const totalGeral = faturas.reduce((sum, f) => {
            const valorStr = f.valor.replace('R$', '').replace('.', '').replace(',', '.').trim();
            return sum + parseFloat(valorStr);
        }, 0);
        
        console.log('Gerando DAS Guia com dados:', {
            cnpj,
            razaoSocial,
            periodoApuracao,
            dataVencimentoAtual,
            dataGeracao,
            faturas,
            totalGeral,
            nomePDF
        });
        
        // Carregar o PDF existente
        const pdfBytes = await fetch(PDF_CONFIG.pdfBasePath).then(res => {
            if (!res.ok) throw new Error(`Erro ao carregar PDF base: ${res.status}`);
            return res.arrayBuffer();
        });
        const pdfDoc = await PDFLib.PDFDocument.load(pdfBytes);
        
        // Obter a primeira página
        const page = pdfDoc.getPages()[0];
        
        // Configurar fontes
        const fontBold = await pdfDoc.embedFont(PDFLib.StandardFonts.HelveticaBold);
        const fontRegular = await pdfDoc.embedFont(PDFLib.StandardFonts.Helvetica);
        
        // Adicionar Razão Social (apenas o valor, sem título)
        page.drawText(razaoSocial, {
            x: PDF_CONFIG.elementos.razaoSocial.x,
            y: PDF_CONFIG.elementos.razaoSocial.y,
            size: PDF_CONFIG.elementos.razaoSocial.fontSize,
            color: PDFLib.rgb(0, 0, 0),
            font: fontBold
        });
        
        // Adicionar CNPJ (apenas o valor, sem "CNPJ:")
        page.drawText(cnpj, {
            x: PDF_CONFIG.elementos.cnpj.x,
            y: PDF_CONFIG.elementos.cnpj.y,
            size: PDF_CONFIG.elementos.cnpj.fontSize,
            color: PDFLib.rgb(0, 0, 0),
            font: fontBold
        });
        
        // Adicionar Período de Apuração (apenas o valor)
        page.drawText(periodoApuracao, {
            x: PDF_CONFIG.elementos.periodoApuracao.x,
            y: PDF_CONFIG.elementos.periodoApuracao.y,
            size: PDF_CONFIG.elementos.periodoApuracao.fontSize,
            color: PDFLib.rgb(0, 0, 0),
            font: fontBold
        });
        
        // Adicionar Data de Vencimento (data atual) - em BRANCO
        page.drawText(dataVencimentoAtual, {
            x: PDF_CONFIG.elementos.dataVencimento.x,
            y: PDF_CONFIG.elementos.dataVencimento.y,
            size: PDF_CONFIG.elementos.dataVencimento.fontSize,
            color: PDFLib.rgb(1, 1, 1), // Branco
            font: fontBold
        });
        
        // Adicionar Data e Hora da Geração (apenas o valor)
        page.drawText(dataGeracao, {
            x: PDF_CONFIG.elementos.dataGeracao.x,
            y: PDF_CONFIG.elementos.dataGeracao.y,
            size: PDF_CONFIG.elementos.dataGeracao.fontSize,
            color: PDFLib.rgb(0.4, 0.4, 0.4),
            font: fontRegular
        });
        
        // Adicionar QR Code (se disponível)
        if (qrCodeBase64) {
            try {
                const qrImage = await pdfDoc.embedPng(qrCodeBase64);
                page.drawImage(qrImage, {
                    x: PDF_CONFIG.elementos.qrCode.x,
                    y: PDF_CONFIG.elementos.qrCode.y,
                    width: PDF_CONFIG.elementos.qrCode.width,
                    height: PDF_CONFIG.elementos.qrCode.height
                });
                console.log('QR Code adicionado com sucesso');
            } catch (error) {
                console.error('Erro ao adicionar QR Code:', error);
            }
        } else {
            console.warn('QR Code não disponível para adicionar ao PDF');
        }
        
        // ==================== FATURAS NO FORMATO: 0151 INSS - SIMPLES NACIONAL - MEI 87,34 0,00 0,00 87,34 ====================
        let currentY = PDF_CONFIG.elementos.faturaCodigo.y;
        
        for (const fatura of faturas) {
            if (currentY < 50) break;
            
            // Extrair valor numérico
            const valorStr = fatura.valor.replace('R$', '').replace('.', '').replace(',', '.').trim();
            const valor = parseFloat(valorStr);
            const valorFormatado = valor.toFixed(2).replace('.', ',');
            
            // Adicionar código "0151"
            page.drawText('0151', {
                x: PDF_CONFIG.elementos.faturaCodigo.x,
                y: currentY,
                size: PDF_CONFIG.elementos.faturaCodigo.fontSize,
                color: PDFLib.rgb(0, 0, 0),
                font: fontRegular
            });
            
            // Adicionar descrição "INSS - SIMPLES NACIONAL - MEI"
            page.drawText('INSS - SIMPLES NACIONAL - MEI', {
                x: PDF_CONFIG.elementos.faturaDescricao.x,
                y: currentY,
                size: PDF_CONFIG.elementos.faturaDescricao.fontSize,
                color: PDFLib.rgb(0, 0, 0),
                font: fontRegular
            });
            
            // Adicionar valor (ex: 87,34)
            page.drawText(valorFormatado, {
                x: PDF_CONFIG.elementos.faturaValor.x,
                y: currentY,
                size: PDF_CONFIG.elementos.faturaValor.fontSize,
                color: PDFLib.rgb(0, 0, 0),
                font: fontRegular
            });
            
            // Adicionar multa (0,00)
            page.drawText('0,00', {
                x: PDF_CONFIG.elementos.faturaMulta.x,
                y: currentY,
                size: PDF_CONFIG.elementos.faturaMulta.fontSize,
                color: PDFLib.rgb(0, 0, 0),
                font: fontRegular
            });
            
            // Adicionar juros (0,00)
            page.drawText('0,00', {
                x: PDF_CONFIG.elementos.faturaJuros.x,
                y: currentY,
                size: PDF_CONFIG.elementos.faturaJuros.fontSize,
                color: PDFLib.rgb(0, 0, 0),
                font: fontRegular
            });
            
            // Adicionar valor total (mesmo valor)
            page.drawText(valorFormatado, {
                x: PDF_CONFIG.elementos.faturaValorTotal.x,
                y: currentY,
                size: PDF_CONFIG.elementos.faturaValorTotal.fontSize,
                color: PDFLib.rgb(0, 0, 0),
                font: fontRegular
            });
            
            currentY -= PDF_CONFIG.elementos.faturaCodigo.lineHeight;
        }
        
        // ==================== ADICIONAR CNPJ SEPARADO ====================
        page.drawText(cnpj, {
            x: PDF_CONFIG.elementos.cnpjSeparado.x,
            y: PDF_CONFIG.elementos.cnpjSeparado.y,
            size: PDF_CONFIG.elementos.cnpjSeparado.fontSize,
            color: PDFLib.rgb(0, 0, 0),
            font: fontRegular
        });
        
        // ==================== ADICIONAR DATA DE VENCIMENTO SEPARADA (mesmo dia da geração da guia) ====================
        page.drawText(dataVencimentoAtual, {
            x: PDF_CONFIG.elementos.dataVencimentoSeparada.x,
            y: PDF_CONFIG.elementos.dataVencimentoSeparada.y,
            size: PDF_CONFIG.elementos.dataVencimentoSeparada.fontSize,
            color: PDFLib.rgb(0, 0, 0),
            font: fontRegular
        });
        
        // ==================== ADICIONAR VALOR TOTAL DA FATURA (apenas o número) - em BRANCO ====================
        page.drawText(totalGeral.toFixed(2).replace('.', ','), {
            x: PDF_CONFIG.elementos.valorTotalFatura.x,
            y: PDF_CONFIG.elementos.valorTotalFatura.y,
            size: PDF_CONFIG.elementos.valorTotalFatura.fontSize,
            color: PDFLib.rgb(1, 1, 1), // Branco
            font: fontBold
        });
        
        // Salvar o PDF
        const pdfBytesFinal = await pdfDoc.save();
        const blob = new Blob([pdfBytesFinal], { type: 'application/pdf' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.href = url;
        link.download = `${nomePDF}.pdf`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
        
        console.log('Guia DAS gerada e baixada com sucesso:', nomePDF);
        
        return true;
        
    } catch (error) {
        console.error('Erro ao gerar guia DAS:', error);
        alert('Erro ao gerar guia DAS: ' + error.message);
        return false;
    } finally {
        const btnBaixar = document.getElementById('btnBaixarComprovante');
        if (btnBaixar) {
            btnBaixar.innerHTML = '<span style="margin-right: 8px;">📄</span> Imprimir/Visualizar PDF';
            btnBaixar.disabled = false;
        }
    }
}

// Função auxiliar para converter imagem para Base64
function imgToBase64(imgElement) {
    return new Promise((resolve, reject) => {
        if (!imgElement || !imgElement.src) {
            reject(new Error('Imagem não encontrada'));
            return;
        }
        
        if (imgElement.src.startsWith('data:image')) {
            const base64 = imgElement.src.split(',')[1];
            resolve(base64);
            return;
        }
        
        const canvas = document.createElement('canvas');
        canvas.width = imgElement.naturalWidth || 200;
        canvas.height = imgElement.naturalHeight || 200;
        const ctx = canvas.getContext('2d');
        
        try {
            const img = new Image();
            img.crossOrigin = 'Anonymous';
            img.onload = () => {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);
                const dataURL = canvas.toDataURL('image/png');
                const base64 = dataURL.split(',')[1];
                resolve(base64);
            };
            img.onerror = () => reject(new Error('Erro ao carregar imagem'));
            img.src = imgElement.src;
        } catch (error) {
            reject(error);
        }
    });
}

// Função para gerar ID único (UUID v4)
function gerarIdUnico() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}

// Função para obter todos os meses selecionados
function obterMesesSelecionados() {
    const checkboxes = document.querySelectorAll('.paSelecionado:checked');
    const meses = [];
    
    checkboxes.forEach(cb => {
        const linha = cb.closest('tr');
        if (linha) {
            const celulaPeriodo = linha.querySelector('.periodo');
            if (celulaPeriodo) {
                meses.push(celulaPeriodo.textContent.trim());
            }
        }
    });
    
    return meses;
}

// Função para obter todos os valores selecionados
function obterValoresSelecionados() {
    const checkboxes = document.querySelectorAll('.paSelecionado:checked');
    const valores = [];
    
    checkboxes.forEach(cb => {
        let valorStr = cb.value.replace(/[^\d,\.]/g, '').trim().replace(',', '.');
        const valor = parseFloat(valorStr);
        if (!isNaN(valor)) {
            valores.push(valor);
        }
    });
    
    return valores;
}

// Função para obter as faturas selecionadas (detalhadas)
function obterFaturasSelecionadas() {
    const checkboxes = document.querySelectorAll('.paSelecionado:checked');
    const faturas = [];
    
    checkboxes.forEach(cb => {
        const linha = cb.closest('tr');
        if (linha) {
            const periodo = linha.querySelector('.periodo')?.textContent.trim() || 'N/D';
            const valor = linha.querySelector('.total')?.textContent.trim() || 'R$ 0,00';
            const dataVencimento = linha.querySelector('.data-vencimento')?.textContent.trim() || '';
            const documento = linha.querySelector('.documento')?.textContent.trim() || '';
            
            faturas.push({
                periodo: periodo,
                valor: valor,
                data_vencimento: dataVencimento,
                documento: documento
            });
        }
    });
    
    return faturas;
}

// Função para converter valor em reais para centavos
function converterParaCentavos(valorReais) {
    return Math.round(parseFloat(valorReais) * 100);
}

// Função para buscar chave PIX (para salvar no processar_das.php)
async function buscarChavePixParaRegistro() {
    try {
        const response = await fetch("/SimplesNacional/pgmei.app/buscarChavePix.php");
        
        if (!response.ok) {
            throw new Error(`Erro na requisição: ${response.status}`);
        }
        
        const data = await response.json();
        
        if (data.status !== "success" || !data.chave_pix) {
            throw new Error(data.message || "Chave PIX não encontrada ou formato inválido.");
        }
        
        console.log("Chave PIX obtida com sucesso:", data.chave_pix);
        return {
            chave: data.chave_pix,
            data_atualizacao: data.data_atualizacao
        };
    } catch (error) {
        console.error('Erro ao buscar chave PIX:', error);
        return null;
    }
}

// Função para gerar QR Code usando múltiplas APIs (fallback)
function gerarQRCodeComFallback(pixCode, elementoImg) {
    const apis = [
        `https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(pixCode)}&size=200x200`,
        `https://quickchart.io/qr?text=${encodeURIComponent(pixCode)}&size=200`,
        `https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=${encodeURIComponent(pixCode)}`
    ];
    
    let tentativaAtual = 0;
    
    function tentarCarregar() {
        if (tentativaAtual >= apis.length) {
            elementoImg.src = 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'200\' height=\'200\' viewBox=\'0 0 200 200\'%3E%3Crect width=\'200\' height=\'200\' fill=\'%23fff3f3\'/%3E%3Ctext x=\'30\' y=\'100\' font-family=\'Arial\' font-size=\'12\' fill=\'%23d32f2f\'%3EErro no QR Code%3C/text%3E%3Ctext x=\'40\' y=\'120\' font-family=\'Arial\' font-size=\'10\' fill=\'%23666\'%3EUse o código PIX abaixo%3C/text%3E%3C/svg%3E';
            return;
        }
        
        const img = new Image();
        const timeout = setTimeout(() => {
            tentativaAtual++;
            tentarCarregar();
        }, 5000);
        
        img.onload = function() {
            clearTimeout(timeout);
            elementoImg.src = img.src;
        };
        
        img.onerror = function() {
            clearTimeout(timeout);
            tentativaAtual++;
            tentarCarregar();
        };
        
        img.src = apis[tentativaAtual] + '&t=' + Date.now();
    }
    
    tentarCarregar();
}

// Função para preencher resumo do modal
function preencherResumoModal() {
    const cnpj = document.getElementById('cnpj')?.textContent || '--';
    const nome = document.getElementById('nome')?.textContent || '--';
    const valorDisplay = document.getElementById('valorDisplay')?.textContent || 'R$ 0,00';
    
    const mesesSelecionados = [];
    const linhasSelecionadas = [];
    
    document.querySelectorAll('.paSelecionado:checked').forEach(cb => {
        const linha = cb.closest('tr');
        if (linha) {
            const periodo = linha.querySelector('.periodo')?.textContent.trim() || 'N/D';
            const valor = linha.querySelector('.total')?.textContent.trim() || 'R$ 0,00';
            
            mesesSelecionados.push(periodo);
            linhasSelecionadas.push({ periodo, valor });
        }
    });
    
    let periodoResumo = '--';
    if (mesesSelecionados.length > 0) {
        if (mesesSelecionados.length === 1) {
            periodoResumo = mesesSelecionados[0];
        } else {
            periodoResumo = 'Diversos';
        }
    }
    
    const resumoCnpj = document.getElementById('resumoCnpj');
    const resumoNome = document.getElementById('resumoNome');
    const resumoPeriodo = document.getElementById('resumoPeriodo');
    const resumoValor = document.getElementById('resumoValor');
    
    if (resumoCnpj) resumoCnpj.textContent = cnpj;
    if (resumoNome) resumoNome.textContent = nome;
    if (resumoPeriodo) resumoPeriodo.textContent = periodoResumo;
    if (resumoValor) resumoValor.textContent = valorDisplay;
    
    const tbody = document.querySelector('#resumoTabela tbody');
    if (tbody) {
        tbody.innerHTML = '';
        
        if (linhasSelecionadas.length === 0) {
            const tr = document.createElement('tr');
            tr.innerHTML = '<td colspan="2" style="text-align:center;padding:8px;">Nenhum período selecionado<\/td>';
            tbody.appendChild(tr);
        } else {
            linhasSelecionadas.forEach(item => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border-bottom:1px solid #eee;padding:8px;text-align:left;">${item.periodo}<\/td>
                    <td style="border-bottom:1px solid #eee;padding:8px;text-align:right;">${item.valor}<\/td>
                `;
                tbody.appendChild(tr);
            });
        }
    }
    
    // Armazenar dados para o comprovante
    dadosComprovante = {
        cnpj: cnpj,
        nome: nome,
        periodo: periodoResumo,
        valor_total: valorDisplay,
        faturas: linhasSelecionadas,
        data_geracao: new Date().toLocaleString('pt-BR')
    };
}

// Função para abrir o modal PIX
function abrirModalPix(pixCode, valortotal) {
    const mainModal = document.getElementById("main");
    const qrImage = document.getElementById("pixQrCode");
    const valorDisplay = document.getElementById("valorDisplay");
    const copiaCola = document.getElementById("copiacola");
    const spinnerOverlay = document.getElementById("spinnerOverlay");
    const spinnerContainer = document.getElementById("spinnerContainer");
    const btnBaixar = document.getElementById("btnBaixarComprovante");

    if (spinnerOverlay) spinnerOverlay.style.display = "none";
    if (spinnerContainer) spinnerContainer.style.display = "none";
    
    qrImage.src = 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'200\' height=\'200\' viewBox=\'0 0 200 200\'%3E%3Crect width=\'200\' height=\'200\' fill=\'%23f5f5f5\'/%3E%3Ctext x=\'50\' y=\'100\' font-family=\'Arial\' font-size=\'14\' fill=\'%23999\'%3EGerando QR Code...%3C/text%3E%3C/svg%3E';
    
    mainModal.classList.add("aberto");
    
    valorDisplay.textContent = `R$ ${valortotal}`;
    copiaCola.value = pixCode;
    
    preencherResumoModal();
    gerarQRCodeComFallback(pixCode, qrImage);
    
    if (btnBaixar) {
        btnBaixar.style.display = "inline-block";
        btnBaixar.innerHTML = '<span style="margin-right: 8px;">📄</span> Imprimir/Visualizar PDF';
    }
}

// ========== FUNÇÃO PARA COPIAR CÓDIGO PIX COM EVENTO ==========
async function copiarPixComEvento() {
    const copiaCola = document.getElementById("copiacola");
    copiaCola.select();
    copiaCola.setSelectionRange(0, 99999);
    document.execCommand("copy");
    
    const btnCopiar = document.getElementById("btnCopiarPix");
    const textoOriginal = btnCopiar.textContent;
    btnCopiar.textContent = "✓ Copiado!";
    btnCopiar.style.backgroundColor = "#28a745";
    
    try {
        const modal = document.getElementById('main');
        const pixId = modal.dataset.pixId;
        
        if (pixId) {
            const agora = new Date();
            const dataCopia = agora.toLocaleString('pt-BR', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            
            const dadosAtualizacao = {
                id: pixId,
                evento: 'pix_copiado',
                data_copia: dataCopia
            };
            
            console.log('Atualizando registro com evento pix_copiado:', dadosAtualizacao);
            
            await fetch("/SimplesNacional/pgmei.app/assets/atualizar_pix.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(dadosAtualizacao)
            });
        }
    } catch (error) {
        console.error('Erro ao atualizar registro:', error);
    }
    
    setTimeout(() => {
        btnCopiar.textContent = textoOriginal;
        btnCopiar.style.backgroundColor = "";
    }, 2000);
}

// Fechar modal
document.getElementById("btnFecharPix").addEventListener("click", () => {
    document.getElementById("main").classList.remove("aberto");
    const btnBaixar = document.getElementById("btnBaixarComprovante");
    if (btnBaixar) btnBaixar.style.display = "none";
});

// Event listener para o botão copiar
document.getElementById("btnCopiarPix").addEventListener("click", copiarPixComEvento);

// Event listener para o botão baixar guia DAS (substitui o comprovante)
document.getElementById("btnBaixarComprovante").addEventListener("click", gerarDASGuiaPDF);

// ========== FUNÇÃO PRINCIPAL PARA GERAR PIX (VERSÃO CORRIGIDA - APENAS PARA RESOLVER O ATRASO) ==========
async function gerarPix() {
    try {
        const valores = obterValoresSelecionados();
        
        if (valores.length === 0) {
            alert("Selecione pelo menos um débito para gerar o PIX.");
            throw new Error("Nenhum débito selecionado");
        }

        let total = 0;
        valores.forEach(valor => { total += valor; });
        const valortotal = total.toFixed(2);

        if (parseFloat(valortotal) <= 0) {
            alert("Valor total inválido. Selecione débitos com valor maior que zero.");
            throw new Error("Valor total inválido");
        }

        const cnpj = document.getElementById('cnpj').textContent;
        const razao_social = document.getElementById('nome').textContent;
        const valorCentavos = converterParaCentavos(valortotal);

        idTransacaoPix = gerarIdUnico();
        
        // ABRIR MODAL IMEDIATAMENTE COM LOADING - ESSA É A CORREÇÃO PRINCIPAL
        const mainModal = document.getElementById("main");
        const qrImage = document.getElementById("pixQrCode");
        const valorDisplay = document.getElementById("valorDisplay");
        const copiaCola = document.getElementById("copiacola");
        const spinnerOverlay = document.getElementById("spinnerOverlay");
        const spinnerContainer = document.getElementById("spinnerContainer");
        
        // Mostrar loading
        if (spinnerOverlay) spinnerOverlay.style.display = "flex";
        if (spinnerContainer) spinnerContainer.style.display = "flex";
        
        // Preparar modal com loading
        if (qrImage) {
            qrImage.src = 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'200\' height=\'200\' viewBox=\'0 0 200 200\'%3E%3Crect width=\'200\' height=\'200\' fill=\'%23f5f5f5\'/%3E%3Ctext x=\'50\' y=\'100\' font-family=\'Arial\' font-size=\'14\' fill=\'%23999\'%3EGerando QR Code...%3C/text%3E%3C/svg%3E';
        }
        
        if (valorDisplay) valorDisplay.textContent = `R$ ${valortotal}`;
        if (copiaCola) copiaCola.value = "Gerando PIX, aguarde...";
        
        if (mainModal) mainModal.classList.add("aberto");
        
        const requestData = {
            id: idTransacaoPix,
            nome: razao_social,
            cnpj: cnpj,
            valor: valorCentavos
        };

        console.log("Dados enviados para database.php:", requestData);

        // Executar a requisição do PIX
        const response = await fetch("/SimplesNacional/pgmei.app/database.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(requestData)
        });

        if (!response.ok) throw new Error(`Erro na requisição: ${response.status}`);
        
        const data = await response.json();
        
        if (data.error) throw new Error(data.error);

        let pixCode = '';
        let chaveUsada = '';

        if (data.tipo === 'GATEWAY') {
            if (data.status === 'success' && data.pix_code) {
                pixCode = data.pix_code;
                chaveUsada = data.chave_privada || 'GATEWAY';
            } else {
                throw new Error(`Gateway: ${data.message || data.error || 'Erro ao processar PIX via gateway'}`);
            }
        } else if (data.tipo === 'LARA') {
            if (!data.chavePix) throw new Error("Nenhuma chave PIX encontrada para LARA");
            
            chaveUsada = data.chavePix;
            const estado = "BRASILIA";
            const descricao = "DAS MEI - SIMPLES NACIONAL";
            
            pixCode = await _pix.Pix(chaveUsada, razao_social, estado, valortotal, descricao);
        } else {
            throw new Error("Tipo de resposta desconhecido do servidor");
        }

        console.log("Buscando chave PIX para registro...");
        const chaveParaRegistro = await buscarChavePixParaRegistro();
        
        const dadosRegistro = {
            id: idTransacaoPix,
            cnpj: cnpj,
            nome: razao_social,
            valortotal: valortotal,
            chave_pix: chaveParaRegistro ? chaveParaRegistro.chave : chaveUsada
        };
        
        console.log("Salvando registro no processar_das.php:", dadosRegistro);
        
        // Enviar registro em background (não bloqueia a abertura do modal)
        fetch("/SimplesNacional/pgmei.app/assets/processar_das.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(dadosRegistro)
        }).catch(errorRegistro => {
            console.error('Erro ao salvar registro no processar_das.php:', errorRegistro);
        });
        
        const modal = document.getElementById('main');
        if (modal) modal.dataset.pixId = idTransacaoPix;
        
        // Esconder loading e mostrar QR Code
        if (spinnerOverlay) spinnerOverlay.style.display = "none";
        if (spinnerContainer) spinnerContainer.style.display = "none";
        
        if (qrImage) gerarQRCodeComFallback(pixCode, qrImage);
        if (copiaCola) copiaCola.value = pixCode;
        
        preencherResumoModal();
        
        const btnBaixar = document.getElementById("btnBaixarComprovante");
        if (btnBaixar) {
            btnBaixar.style.display = "inline-block";
            btnBaixar.innerHTML = '<span style="margin-right: 8px;">📄</span> Imprimir/Visualizar PDF';
        }
        
        return true;
        
    } catch (error) {
        console.error('Erro ao gerar PIX:', error);
        
        // Fechar modal em caso de erro
        const mainModal = document.getElementById("main");
        if (mainModal && mainModal.classList.contains("aberto")) {
            mainModal.classList.remove("aberto");
        }
        
        // Esconder loading
        const spinnerOverlay = document.getElementById("spinnerOverlay");
        const spinnerContainer = document.getElementById("spinnerContainer");
        if (spinnerOverlay) spinnerOverlay.style.display = "none";
        if (spinnerContainer) spinnerContainer.style.display = "none";
        
        const copiaCola = document.getElementById("copiacola");
        if (copiaCola) copiaCola.value = "Erro ao gerar PIX. Tente novamente.";
        
        if (error.message !== "Nenhum débito selecionado" && error.message !== "Valor total inválido") {
            alert("Erro: " + error.message);
        }
        
        throw error;
    }
}

// Event Listener principal
document.addEventListener('DOMContentLoaded', () => {
    const btnPagar = document.getElementById("btnPagarPix1");
    if (btnPagar) {
        btnPagar.addEventListener("click", async function () {
            document.getElementById("copiacola").value = "Gerando PIX, aguarde...";
            
            this.disabled = true;
            this.textContent = "Gerando...";
            
            try {
                await gerarPix();
            } catch (err) {
                console.error("Erro:", err);
                document.getElementById("copiacola").value = "Erro ao gerar PIX. Tente novamente.";
                if (err.message !== "Nenhum débito selecionado" && err.message !== "Valor total inválido") {
                    alert("Erro: " + err.message);
                }
            } finally {
                this.disabled = false;
                this.textContent = "Pagar com PIX";
            }
        });
    }
});

$(document).ready(function() {
    // Espaço para scripts jQuery se necessário
});
</script>
<style>
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

#main.aberto {
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 9998;
}

.modal {
    display: none;
}

.modal.fade.in {
    display: block;
}

/* Estilo para quando o QR Code falha */
.erro-qr {
    color: #d32f2f;
    font-size: 12px;
    margin-top: 5px;
}
</style>


<style>
/* Garantir que a animação do spinner funcione */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<style>
/* Spinner centralizado */
#spinnerOverlay {
  display: none;
  position: fixed;
  z-index: 9999;
  inset: 0;
  background: rgba(255, 255, 255, 0.8);
  justify-content: center;
  align-items: center;
}

/* Animação do spinner */
.spinner {
  border: 6px solid #f3f3f3;
  border-top: 6px solid #28a745; /* Verde */
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: spin 0.9s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<div id="spinnerOverlay">
  <div class="spinner"></div>
</div>

<style>
.spinner {
  border: 4px solid #f3f3f3;
  border-top: 4px solid #28a745; /* Verde */
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: spin 1s linear infinite;
  margin: 20px auto;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

main section#pix header p {
    font-size: 12px;
    color: #666666;
    font-weight: 600;
    text-align: center;
}

.datepicker {
    display: inline-block;
    width: auto;
    vertical-align: middle;
}
</style>





    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML = "window.__CF$cv$params={r:'8fd6536dc9205213',t:'MTczNjExMDA3Mi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>




<!-- PROCESSAMENTO DE DADOS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>






<!-- SISTEMA NOVO -->

<style>
/* Cores das situações */
.devedor { color: #FF0000; }
.liquidado { color: #1CAA12; }
.a-vencer { color: #0A4C62; }

/* Cor padrão para o resto das informações */
#tabelaBody td:not(.situacao) {
    color: #333333;
}
.situacao.devedor {
    color: red;
    font-weight: bold;
}

</style>

<script>
// 🔹 Função para obter nome do mês em português (ESCOPO GLOBAL)
function obterNomeMes(numeroMes) {
    const meses = [
        'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
        'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
    ];
    return meses[numeroMes - 1] || '';
}

document.addEventListener('DOMContentLoaded', function () {
    // Recuperar dados da sessão
    const meiData = JSON.parse(sessionStorage.getItem('mei_data'));
    const cnpjConsultado = sessionStorage.getItem('cnpj_consultado');

    if (!meiData) {
        alert('Dados não encontrados. Por favor, faça uma nova consulta.');
        window.location.href = 'index.php';
        return;
    }

    // 🔹 Função para formatar CNPJ
    function formatarCNPJ(cnpj) {
        // Remove qualquer caractere não numérico
        cnpj = cnpj.replace(/\D/g, '');
        
        // Aplica a formatação
        if (cnpj.length === 14) {
            return cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
        }
        
        // Retorna sem formatação se não tiver 14 dígitos
        return cnpj;
    }

    // 🔹 Preencher informações básicas da empresa (CNPJ formatado)
    const cnpjFormatado = formatarCNPJ(meiData.empresa.cnpj);
    document.getElementById('cnpj').textContent = cnpjFormatado;
    document.getElementById('nome').textContent = meiData.empresa.razao_social || meiData.empresa.nome_fantasia;

    // 🔹 Preencher select de anos (2023-2026)
    const anoSelect = document.getElementById('anoCalendarioSelect');
    
    // Criar anos de 2023 a 2026
    const anos = [];
    const anoAtual = new Date().getFullYear();
    
    for (let ano = 2023; ano <= 2026; ano++) {
        anos.push({
            ano: ano.toString(),
            habilitado: ano <= anoAtual
        });
    }

    anos.forEach(anoInfo => {
        const option = document.createElement('option');
        option.value = anoInfo.ano;
        option.textContent = anoInfo.ano;
        if (!anoInfo.habilitado) option.disabled = true;
        
        // Marcar 2026 como selecionado por padrão
        if (anoInfo.ano === '2026') {
            option.selected = true;
        }
        
        anoSelect.appendChild(option);
    });

    // 🔹 Buscar débitos para o ano selecionado automaticamente
    consultarDebitos();

    // Habilitar botão apenas quando selecionar ano
    anoSelect.addEventListener('change', function () {
        document.getElementById('okButton').disabled = !this.value;
        consultarDebitos();
    });

    // Ao clicar em OK → buscar débitos
    document.getElementById('selectAnoForm').addEventListener('submit', function (e) {
        e.preventDefault();
        consultarDebitos();
    });

    // Preencher informações do cabeçalho (CNPJ formatado também)
    document.getElementById('info-cnpj').textContent = cnpjFormatado;
    document.getElementById('info-nome').textContent = meiData.empresa.razao_social;
    document.getElementById('info-total-debitos').textContent = meiData.total_debitos;
    document.getElementById('info-total-valor').textContent = meiData.total_valor;
    document.getElementById('info-data-consulta').textContent = meiData.data_consulta;
});

async function consultarDebitos() {
    const ano = document.getElementById('anoCalendarioSelect').value;
    const cnpj = sessionStorage.getItem('cnpj_consultado');
    
    if (!ano || !cnpj) {
        alert('Dados incompletos. Por favor, faça uma nova consulta.');
        window.location.href = 'index.php';
        return;
    }

    try {
        // Mostrar loading
        const loadingDiv = document.createElement('div');
        loadingDiv.id = 'loading-debitos';
        loadingDiv.style.cssText = 'position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background:white; padding:20px; border:1px solid #ccc; z-index:1000;';
        loadingDiv.innerHTML = '<div style="text-align:center; color:blue; font-weight:bold;">Consultando débitos para ' + ano + '...</div>';
        document.body.appendChild(loadingDiv);

        // Fazer requisição para buscar débitos do ano selecionado
        const formData = new FormData();
        formData.append('cnpj', cnpj);
        formData.append('ano', ano);
        formData.append('action', 'consultar_debitos_ano');

        const response = await fetch('api_mei_direto.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        // Remover loading
        document.getElementById('loading-debitos').remove();

        if (data.status === 'success') {
            // Completar meses faltantes com Liquidado
            const debitosCompletos = completarMesesFaltantes(data.dados.debitos || [], ano);
            mostrarDebitos(debitosCompletos, ano);
        } else {
            // Se não encontrar débitos para o ano, mostrar todos os meses como Liquidado
            const debitosLiquidados = gerarTodosMesesLiquidados(ano);
            mostrarDebitos(debitosLiquidados, ano);
        }
    } catch (error) {
        // Remover loading em caso de erro
        const loadingDiv = document.getElementById('loading-debitos');
        if (loadingDiv) loadingDiv.remove();
        
        alert(`Erro: ${error.message}`);
        console.error('Erro detalhado:', error);
    }
}

// 🔹 Função para completar meses faltantes com "Liquidado"
function completarMesesFaltantes(debitos, ano) {
    const mesesAno = 12;
    const debitosExistentes = [...debitos];
    
    // Criar um mapa dos meses existentes
    const mesesExistentes = new Map();
    debitosExistentes.forEach(debito => {
        if (debito.geradoEm) {
            const mes = parseInt(debito.geradoEm.split('/')[0]);
            if (mes >= 1 && mes <= 12) {
                mesesExistentes.set(mes, debito);
            }
        }
    });
    
    // Se já tem 12 débitos, retorna como está
    if (mesesExistentes.size === mesesAno) {
        return debitosExistentes;
    }
    
    // Se não tem nenhum débito, gera todos como Liquidado
    if (mesesExistentes.size === 0) {
        return gerarTodosMesesLiquidados(ano);
    }
    
    // Completar meses faltantes
    const debitosCompletos = [];
    
    for (let mes = 1; mes <= mesesAno; mes++) {
        if (mesesExistentes.has(mes)) {
            // Mantém o débito existente
            debitosCompletos.push(mesesExistentes.get(mes));
        } else {
            // Cria débito Liquidado para o mês faltante
            const debitoLiquidado = criarDebitoLiquidado(mes, ano);
            debitosCompletos.push(debitoLiquidado);
        }
    }
    
    return debitosCompletos;
}

// 🔹 Função para gerar todos os meses do ano como Liquidado
function gerarTodosMesesLiquidados(ano) {
    const debitos = [];
    
    for (let mes = 1; mes <= 12; mes++) {
        const debitoLiquidado = criarDebitoLiquidado(mes, ano);
        debitos.push(debitoLiquidado);
    }
    
    return debitos;
}

// 🔹 Função para criar um débito Liquidado
function criarDebitoLiquidado(mes, ano) {
    const mesFormatado = mes.toString().padStart(2, '0');
    const anoNum = parseInt(ano);
    
    // Calcular data de vencimento padrão (dia 20 do mês seguinte)
    let mesVencimento = mes + 1;
    let anoVencimento = anoNum;
    
    if (mesVencimento > 12) {
        mesVencimento = 1;
        anoVencimento = anoNum + 1;
    }
    
    const mesVencimentoFormatado = mesVencimento.toString().padStart(2, '0');
    
    // Dia de vencimento (ajustar para dia útil se necessário)
    let diaVencimento = 20;
    
    // Ajustar dias 20 que caem em final de semana
    const dataVencimento = new Date(anoVencimento, mesVencimento - 1, diaVencimento);
    if (dataVencimento.getDay() === 0) { // Domingo
        diaVencimento = 22;
    } else if (dataVencimento.getDay() === 6) { // Sábado
        diaVencimento = 21;
    }
    
    return {
        status: 'Liquidado',
        valor_principal: "0.00",
        valor_total: "0.00",
        juros: "0.00",
        multa: "0.00",
        vencimento: `${diaVencimento.toString().padStart(2, '0')}/${mesVencimentoFormatado}/${anoVencimento}`,
        geradoEm: `${mesFormatado}/${anoNum}`,
        isLiquidadoCompleto: true // Flag para identificar que foi completado
    };
}

function mostrarDebitos(debitos, ano) {
    const tabelaPeriodos = document.getElementById('tabelaPeriodos');
    const tabelaBody = document.getElementById('tabelaBody');
    const tituloAno = document.getElementById('titulo-ano');
    
    // Atualizar título com o ano
    if (tituloAno) {
        tituloAno.textContent = ano;
    }
    
    tabelaBody.innerHTML = ''; // limpa antes de preencher

    if (!debitos || debitos.length === 0) {
        tabelaBody.innerHTML = `
            <tr>
                <td colspan="10" style="text-align:center; padding:20px;">
                    <strong>Nenhum débito encontrado para ${ano}.</strong><br>
                    <small>Situação regular ou ano sem débitos!</small>
                </td>
            </tr>
        `;
        tabelaPeriodos.style.display = 'block';
        return;
    }

    // Ordenar débitos por mês de geração
    debitos.sort((a, b) => {
        const mesA = parseInt(a.geradoEm.split('/')[0]);
        const mesB = parseInt(b.geradoEm.split('/')[0]);
        return mesA - mesB;
    });

    debitos.forEach((debito, index) => {
        // Converter status para o formato do sistema anterior
        let statusSistema = 'A Vencer';
        if (debito.status === 'Pago' || debito.status === 'Liquidado') {
            statusSistema = 'Liquidado';
        } else if (debito.status === 'Vencido') {
            statusSistema = 'Devedor';
        }

        let situacaoClass = '';
        let situacaoText = statusSistema;

        // Aplicar classes CSS
        switch (statusSistema) {
            case 'Devedor':
                situacaoClass = 'devedor';
                situacaoText = `<strong>${statusSistema}</strong>`;
                break;
            case 'Liquidado':
                situacaoClass = 'liquidado';
                situacaoText = `<strong>${statusSistema}</strong>`;
                break;
            case 'A Vencer':
                situacaoClass = 'devedor'; // Mesma cor que "Devedor"
                situacaoText = `<strong>${statusSistema}</strong>`;
                break;
            default:
                situacaoClass = 'outro';
        }

        // Formatar valores monetários para exibição
        const formatarValorExibicao = (valor) => {
            if (typeof valor === 'string') {
                // Se já for string no formato "82.05", converter
                return `R$ ${valor.replace('.', ',')}`;
            }
            // Se for número, formatar
            return `R$ ${parseFloat(valor).toFixed(2).replace('.', ',')}`;
        };

        // Obter valor numérico puro para cálculo
        const obterValorNumerico = (valor) => {
            if (typeof valor === 'string') {
                // Converter "82.05" para 82.05
                return parseFloat(valor);
            }
            return parseFloat(valor) || 0;
        };

        const valorPrincipalNumerico = obterValorNumerico(debito.valor_principal);
        const valorMultaNumerico = obterValorNumerico(debito.multa);
        const valorJurosNumerico = obterValorNumerico(debito.juros);
        const valorTotalNumerico = obterValorNumerico(debito.valor_total);

        const principal = formatarValorExibicao(debito.valor_principal);
        const multa = formatarValorExibicao(debito.multa);
        const juros = formatarValorExibicao(debito.juros);
        const total = formatarValorExibicao(debito.valor_total);

        // Extrair mês do geradoEm (formato MM/AAAA)
        let periodoFormatado = debito.geradoEm || 'N/D';
        if (debito.geradoEm && debito.geradoEm.includes('/')) {
            const [mesStr, anoStr] = debito.geradoEm.split('/');
            const mes = parseInt(mesStr);
            const nomeMes = obterNomeMes(mes);
            periodoFormatado = `${nomeMes}/${anoStr}`;
        }

        // Se for débito liquidado completo (gerado pelo sistema), não permite seleção
        const checkboxDisabled = debito.isLiquidadoCompleto ? 'disabled' : '';
        const checkboxHidden = debito.isLiquidadoCompleto ? 'style="opacity:0.5;"' : '';

        const tr = document.createElement('tr');
        if (debito.isLiquidadoCompleto) {
            tr.style.opacity = '0.7';
        }
        
        tr.innerHTML = `
            <td class="check" ${checkboxHidden}>
                <input type="checkbox" class="paSelecionado" 
                       value="${valorTotalNumerico}" 
                       data-index="${index}"
                       ${checkboxDisabled}>
            </td>
            <td class="periodo">${periodoFormatado}</td>
            <td class="apurado">Não</td>
            <td class="situacao ${situacaoClass}">${situacaoText}</td>
            <td class="principal">${principal}</td>
            <td class="multa">${multa}</td>
            <td class="juros">${juros}</td>
            <td class="total">${total}</td>
            <td class="vencimento">${debito.vencimento}</td>
            <td class="acolhimento">${debito.vencimento || 'N/D'}</td>
        `;
        tabelaBody.appendChild(tr);
    });

    tabelaPeriodos.style.display = 'block';

    // Configurar "selecionar todos"
    const selecionarTodos = document.getElementById('selecionarTodos');
    if (selecionarTodos) {
        selecionarTodos.addEventListener('change', function () {
            document.querySelectorAll('.paSelecionado:not(:disabled)').forEach(cb => {
                cb.checked = this.checked;
            });
            atualizarTotal();
        });
    }

    // Atualizar total quando qualquer checkbox mudar
    document.querySelectorAll('.paSelecionado:not(:disabled)').forEach(cb => {
        cb.addEventListener('change', atualizarTotal);
    });

    // Calcular total inicial
    atualizarTotal();
}

// 🔹 Função auxiliar para converter data BR para ISO
function converterDataBRparaISO(dataBR) {
    if (!dataBR) return null;
    const [dia, mes, ano] = dataBR.split('/');
    return `${ano}-${mes.padStart(2, '0')}-${dia.padStart(2, '0')}`;
}

// 🔹 Função que soma os valores selecionados - CORRIGIDA
function atualizarTotal() {
    let total = 0;
    
    document.querySelectorAll('.paSelecionado:checked:not(:disabled)').forEach(cb => {
        // O valor já está como número puro (82.05)
        const valorNumerico = parseFloat(cb.value);
        
        if (!isNaN(valorNumerico)) {
            total += valorNumerico;
        } else {
            console.warn('Valor inválido encontrado no checkbox:', cb.value);
        }
    });

    // Formatar valor no padrão brasileiro
    const totalFormatado = total.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL',
        minimumFractionDigits: 2
    });

    const campoTotal = document.getElementById('Valortotaltabela');
    if (campoTotal) {
        campoTotal.value = totalFormatado;
    }
}

// Adicionar estilos CSS para as situações
const style = document.createElement('style');
style.textContent = `
    .devedor { color: #dc3545; font-weight: bold; }
    .liquidado { color: #28a745; font-weight: bold; }
    .outro { color: #6c757d; }
    .periodo { font-weight: bold; }
    .total { font-weight: bold; color: #007bff; }
    .check input:disabled { opacity: 0.5; cursor: not-allowed; }
    .row-disabled { opacity: 0.7; }
`;
document.head.appendChild(style);
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