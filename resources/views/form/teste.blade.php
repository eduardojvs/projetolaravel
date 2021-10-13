@extends('layouts.master')

@section('title') Solicitação de Orçamento @endsection

@section('headerCss')
    <link href="{{ URL::asset('/libs/bs-stepper/css/bs-stepper.min.css')}}" rel="stylesheet" />
@endsection

@section('customCss')
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
                    <div class="container">
                        <h1>bs-stepper</h1>
                        <div class="row">
                            <div class="col-md-12 mt-5">
                                <h2>Linear stepper</h2>
                                <div id="stepper1" class="bs-stepper">
                                    <div class="bs-stepper-header">
                                        <div class="step" data-target="#test-l-1">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">First step</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-2">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Second step</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-3">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Third step</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <div id="test-l-1" class="content">
                                            <p class="text-center">test 1</p>
                                            <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                                        </div>
                                        <div id="test-l-2" class="content">
                                            <p class="text-center">test 2</p>
                                            <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                                        </div>
                                        <div id="test-l-3" class="content">
                                            <p class="text-center">test 3</p>
                                            <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                                            <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <h2>Non linear stepper</h2>
                                <div id="stepper2" class="bs-stepper">
                                    <div class="bs-stepper-header">
                                        <div class="step" data-target="#test-nl-1">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">First step</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-nl-2">
                                            <div class="btn step-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Second step</span>
                                            </div>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-nl-3">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Third step</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <div id="test-nl-1" class="content">
                                            <p class="text-center">test 3</p>
                                            <button class="btn btn-primary" onclick="stepper2.next()">Next</button>
                                        </div>
                                        <div id="test-nl-2" class="content">
                                            <p class="text-center">test 4</p>
                                            <button class="btn btn-primary" onclick="stepper2.next()">Next</button>
                                        </div>
                                        <div id="test-nl-3" class="content">
                                            <p class="text-center">test 5</p>
                                            <button class="btn btn-primary" onclick="stepper2.next()">Next</button>
                                            <button class="btn btn-primary" onclick="stepper2.previous()">Previous</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <h2>Vertical stepper</h2>
                                <div id="stepper3" class="bs-stepper vertical">
                                    <div class="bs-stepper-header">
                                        <div class="step" data-target="#test-lv-1">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">First step</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-lv-2">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Second step</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-lv-3">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Third step</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                    <div id="test-lv-1" class="content">
                                        <p class="text-center">test 3</p>
                                        <button class="btn btn-primary" onclick="stepper3.next()">Next</button>
                                        <button class="btn btn-primary" onclick="stepper3.previous()">Previous</button>
                                    </div>
                                    <div id="test-lv-2" class="content">
                                        <p class="text-center">test 4</p>
                                        <button class="btn btn-primary" onclick="stepper3.next()">Next</button>
                                        <button class="btn btn-primary" onclick="stepper3.previous()">Previous</button>
                                    </div>
                                    <div id="test-lv-3" class="content">
                                        <p class="text-center">test 5</p>
                                        <button class="btn btn-primary" onclick="stepper3.next()">Next</button>
                                        <button class="btn btn-primary" onclick="stepper3.previous()">Previous</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <h2>Linear vertical stepper without fade</h2>
                                <div id="stepper4" class="bs-stepper vertical">
                                    <div class="bs-stepper-header">
                                        <div class="step" data-target="#test-vlnf-1">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">First step</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-vlnf-2">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Second step</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-vlnf-3">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Third step</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <div id="test-vlnf-1" class="content">
                                            <p class="text-center">test 1</p>
                                            <button class="btn btn-primary" onclick="stepper4.next()">Next</button>
                                        </div>
                                        <div id="test-vlnf-2" class="content">
                                            <p class="text-center">test 2</p>
                                            <button class="btn btn-primary" onclick="stepper4.next()">Next</button>
                                            <button class="btn btn-primary" onclick="stepper4.previous()">Previous</button>
                                        </div>
                                        <div id="test-vlnf-3" class="content">
                                            <p class="text-center">test 3</p>
                                            <button class="btn btn-primary" onclick="stepper4.next()">Next</button>
                                            <button class="btn btn-primary" onclick="stepper4.previous()">Previous</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5 p-4 bg-white shadow-sm">
                        <h3>Form validation</h3>
                        <div id="stepperForm" class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                                <div class="step" data-target="#test-form-1">
                                    <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger1" aria-controls="test-form-1">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Email</span>
                                    </button>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-form-2">
                                    <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger2" aria-controls="test-form-2">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Password</span>
                                    </button>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-form-3">
                                    <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger3" aria-controls="test-form-3">
                                        <span class="bs-stepper-circle">3</span>
                                        <span class="bs-stepper-label">Validate</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <form class="needs-validation" onSubmit="return false" novalidate>
                                    <div id="test-form-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger1">
                                        <div class="form-group">
                                            <label for="inputMailForm">Email address <span class="text-danger font-weight-bold">*</span></label>
                                            <input id="inputMailForm" type="email" class="form-control" placeholder="Enter email" required>
                                            <div class="invalid-feedback">Please fill the email field</div>
                                        </div>
                                        <button class="btn btn-primary btn-next-form">Next</button>
                                    </div>
                                    <div id="test-form-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger2">
                                        <div class="form-group">
                                            <label for="inputPasswordForm">Password <span class="text-danger font-weight-bold">*</span></label>
                                            <input id="inputPasswordForm" type="password" class="form-control" placeholder="Password" required>
                                            <div class="invalid-feedback">Please fill the password field</div>
                                        </div>
                                        <button class="btn btn-primary btn-next-form">Next</button>
                                    </div>
                                    <div id="test-form-3" role="tabpanel" class="bs-stepper-pane fade text-center" aria-labelledby="stepperFormTrigger3">
                                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
