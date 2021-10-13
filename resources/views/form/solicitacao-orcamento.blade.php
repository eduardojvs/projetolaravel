@extends('layouts.master')

@section('title') Solicitação de Orçamento @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('/libs/bs-stepper/css/bs-stepper.min.css')}}" rel="stylesheet" />
@endsection

@section('customCss')
    <style>
        .bs-stepper-header {
            overflow-x: auto;
        }
        .switch-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        input[switch] {
            display: inherit;
            position: absolute;
            opacity: 0;
        }
        input[switch]:focus ~ label {
            box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
        }
        .desastre-container label {
            margin-right: 10px;
        }
        #freqDesastre {
            width: 100px;
        }
        .form-inline.inline-spaced {
            justify-content: space-between;
        }
        .form-control:disabled {
            background-color: #e9ecef;
        }
        .switch {
            display: flex;
            align-items: center;
            justify-content: center;
            height: calc(1.5em + 0.75rem + 2px);
        }
        .check-list {
            justify-content: space-between;
        }
        .input-height {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(1.5em + 0.75rem + 2px);
        }
        .check-control ~ input.form-control,
        .check-input .form-control {
            margin-left: .75rem;
            width: 100px;
        }
        .ponteRolante .title {
            margin-left: .75em;
        }
        .renovAr-container {
            position: relative;
        }
        #renovacoesAr {
            padding-right: 2em;
        }
        #renovacoesAr ~ .perHour {
            position: absolute;
            right: 0.5em;
        }
        #renovacoesAr ~ .perHour::after {
            content: "/h";
        }
        .check-group {
            border: 1px #5b626b solid;
        }
        .check-group > .title {
            display: block;
            padding: .25rem;
            background-color: #5b626b;
            color: #ffffff;
        }
        .check-group-content {
            padding:  0 .5rem .5rem;
        }
        #stepperForm .was-validated .form-control:valid, #stepperForm .form-control.is-valid {
            color: inherit;
            border-color: #ced4da;
            padding-right: inherit;
            background-image: none;
        }
        #stepperForm .was-validated .form-check-input:valid ~ .form-check-label, #stepperForm .form-check-input.is-valid ~ .form-check-label {
            color: inherit;
        }
        #stepperForm .was-validated .form-control:valid:focus, #stepperForm .form-control.is-valid:focus {
            border-color: inherit;
            box-shadow: none;
        }
        #observ {
            min-height: 150px;
        }
        .autoCompleteContainer {
            position: relative;
        }
    </style>
@endsection

@section('content')
  <!-- start page title -->
                    <div class="row">
               @component('common-components.breadcrumb')
                     @slot('title') Solicitação de Orçamento  @endslot
                     @slot('li1') JVS  @endslot
                     @slot('li2') Forms  @endslot
                     @slot('li3') Solicitação de Orçamento @endslot
                @endcomponent
<!--
                @component('common-components.chart')
                     @slot('chart1_id') header-chart-1  @endslot
                     @slot('chart1_title') Balance $ 2,317  @endslot
                     @slot('chart2_id') header-chart-2  @endslot
                     @slot('chart3_title') Item Sold 1230  @endslot
                @endcomponent
