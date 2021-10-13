@extends('layouts.master')

@section('title') Orçamento @endsection

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
        .fieldgrid .btn-grid-remove {
            margin-left: .5rem;
        }
        .fieldgrid > .form-group > .form-inline > .form-group:not(:first-child) {
            padding-left: .5rem;
        }
        .fieldgrid > .form-group > .form-inline > .form-group {
            flex: 1;
        }
        .fieldgrid > .form-group > .form-inline > .form-group > label {
            margin-right: .5rem;
        }
        .fieldgrid > .form-group > .form-inline > .form-group > input {
            width: 60%;
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
        .tab-content {
            border-color: #ced4da;
            border-style: solid;
            border-width: 0 1px 1px 1px;
            padding: 1rem;
        }
        .tb-elem-estrut {
            width: 100%;
            margin-bottom: 1rem;
        }
        .tb-elem-estrut th {
            text-align: center;
        }
        .tb-elem-estrut td:nth-child(6),
        .tb-elem-estrut td:nth-child(15),
        .tb-elem-estrut td:nth-child(16) {
            text-align: center;
        }
        .tb-elem-estrut td:nth-child(7) > input,
        .tb-elem-estrut td:nth-child(8) > input,
        .tb-elem-estrut td:nth-child(9),
        .tb-elem-estrut td:nth-child(10),
        .tb-elem-estrut td:nth-child(11) > input,
        .tb-elem-estrut td:nth-child(12),
        .tb-elem-estrut td:nth-child(13),
        .tb-elem-estrut td:nth-child(14) {
            text-align: right;
        }
        .tb-elem-estrut td:nth-child(7),
        .tb-elem-estrut td:nth-child(8),
        .tb-elem-estrut td:nth-child(10),
        .tb-elem-estrut td:nth-child(11) {
            width: 7em;
        }
        .tb-elem-estrut label {
            margin-bottom: 0;
        }
        .tb-elem-estrut > tbody > tr:nth-child(odd) {
            background-color: #f4f4f4;
        }
    </style>
@endsection

@section('content')
  <!-- start page title -->
                    <div class="row">
               @component('common-components.breadcrumb')
                     @slot('title') Orçamento  @endslot
                     @slot('li1') Sistema de Orçamentos  @endslot
                     @slot('li2') Forms  @endslot
                     @slot('li3') Orçamento @endslot
                @endcomponent

                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="#">

                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="blocos-tab" data-bs-toggle="tab" href="#blocos" role="tab" aria-controls="blocos" aria-selected="true">Blocos</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="pilares-tab" data-bs-toggle="tab" href="#pilares" role="tab" aria-controls="pilares" aria-selected="false">Pilares</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="vigas-tab" data-bs-toggle="tab" href="#vigas" role="tab" aria-controls="vigas" aria-selected="false">Vigas</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="add-tab" data-bs-toggle="tab" href="#" role="tab" aria-selected="false"><i class="fas fa-plus"></i></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="blocos" role="tabpanel" aria-labelledby="blocos-tab">
                                                <table class="tb-elem-estrut">
                                                    <thead>
                                                        <tr>
                                                            <th>Obra</th>
                                                            <th>Etapa</th>
                                                            <th>Conjunto</th>
                                                            <th>Markup</th>
                                                            <th>Item</th>
                                                            <th>Und</th>
                                                            <th>Qtd</th>
                                                            <th>(%) Perda</th>
                                                            <th>Qtd Total</th>
                                                            <th>Custo unt sugerido</th>
                                                            <th>Custo unt praticado</th>
                                                            <th>Custo total item</th>
                                                            <th>Preco venda item</th>
                                                            <th>Preco venda obra</th>
                                                            <th>Agrupador</th>
                                                            <th>Agrupado</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="CONCRETO ADQUIRIDO DE TERCEIROS"></td>
                                                            <td><label>M3</label></td>
                                                            <td><input type="text" class="form-control" value="4,44"></td>
                                                            <td><input type="text" class="form-control" value="2"></td>
                                                            <td><label>4,53</label></td>
                                                            <td><label>300,00</label></td>
                                                            <td><input type="text" class="form-control" value="320,00"></td>
                                                            <td><label>1.449,22</label></td>
                                                            <td><label>2.419,39</label></td>
                                                            <td><label>12.523,67</label></td>
                                                            <td><label>S</label></td>
                                                            <td><label>N</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="CONCRETO ADQUIRIDO DE TERCEIROS"></td>
                                                            <td><label>M3</label></td>
                                                            <td><input type="text" class="form-control" value="19,94"></td>
                                                            <td><input type="text" class="form-control" value="2"></td>
                                                            <td><label>20,34</label></td>
                                                            <td><label>300,00</label></td>
                                                            <td><input type="text" class="form-control" value="320,00"></td>
                                                            <td><label>6.508,42</label></td>
                                                            <td><label>10.865,47</label></td>
                                                            <td><label>56.243,67</label></td>
                                                            <td><label>S</label></td>
                                                            <td><label>N</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="CONCRETO ADQUIRIDO DE TERCEIROS"></td>
                                                            <td><label>M3</label></td>
                                                            <td><input type="text" class="form-control" value="1,56"></td>
                                                            <td><input type="text" class="form-control" value="2"></td>
                                                            <td><label>1,59</label></td>
                                                            <td><label>300,00</label></td>
                                                            <td><input type="text" class="form-control" value="320,00"></td>
                                                            <td><label>509,18</label></td>
                                                            <td><label>850,06</label></td>
                                                            <td><label>4.400,21</label></td>
                                                            <td><label>S</label></td>
                                                            <td><label>N</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="CONCRETO ADQUIRIDO DE TERCEIROS"></td>
                                                            <td><label>M3</label></td>
                                                            <td><input type="text" class="form-control" value="35,60"></td>
                                                            <td><input type="text" class="form-control" value="2"></td>
                                                            <td><label>36,31</label></td>
                                                            <td><label>300,00</label></td>
                                                            <td><input type="text" class="form-control" value="320,00"></td>
                                                            <td><label>11.619,84</label></td>
                                                            <td><label>19.398,73</label></td>
                                                            <td><label>100.414,98</label></td>
                                                            <td><label>S</label></td>
                                                            <td><label>N</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="CONCRETO ADQUIRIDO DE TERCEIROS"></td>
                                                            <td><label>M3</label></td>
                                                            <td><input type="text" class="form-control" value="53,16"></td>
                                                            <td><input type="text" class="form-control" value="2"></td>
                                                            <td><label>54,22</label></td>
                                                            <td><label>300,00</label></td>
                                                            <td><input type="text" class="form-control" value="320,00"></td>
                                                            <td><label>17.351,42</label></td>
                                                            <td><label>28.967,32</label></td>
                                                            <td><label>149.945,52</label></td>
                                                            <td><label>S</label></td>
                                                            <td><label>N</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="CONCRETO ADQUIRIDO DE TERCEIROS"></td>
                                                            <td><label>M3</label></td>
                                                            <td><input type="text" class="form-control" value="11,43"></td>
                                                            <td><input type="text" class="form-control" value="2"></td>
                                                            <td><label>11,66</label></td>
                                                            <td><label>300,00</label></td>
                                                            <td><input type="text" class="form-control" value="320,00"></td>
                                                            <td><label>3.730,75</label></td>
                                                            <td><label>6.228,30</label></td>
                                                            <td><label>32.239,98</label></td>
                                                            <td><label>S</label></td>
                                                            <td><label>N</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="CONCRETO ADQUIRIDO DE TERCEIROS"></td>
                                                            <td><label>M3</label></td>
                                                            <td><input type="text" class="form-control" value="8,01"></td>
                                                            <td><input type="text" class="form-control" value="2"></td>
                                                            <td><label>8,17</label></td>
                                                            <td><label>300,00</label></td>
                                                            <td><input type="text" class="form-control" value="320,00"></td>
                                                            <td><label>2.614,46</label></td>
                                                            <td><label>4.364,71</label></td>
                                                            <td><label>22.593,37</label></td>
                                                            <td><label>S</label></td>
                                                            <td><label>N</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="ACO PARA ARMADURA CONCRETO"></td>
                                                            <td><label>KG</label></td>
                                                            <td><input type="text" class="form-control" value="10.183,20"></td>
                                                            <td><input type="text" class="form-control" value="2"></td>
                                                            <td><label>10.386,86</label></td>
                                                            <td><label>6,00</label></td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td><label>62.321,18</label></td>
                                                            <td><label>104.042,04</label></td>
                                                            <td><label>0,00</label></td>
                                                            <td><label>N</label></td>
                                                            <td><label>S</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="EQUIPE FUNDACAO EXTERNA"></td>
                                                            <td><label>DIA</label></td>
                                                            <td><input type="text" class="form-control" value="32,00"></td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td><label>32,00</label></td>
                                                            <td><label>2.450,00</label></td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td><label>78.400,00</label></td>
                                                            <td><label>130.884,81</label></td>
                                                            <td><label>0,00</label></td>
                                                            <td><label>N</label></td>
                                                            <td><label>S</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="MADEIRA PARA CAIXARIA"></td>
                                                            <td><label>M3</label></td>
                                                            <td><input type="text" class="form-control" value="6,18"></td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td><label>6,18</label></td>
                                                            <td><label>400,00</label></td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td><label>2.470,00</label></td>
                                                            <td><label>4.123,54</label></td>
                                                            <td><label>0,00</label></td>
                                                            <td><label>N</label></td>
                                                            <td><label>S</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="SERVICO RETROESCAVADEIRA"></td>
                                                            <td><label>HR</label></td>
                                                            <td><input type="text" class="form-control" value="290,00"></td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td><label>290,00</label></td>
                                                            <td><label>100,00</label></td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td><label>29.000,00</label></td>
                                                            <td><label>48.414,02</label></td>
                                                            <td><label>0,00</label></td>
                                                            <td><label>N</label></td>
                                                            <td><label>S</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="TOPOGRAFIA"></td>
                                                            <td><label>DIA</label></td>
                                                            <td><input type="text" class="form-control" value="8,00"></td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td><label>8,00</label></td>
                                                            <td><label>1.075,00</label></td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td><label>8.600,00</label></td>
                                                            <td><label>14.357,26</label></td>
                                                            <td><label>0,00</label></td>
                                                            <td><label>N</label></td>
                                                            <td><label>S</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><select class="form-control"><option>GALPÃO</option></select></td>
                                                            <td><select class="form-control"><option>FUNDACAO</option></select></td>
                                                            <td><select class="form-control"><option>Blocos</option></select></td>
                                                            <td><select class="form-control"><option>funda</option></select></td>
                                                            <td><input type="text" class="form-control" value="TRANSPORTE - PROACO"></td>
                                                            <td><label>KM</label></td>
                                                            <td><input type="text" class="form-control" value="480,00"></td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td><label>480,00</label></td>
                                                            <td><label>4,30</label></td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td><label>2.064,00</label></td>
                                                            <td><label>3.445,74</label></td>
                                                            <td><label>0,00</label></td>
                                                            <td><label>N</label></td>
                                                            <td><label>S</label></td>
                                                            <td><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-info"><i class="fas fa-plus"></i> Adicionar</button>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pilares" role="tabpanel" aria-labelledby="pilares-tab">pilares</div>
                                            <div class="tab-pane fade" id="vigas" role="tabpanel" aria-labelledby="vigas-tab">vigas</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary">Enviar</button>
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
                    var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
                    triggerTabList.forEach(function (triggerEl) {
                        var tabTrigger = new bootstrap.Tab(triggerEl)

                        triggerEl.addEventListener('click', function (event) {
                            event.preventDefault();
                            tabTrigger.show();
                        });
                    });
                });
            </script>


@endsection