@endsection

@section('footerScript')

            <script src="{{ URL::asset('/libs/bs-stepper/js/bs-stepper.min.js')}}"></script>

            <script>
                var stepper1Node = document.querySelector('#stepper1');
                var stepper1 = new Stepper(document.querySelector('#stepper1'));

                stepper1Node.addEventListener('show.bs-stepper', function (event) {
                    console.warn('show.bs-stepper', event)
                });
                stepper1Node.addEventListener('shown.bs-stepper', function (event) {
                    console.warn('shown.bs-stepper', event)
                });

                var stepper2 = new Stepper(document.querySelector('#stepper2'), {
                    linear: false,
                    animation: true
                });
                var stepper3 = new Stepper(document.querySelector('#stepper3'), {
                    animation: true
                });
                var stepper4 = new Stepper(document.querySelector('#stepper4'));

                $(document).ready(($) => {
                    let stepperFormEl = document.querySelector('#stepperForm');
                    let stepperForm = new Stepper(stepperFormEl, {
                        animation: true
                    });

                    let btnNextList = [].slice.call(document.querySelectorAll('.btn-next-form'));
                    let stepperPanList = [].slice.call(stepperFormEl.querySelectorAll('.bs-stepper-pane'));
                    let inputMailForm = document.getElementById('inputMailForm');
                    let inputPasswordForm = document.getElementById('inputPasswordForm');
                    let form = stepperFormEl.querySelector('.bs-stepper-content form');

                    btnNextList.forEach(function (btn) {
                        btn.addEventListener('click', function () {
                            stepperForm.next();
                        })
                    })

                    stepperFormEl.addEventListener('show.bs-stepper', function (event) {
                        form.classList.remove('was-validated');
                        let nextStep = event.detail.indexStep;
                        let currentStep = nextStep;

                        if (currentStep > 0) {
                            currentStep--;
                        }

                        let stepperPan = stepperPanList[currentStep];

                        if ((stepperPan.getAttribute('id') === 'test-form-1' && !inputMailForm.value.length)
                        || (stepperPan.getAttribute('id') === 'test-form-2' && !inputPasswordForm.value.length)) {
                            event.preventDefault();
                            form.classList.add('was-validated');
                        }
                    });
                });

            </script>
@endsection