-->

                    </div>
                    <!-- end page title -->
                    <div id="stepperForm" class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#dadosGeraisForm">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger1" aria-controls="dadosGeraisForm">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Dados Gerais</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#dadosObraForm">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger2" aria-controls="dadosObraForm">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Dados da Obra</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#observForm">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger3" aria-controls="observForm">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Observações</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form class="needs-validation" onSubmit="return false" novalidate>
                                <div id="dadosGeraisForm" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger1">
                                    <div class="card">
                                        <div class="card-body">

                                            <h4 class="card-title">Dados Gerais</h4>
                                            <p class="card-title-desc">Informações básicas da Obra</p>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Nome da Obra</label>
                                                        <input type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group autoCompleteContainer">
                                                        <label>Cliente</label>
                                                        <input class="form-control basicAutoComplete" type="text" autocomplete="off" required>
                                                        <!--input type="text" class="form-control" required-->
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Empresa Solicitante</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Local da Obra</label>
                                                        <input type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title">Modalidade de Contratação</label>
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                                <option>Preço Global</option>
                                                                <option>Preço Unitário</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title">Tipo de Orçamento</label>
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                                <option>Estimativa</option>
                                                                <option>Detalhado</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title">ISS a ser praticado</label>
                                                            <input class="form-control" id="iss" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title" for="solicitConstru">ICMS a ser praticado</label>
                                                            <input class="form-control" id="icms" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title" for="solicitConstru">Solicitante é Construtora</label>
                                                            <div class="switch">
                                                                <input type="checkbox" id="solicitConstru" switch="info" />
                                                                <label for="solicitConstru" data-on-label="Sim" data-off-label="Não"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title" for="faturaCliFin">Faturar direto ao Cliente Final</label>
                                                            <div class="switch">
                                                                <input type="checkbox" id="faturaCliFin" switch="info" />
                                                                <label for="faturaCliFin" data-on-label="Sim" data-off-label="Não"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title" for="desastresNat">Ocorrem Desastres Naturais</label>
                                                            <div class="switch">
                                                                <input type="checkbox" id="desastresNat" switch="info" />
                                                                <label for="desastresNat" data-on-label="Sim" data-off-label="Não"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-between desastre-container">
                                                        <div class="col-lg-auto form-group">
                                                            <div class="form-inline row no-gutters justify-content-between">
                                                                <label for="freqDesastre">Frequência</label>
                                                                <input type="text" class="form-control" id="freqDesastre">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-auto form-group">
                                                            <div class="form-inline row no-gutters justify-content-between">
                                                                <label for="freqDesastre">Tipo de Desastre</label>
                                                                <input type="text" class="form-control" id="tipoDesastre">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Material Enviado para Levantamento de Quantitativos e Orçamento</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Projeto Arquitetônico</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                <label class="form-check-label" for="inlineCheckbox2">Croqui</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox3">Seguir Arquitetônico</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox4">Propor Melhor Solução</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option3">
                                                                <label class="form-check-label" for="inlineCheckbox5">Projeto Estrutural </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title" for="necessitaLayout">Existe necessidade de Layout</label>
                                                            <div class="switch">
                                                                <input type="checkbox" id="necessitaLayout" switch="info" />
                                                                <label for="necessitaLayout" data-on-label="Sim" data-off-label="Não"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title" for="considPesosCli">Considerar Pesos Cliente</label>
                                                            <div class="switch">
                                                                <input type="checkbox" id="considPesosCli" switch="info" />
                                                                <label for="considPesosCli" data-on-label="Sim" data-off-label="Não"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary btn-next-form">Próximo</button>
                                    </div>
                                </div>
                                <div id="dadosObraForm" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger2">
                                    <div class="card">
                                        <div class="card-body">

                                            <h4 class="card-title">Dados da Obra</h4>
                                            <p class="card-title-desc">Detalhamento da obra</p>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title">Largura</label>
                                                            <input class="form-control" id="largura" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title">Comprimento</label>
                                                            <input class="form-control" id="comprimento" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title">Pé Direito</label>
                                                            <input class="form-control" id="peDireito" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-inline row justify-content-between">
                                                        <div class="col-sm-auto">
                                                            <label class="title">Fundação</label>
                                                        </div>
                                                        <div class="col-sm-auto form-group input-height">
                                                            <div class="form-inline">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="fundBlocos" value="option1">
                                                                    <label class="form-check-label" for="fundBlocos">Blocos</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="fundSapatas" value="option2">
                                                                    <label class="form-check-label" for="fundSapatas">Sapatas</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="fundCliente" value="option3">
                                                                    <label class="form-check-label" for="fundCliente">Pelo Cliente</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title" for="sondagem">Sondagem</label>
                                                            <div class="switch">
                                                                <input type="checkbox" id="sondagem" switch="info" />
                                                                <label for="sondagem" data-on-label="Sim" data-off-label="Não"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-inline inline-spaced">
                                                            <label class="title" for="fotosTerreno">Fotos do Terreno</label>
                                                            <div class="switch">
                                                                <input type="checkbox" id="fotosTerreno" switch="info" />
                                                                <label for="fotosTerreno" data-on-label="Sim" data-off-label="Não"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Torre Cx. D'Água</label>
                                                        <div class="check-group-content">
                                                            <div class="form-inline inline-spaced">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="chkAltBaseCaixa" value="option1" data-control="#altBaseCaixa">
                                                                    <label class="form-check-label" for="chkAltBaseCaixa">Altura da Base</label>
                                                                </div>
                                                                <input class="form-control" type="text" name="altBaseCaixa" id="altBaseCaixa" />
                                                            </div>
                                                            <div class="form-inline inline-spaced">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="chkCapacidadeCaixa" value="option1" data-control="#capacidadeCaixa">
                                                                    <label class="form-check-label" for="chkCapacidadeCaixa">Capacidade</label>
                                                                </div>
                                                                <input class="form-control" type="text" name="capacidadeCaixa" id="capacidadeCaixa" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-inline row justify-content-between">
                                                        <div class="col-sm-auto">
                                                            <label class="title">Tipo de Estaqueamento</label>
                                                        </div>
                                                        <div class="col-sm-auto form-group input-height">
                                                            <div class="form-inline">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="estaqPreMold" value="option1">
                                                                    <label class="form-check-label" for="estaqPreMold">Pré-Moldado</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="estaqHelice" value="option2">
                                                                    <label class="form-check-label" for="estaqHelice">Hélice</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="estaqOutro" value="option3">
                                                                    <label class="form-check-label" for="estaqOutro">Outro</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Pilares</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="pilarMetalico" value="option1">
                                                                <label class="form-check-label" for="pilarMetalico">Pilares Metálicos</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="pilarConcreto" value="option2">
                                                                <label class="form-check-label" for="pilarConcreto">Pilares Concreto</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="pilarDescPluvEmbut" value="option3">
                                                                <label class="form-check-label" for="pilarDescPluvEmbut">Descidas Pluvial Embutidas nos Pilares</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="pilarDescPluvExt" value="option3">
                                                                <label class="form-check-label" for="pilarDescPluvExt">Descida Pluvial Externa</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="pilarAterrVerg" value="option3">
                                                                <label class="form-check-label" for="pilarAterrVerg">Aterramento Vergalhão</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Vigas</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="vigaBaldrame" value="option1">
                                                                <label class="form-check-label" for="vigaBaldrame">Baldrames</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="vigaIntermed" value="option2">
                                                                <label class="form-check-label" for="vigaIntermed">Intermediárias</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="vigaCoroamento" value="option3">
                                                                <label class="form-check-label" for="vigaCoroamento">Coroamento</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="vigaOitao" value="option3">
                                                                <label class="form-check-label" for="vigaOitao">Oitão</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="vigaCalha" value="option3">
                                                                <label class="form-check-label" for="vigaCalha">Viga Calha</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="vigaTransicao" value="option3">
                                                                <label class="form-check-label" for="vigaTransicao">Viga de Transição</label>
                                                            </div>
                                                            <div class="form-inline inline-spaced check-input">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="vigaPonteRol" value="option3" data-control="#ponteRolTon,#ponteRolHBase">
                                                                    <label class="form-check-label" for="vigaPonteRol">Viga Ponte Rolante</label>
                                                                </div>
                                                                <div class="form-inline ponteRolante">
                                                                    <label class="title" for="ponteRolTon">TON</label>
                                                                    <input type="text" id="ponteRolTon" class="form-control controled-input" />
                                                                    <label class="title" for="ponteRolTon">H.Base</label>
                                                                    <input type="text" id="ponteRolHBase" class="form-control controled-input" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Estrutura Fechamento</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="fechamPreMold" value="option1">
                                                                <label class="form-check-label" for="fechamPreMold">Placas Pre-Moldadas</label>
                                                            </div>
                                                            <div class="form-inline inline-spaced check-input">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="fechamMetalico" value="option3" data-control="#fechamMetAltura">
                                                                    <label class="form-check-label" for="fechamMetalico">Metálico</label>
                                                                </div>
                                                                <div class="form-inline">
                                                                    <label class="title sup-field" for="fechamMetAltura">A Partir de qual altura</label>
                                                                    <input type="text" id="fechamMetAltura" class="form-control controled-input" />
                                                                </div>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="fechamAlvenaria" value="option3">
                                                                <label class="form-check-label" for="fechamAlvenaria">Alvenaria</label>
                                                            </div>
                                                            <div class="form-inline inline-spaced check-input">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="cortinas" value="option3" data-control="#cortinasAltura">
                                                                    <label class="form-check-label" for="cortinas">Cortinas</label>
                                                                </div>
                                                                <div class="form-inline">
                                                                    <label class="title sup-field" for="cortinasAltura">Altura</label>
                                                                    <input type="text" id="cortinasAltura" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Estrutura de Cobertura</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="estCobConcreto" value="option1">
                                                                <label class="form-check-label" for="estCobConcreto">Concreto</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="estCobMetalica" value="option2">
                                                                <label class="form-check-label" for="estCobMetalica">Metálica</label>
                                                            </div>
                                                            <div class="form-inline inline-spaced check-input">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="estCobSobrecargCob" value="option3" data-control="#sobrecargaCob">
                                                                    <label class="form-check-label" for="estCobSobrecargCob">Sobrecarga da Cobertura</label>
                                                                </div>
                                                                <div class="form-inline">
                                                                    <input type="text" id="sobrecargaCob" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="estCobAlmaCheia" value="option3">
                                                                <label class="form-check-label" for="estCobAlmaCheia">Alma Cheia</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="estCobAtirantado" value="option3">
                                                                <label class="form-check-label" for="estCobAtirantado">Atirantado</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="estCobVigaIConcreto" value="option3">
                                                                <label class="form-check-label" for="estCobVigaIConcreto">Viga I Concreto</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="estCobTrelicado" value="option3">
                                                                <label class="form-check-label" for="estCobTrelicado">Treliçado</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="estCobPerfilI" value="option3">
                                                                <label class="form-check-label" for="estCobPerfilI">Perfil I</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Tipo de Cobretura</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="tipCobPlatibanda" value="option1">
                                                                <label class="form-check-label" for="tipCobPlatibanda">Platibanda</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="tipCobBeiral" value="option2">
                                                                <label class="form-check-label" for="tipCobBeiral">Beiral</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Mezanino/Lajes</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="mezaLajeConcreto" value="option1">
                                                                <label class="form-check-label" for="mezaLajeConcreto">Mezanino Concreto</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="mezaLajeMetalico" value="option2">
                                                                <label class="form-check-label" for="mezaLajeMetalico">Mezanino Metálico</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="mezaLajeAlveolar" value="option3">
                                                                <label class="form-check-label" for="mezaLajeAlveolar">Laje Alveolar</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="mezaLajePii" value="option3">
                                                                <label class="form-check-label" for="mezaLajePii">Laje PII</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="mezaLajeSteelDeck" value="option3">
                                                                <label class="form-check-label" for="mezaLajeSteelDeck">Steel Deck</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="mezaLajeCliente" value="option3">
                                                                <label class="form-check-label" for="mezaLajeCliente">Pelo Cliente</label>
                                                            </div>
                                                            <div class="form-inline inline-spaced check-input">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="mezaLajeSobrecarga" value="option3" data-control="#mexLajSobreValor">
                                                                    <label class="form-check-label" for="mezaLajeSobrecarga">Sobrecarga</label>
                                                                </div>
                                                                <div class="form-inline">
                                                                    <input type="text" id="mexLajSobreValor" class="form-control controled-input" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group check-group">
                                                        <label class="title">Terças</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="tercasConcreto" value="option1">
                                                                <label class="form-check-label" for="tercasConcreto">Concreto</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="tercasMetalica" value="option2">
                                                                <label class="form-check-label" for="tercasMetalica">Metálica</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Telhas de Cobertura</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaCobZipada" value="option1">
                                                                <label class="form-check-label" for="telhaCobZipada">Zipada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaCobTp100" value="option2">
                                                                <label class="form-check-label" for="telhaCobTp100">TP100</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaCobTp40" value="option3">
                                                                <label class="form-check-label" for="telhaCobTp40">TP40</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaCobNatural" value="option3">
                                                                <label class="form-check-label" for="telhaCobNatural">Natural</label>
                                                            </div>
                                                            <div class="form-inline inline-spaced check-input">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="telhaCobPrePint" value="option3" data-control="#telCobPrePintRal">
                                                                    <label class="form-check-label" for="telhaCobPrePint">Pré-pintada</label>
                                                                </div>
                                                                <div class="form-inline">
                                                                    <label class="title sup-field" for="telCobPrePintRal">RAL</label>
                                                                    <input type="text" id="telCobPrePintRal" class="form-control controled-input" />
                                                                </div>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaCobEps" value="option3">
                                                                <label class="form-check-label" for="telhaCobEps">EPS</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaCobFacefelt" value="option3">
                                                                <label class="form-check-label" for="telhaCobFacefelt">Facefelt</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaCobSanduiche" value="option3">
                                                                <label class="form-check-label" for="telhaCobSanduiche">Sanduíche</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaCobFibrocimento" value="option3">
                                                                <label class="form-check-label" for="telhaCobFibrocimento">Fibrocimento</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaCobFibrocimento" value="option3">
                                                                <label class="form-check-label" for="telhaCobFibrocimento">Fibrocimento</label>
                                                            </div>
                                                            <div class="form-inline inline-spaced check-input">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="telhaCobEspessConsid" value="option3" data-control="#telCobEspConsValor">
                                                                    <label class="form-check-label" for="telhaCobEspessConsid">Espessura a ser considerada</label>
                                                                </div>
                                                                <div class="form-inline">
                                                                    <input type="text" id="telCobEspConsValor" class="form-control controled-input" />
                                                                </div>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaCobN50" value="option3">
                                                                <label class="form-check-label" for="telhaCobN50">#0,50</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaCobN65" value="option3">
                                                                <label class="form-check-label" for="telhaCobN65">#0,65</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaCobLaRocha" value="option3">
                                                                <label class="form-check-label" for="telhaCobLaRocha">Lã de Rocha</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Telhas de Fechamento</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaFechTp100" value="option1">
                                                                <label class="form-check-label" for="telhaFechTp100">TP100</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaFechTp45" value="option2">
                                                                <label class="form-check-label" for="telhaFechTp45">TP45</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaFechTp35" value="option3">
                                                                <label class="form-check-label" for="telhaFechTp35">TP35</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaFechSanduiche" value="option3">
                                                                <label class="form-check-label" for="telhaFechSanduiche">Sanduíche</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaFechN50" value="option3">
                                                                <label class="form-check-label" for="telhaFechN50">#0,50</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaFechN65" value="option3">
                                                                <label class="form-check-label" for="telhaFechN65">#0,65</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaFechEps" value="option3">
                                                                <label class="form-check-label" for="telhaFechEps">EPS</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="telhaFechLaRocha" value="option3">
                                                                <label class="form-check-label" for="telhaFechLaRocha">Lã de Rocha</label>
                                                            </div>
                                                            <div class="form-inline inline-spaced check-input">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="telhaFechPrePint" value="option3" data-control="#telFechPrePintRal">
                                                                    <label class="form-check-label" for="telhaFechPrePint">Pré-pintada</label>
                                                                </div>
                                                                <div class="form-inline">
                                                                    <label class="title sup-field" for="telFechPrePintRal">RAL</label>
                                                                    <input type="text" id="telFechPrePintRal" class="form-control controled-input" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Lanternim</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="lanternRobert" value="option1">
                                                                <label class="form-check-label" for="lanternRobert">Roberto</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="lanternConvenc" value="option2">
                                                                <label class="form-check-label" for="lanternConvenc">Convencional</label>
                                                            </div>
                                                            <div class="form-inline inline-spaced check-input">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="lanternPrePint" value="option3" data-control="#renovacoesAr">
                                                                    <label class="form-check-label" for="lanternPrePint">Renovações de Ar</label>
                                                                </div>
                                                                <div class="form-inline renovAr-container">
                                                                    <input type="text" id="renovacoesAr" class="form-control controled-input" />
                                                                    <label class="perHour"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Iluminação Natural</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="ilumNatZenitPolicarb" value="option1">
                                                                <label class="form-check-label" for="ilumNatZenitPolicarb">Zenital Policarbonato</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="ilumNatZenitPrisma" value="option2">
                                                                <label class="form-check-label" for="ilumNatZenitPrisma">Zenital Prismático</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="ilumNatTp35" value="option3">
                                                                <label class="form-check-label" for="ilumNatTp35">TP35</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="ilumNatTelhaFibra" value="option3">
                                                                <label class="form-check-label" for="ilumNatTelhaFibra">Telha de Fibra</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="ilumNatN12" value="option3">
                                                                <label class="form-check-label" for="ilumNatN12">#1,2 mm</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="ilumNatN18" value="option3">
                                                                <label class="form-check-label" for="ilumNatN18">#1,8 mm</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="ilumNatTelhaPolicarb" value="option3">
                                                                <label class="form-check-label" for="ilumNatTelhaPolicarb">Telha de Policarbonato P/ Fechamento</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Proteção da Estrutura Metálica</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="protEstMetGalvFogo" value="option1">
                                                                <label class="form-check-label" for="protEstMetGalvFogo">Galvanizado a Fogo</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="protEstMetPintCinza" value="option2">
                                                                <label class="form-check-label" for="protEstMetPintCinza">Pintado - Cinza N6,5</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="protEstMetPintBranco" value="option3">
                                                                <label class="form-check-label" for="protEstMetPintBranco">Pintado - Branco 9003</label>
                                                            </div>
                                                            <div class="form-inline inline-spaced check-input">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="protEstMetPint" value="option3" data-control="#proEstPintValor">
                                                                    <label class="form-check-label" for="protEstMetPint">Pintado</label>
                                                                </div>
                                                                <div class="form-inline">
                                                                    <input type="text" id="proEstPintValor" class="form-control controled-input" />
                                                                </div>
                                                            </div>
                                                            <div class="form-inline justify-content-between">
                                                                <label for="protEstMetMicras">Micras</label>
                                                                <input type="text" id="protEstMetMicras" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Alpendre</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="alpendCalandrado" value="option1">
                                                                <label class="form-check-label" for="alpendCalandrado">Calandrado</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="alpendComTesteira" value="option2">
                                                                <label class="form-check-label" for="alpendComTesteira">Com Testeira</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="alpendSemTesteira" value="option3">
                                                                <label class="form-check-label" for="alpendSemTesteira">Sem Testeira</label>
                                                            </div>
                                                            <div class="form-inline inline-spaced check-input">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="alpendLargura" value="option3" data-control="#alpendLarguraValor">
                                                                    <label class="form-check-label" for="alpendLargura">Largura</label>
                                                                </div>
                                                                <div class="form-inline">
                                                                    <input type="text" id="alpendLarguraValor" class="form-control controled-input" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group check-group">
                                                        <label class="title">Calhas e Arremates</label>
                                                        <div class="check-group-content">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="calhArremSim" value="option1">
                                                                <label class="form-check-label" for="calhArremSim">Sim</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="calhArremNao" value="option2">
                                                                <label class="form-check-label" for="calhArremNao">Não</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="calhArremN65" value="option3">
                                                                <label class="form-check-label" for="calhArremN65">#0,65</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="calhArremN50" value="option3">
                                                                <label class="form-check-label" for="calhArremN50">#0,50</label>
                                                            </div>
                                                            <div class="form-inline check-input justify-content-between">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check-control" type="checkbox" id="calhArremPrePint" value="option3" data-control="#calArrmPrePintRal">
                                                                    <label class="form-check-label" for="calhArremPrePint">Pré-pintada</label>
                                                                </div>
                                                                <div class="form-inline">
                                                                    <label class="title sup-field" for="calArrmPrePintRal">RAL</label>
                                                                    <input type="text" id="calArrmPrePintRal" class="form-control controled-input" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary btn-prev-form">Anterior</button>
                                        <button class="btn btn-primary btn-next-form">Próximo</button>
                                    </div>
                                </div>
                                <div id="observForm" role="tabpanel" class="bs-stepper-pane fade text-center" aria-labelledby="stepperFormTrigger3">
                                    <div class="card">
                                        <div class="card-body">

                                            <h4 class="card-title">Observações</h4>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea id="observ" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary btn-prev-form">Anterior</button>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="#">


                            </form>


                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->
