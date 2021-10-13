@extends('layouts.master')

@section('title') Data Tables @endsection

@section('headerCss')
    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  <!-- start page title -->
                    <div class="row">

                @component('common-components.breadcrumb')
                     @slot('title') Data Table @endslot
                     @slot('li1') JVS  @endslot
                     @slot('li2') Tables  @endslot
                     @slot('li3') Data Table @endslot
                @endcomponent

                @component('common-components.chart')
                     @slot('chart1_id') header-chart-1  @endslot
                     @slot('chart1_title') Balance $ 2,317  @endslot
                     @slot('chart2_id') header-chart-2  @endslot
                     @slot('chart3_title') Item Sold 1230  @endslot
                @endcomponent

                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Default Datatable</h4>
                                    <p class="card-title-desc">DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
                                    </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Cliente</th>
                                                <th>Status</th>
                                                <th>Prioridade</th>
                                                <th>Última Alteração</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
<!--
                                        <tbody>
                                            <tr>
                                                <td>337</td>
                                                <td>Cliente 1</td>
                                                <td>Leiaute Rejeitado</td>
                                                <td><span class="badge badge-danger">Alta</span></td>
                                                <td>08/01/2021 10:16:51</td>
                                                <td>
                                                    <i class="fas fa-paperclip" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-paper-plane" style="color: #c1cad7;"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>352</td>
                                                <td>Cliente 3</td>
                                                <td>Leiaute em Execução</td>
                                                <td><span class="badge badge-warning">Média</span></td>
                                                <td>10/01/2021 09:22:01</td>
                                                <td>
                                                    <i class="fas fa-paperclip" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-paper-plane"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>360</td>
                                                <td>Cliente 2</td>
                                                <td>Aguardando Leiaute</td>
                                                <td><span class="badge badge-info">Baixa</span></td>
                                                <td>07/01/2021 15:35:02</td>
                                                <td>
                                                    <i class="fas fa-paperclip" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-paper-plane" style="color: #c1cad7;"></i>
                                                </td>
                                            </tr>
                                        </tbody>
-->
<!--
                                        <tbody>
                                            <tr>
                                                <td>337</td>
                                                <td>Cliente 1</td>
                                                <td>Proposta Rejeitada</td>
                                                <td><span class="badge badge-danger">Alta</span></td>
                                                <td>08/01/2021 10:16:51</td>
                                                <td>
                                                    <i class="fas fa-ruler-combined" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-paper-plane"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>352</td>
                                                <td>Cliente 3</td>
                                                <td>Aguardando </td>
                                                <td><span class="badge badge-warning">Média</span></td>
                                                <td>10/01/2021 09:22:01</td>
                                                <td>
                                                    <i class="fas fa-ruler-combined" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-paper-plane" style="color: #c1cad7;"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>360</td>
                                                <td>Cliente 2</td>
                                                <td>Aguardando Dimensionamento</td>
                                                <td><span class="badge badge-info">Baixa</span></td>
                                                <td>07/01/2021 15:35:02</td>
                                                <td>
                                                    <i class="fas fa-ruler-combined" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-paper-plane" style="color: #c1cad7;"></i>
                                                </td>
                                            </tr>
                                        </tbody>
-->
<!--
                                        <tbody>
                                            <tr>
                                                <td>337</td>
                                                <td>Cliente 1</td>
                                                <td>Proposta Rejeitada</td>
                                                <td><span class="badge badge-danger">Alta</span></td>
                                                <td>08/01/2021 10:16:51</td>
                                                <td>
                                                    <i class="fas fa-info-circle" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-cogs" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-file" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-paper-plane"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>348</td>
                                                <td>Cliente 4</td>
                                                <td>Aguardando Envio de Proposta</td>
                                                <td><span class="badge badge-danger">Alta</span></td>
                                                <td>10/01/2021 09:22:01</td>
                                                <td>
                                                    <i class="fas fa-info-circle" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-cogs" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-file" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-paper-plane"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>350</td>
                                                <td>Cliente 5</td>
                                                <td>Aguardando Geração de Proposta</td>
                                                <td><span class="badge badge-warning">Média</span></td>
                                                <td>08/01/2021 11:02:16</td>
                                                <td>
                                                    <i class="fas fa-info-circle" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-cogs" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-file" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-paper-plane" style="color: #c1cad7;"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>352</td>
                                                <td>Cliente 3</td>
                                                <td>Aguardando Definição de Peças</td>
                                                <td><span class="badge badge-warning">Média</span></td>
                                                <td>07/01/2021 16:18:42</td>
                                                <td>
                                                    <i class="fas fa-info-circle" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-cogs" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-file" style="margin-right: 5px; color: #c1cad7;"></i>
                                                    <i class="fas fa-paper-plane" style="color: #c1cad7;"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>360</td>
                                                <td>Cliente 2</td>
                                                <td>Aguardando Informação de Parâmetros</td>
                                                <td><span class="badge badge-info">Baixa</span></td>
                                                <td>06/01/2021 15:35:02</td>
                                                <td>
                                                    <i class="fas fa-info-circle" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-cogs" style="margin-right: 5px; color: #c1cad7;"></i>
                                                    <i class="fas fa-file" style="margin-right: 5px; color: #c1cad7;"></i>
                                                    <i class="fas fa-paper-plane" style="color: #c1cad7;"></i>
                                                </td>
                                            </tr>
                                        </tbody>
-->

                                        <tbody>
                                            <tr>
                                                <td>337</td>
                                                <td>Cliente 1</td>
                                                <td>Contrato Rejeitado</td>
                                                <td><span class="badge badge-danger">Alta</span></td>
                                                <td>08/01/2021 10:16:51</td>
                                                <td>
                                                    <i class="fas fa-eye" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-file-contract" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-paper-plane"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>348</td>
                                                <td>Cliente 4</td>
                                                <td>Contrato Aceito</td>
                                                <td><span class="badge badge-warning">Média</span></td>
                                                <td>10/01/2021 09:22:01</td>
                                                <td>
                                                    <i class="fas fa-file-signature" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-undo" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-hard-hat"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>352</td>
                                                <td>Cliente 3</td>
                                                <td>Aguardando Envio do Contrato</td>
                                                <td><span class="badge badge-warning">Média</span></td>
                                                <td>07/01/2021 16:18:42</td>
                                                <td>
                                                    <i class="fas fa-eye" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-file-contract" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-paper-plane"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>360</td>
                                                <td>Cliente 2</td>
                                                <td>Aguardando Contrato</td>
                                                <td><span class="badge badge-info">Baixa</span></td>
                                                <td>06/01/2021 15:35:02</td>
                                                <td>
                                                    <i class="fas fa-eye" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-file-contract" style="margin-right: 5px;"></i>
                                                    <i class="fas fa-paper-plane" style="color: #c1cad7;"></i>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

@endsection

@section('footerScript')
            <!-- Required datatable js -->
            <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

            <!-- Datatable init js -->
            <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection
