@extends('layouts.master')

@section('title') Leiaute @endsection

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
        .custom-file-input:lang(pt-br) ~ .custom-file-label::after {
            content: "Buscar";
        }
        .fieldgrid {
            border: 1px #ced4da solid;
            padding: 0 .5rem .5rem;
            margin-bottom: 1rem;
        }
        .fieldgrid > legend {
            width: auto;
            margin-left: .5rem;
            padding: 0 .25rem;
            font-size: 1.25rem;
        }
        .fieldgrid > .form-group {
            margin-bottom: .5rem;
        }
        .fieldgrid input:not(:first-child),
        .fieldgrid .btn-grid-remove {
            margin-left: .5rem;
        }
        .fieldgrid .grid-codigo {
            width: 100px;
            text-align: right;
        }
        .fieldgrid .grid-added label {
            width: 100%;
            border-bottom: 1px #ced4da solid;
            margin-bottom: 0;
            line-height: 2rem;
        }
    </style>
@endsection

@section('content')
  <!-- start page title -->
                    <div class="row">
               @component('common-components.breadcrumb')
                     @slot('title') Leiaute  @endslot
                     @slot('li1') Sistema de Orçamentos  @endslot
                     @slot('li2') Forms  @endslot
                     @slot('li3') Leiaute @endslot
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

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="#">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Revisão</label>
                                                    <input type="text" class="form-control" value="Revisão 1" required readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Versão</label>
                                                    <input class="form-control basicAutoComplete" type="text" autocomplete="off" value="Galpão principal" required>
                                                    <!--input type="text" class="form-control" required-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <fieldset class="fieldgrid">
                                                            <legend>Arquivos Para o Cliente</legend>
                                                            <div class="form-group grid-added">
                                                                <div class="d-flex justify-content-between">
                                                                    <label><i class="fas fa-file"></i> leiaute_galpao_principal_v1.pdf</label>
                                                                    <button type="button" class="btn btn-danger btn-grid-remove" title="Remover"><i class="far fa-trash-alt"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="d-flex">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="validatedCustomFileCli" required>
                                                                        <label class="custom-file-label" for="validatedCustomFileCli">Escolher arquivo...</label>
                                                                    </div>
                                                                    <button type="button" class="btn btn-danger btn-grid-remove" title="Remover"><i class="far fa-trash-alt"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <button type="button" class="btn btn-info"><i class="fas fa-plus"></i> Adicionar</button>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <fieldset class="fieldgrid">
                                                            <legend>Arquivos Internos</legend>
                                                            <div class="form-group">
                                                                <div class="d-flex">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                                                        <label class="custom-file-label" for="validatedCustomFile">Escolher arquivo...</label>
                                                                    </div>
                                                                    <button type="button" class="btn btn-danger btn-grid-remove" title="Remover"><i class="far fa-trash-alt"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <button type="button" class="btn btn-info"><i class="fas fa-plus"></i> Adicionar</button>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-primary">Enviar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