@endsection

@section('footerScript')

            <script src="{{ URL::asset('/libs/select2/select2.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/bootstrap-filestyle2/bootstrap-filestyle2.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/bs-stepper/js/bs-stepper.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/bootstrap-autocomplete/bootstrap-autocomplete.min.js')}}"></script>

            <script src="{{ URL::asset('/js/pages/form-advanced.init.js')}}"></script>

            <script>
                $(function() {
                    function init() {
                        $('#desastresNat').change();
                        $('.check-control').change();
                    }

                    $('#desastresNat').on('change', function() {
                        let checked = $(this).prop('checked');
                        $('.desastre-container input').prop('disabled', !checked).prop('required', checked);
                    });

                    $('.check-control').on('change', function() {
                        let selector = $(this).data('control');
                        let checked = $(this).prop('checked');
                        $(`${selector}`).prop('disabled', !checked).prop('required', checked);
                    });

                    init();
                });

                $(document).ready(($) => {
                    let stepperFormEl = document.querySelector('#stepperForm');
                    let stepperForm = new Stepper(stepperFormEl, {
                        linear: false,
                        animation: true
                    });

                    let btnNextList = [].slice.call(document.querySelectorAll('.btn-next-form'));
                    let btnPrevList = [].slice.call(document.querySelectorAll('.btn-prev-form'));
                    let stepperPanList = [].slice.call(stepperFormEl.querySelectorAll('.bs-stepper-pane'));
                    let stepperList = [].slice.call(stepperFormEl.querySelectorAll('.bs-stepper .step'));
                    let form = stepperFormEl.querySelector('.bs-stepper-content form');

                    btnNextList.forEach(function (btn) {
                        btn.addEventListener('click', function () {
                            stepperForm.next();
                        });
                    });

                    btnPrevList.forEach(function (btn) {
                        btn.addEventListener('click', function () {
                            stepperForm.previous();
                        });
                    });

                    stepperFormEl.addEventListener('show.bs-stepper', function (event) {
                        form.classList.remove('was-validated');
                        let nextStep = event.detail.to;
                        let currentStep = event.detail.from;
                        let valid = true;

                        let currentPane = stepperPanList[currentStep];

                        currentPane.querySelectorAll('input[required]').forEach((input) => {
                            if (!input.value) {
                                valid = false;
                            }
                        });

                        let stepperPan = stepperPanList[currentStep];

                        if (!valid) {
                            event.preventDefault();
                            form.classList.add('was-validated');
                            //form.classList.add('was-validated');
                        }
                    });

                    $('.basicAutoComplete').autoComplete({
                        // resolverSettings: {
                        //     url: 'testdata/test-list.json'
                        // }
                        resolver: 'custom',
                        events: {
                            search: function (qry, callback) {
                                let re = new RegExp(qry.normalize("NFD").replace(/[\u0300-\u036f]/g, "").replace(/([.*+?^${}()|[\]\\])/gi,'\\$1'), 'gi');
                                let a = [
                                    {
                                        value: 1,
                                        text: 'Cliente 1'
                                    },
                                    {
                                        value: 2,
                                        text: 'Nome de Cliente 2'
                                    },
                                    {
                                        value: 3,
                                        text: 'Cliente Chamado 3'
                                    },
                                    {
                                        value: 4,
                                        text: 'Identificação do Cliente 4'
                                    }
                                ].filter((obj) => obj.text.normalize("NFD").replace(/[\u0300-\u036f]/g, "").match(re));
                                callback(a);
                            }
                        }
                    });
                });

            </script>


@endsection
