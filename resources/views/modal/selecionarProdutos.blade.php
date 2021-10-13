<div class="modal fade" id="consultarProduto" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">

    <div class="modal-xl modal-dialog " role="document">

        <div class="modal-content">

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-body col-12 mx-auto">

                            <div class="classic-tabs border border-dark rounded px-4 pt-1">

                                <div class="tab-content" id="advancedTabContent">

                                    <div id="tab-modal" class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">

                                        <div class="row justify-content-center">

                                            <select id="select-filtro" class="form-control col-3">
                                                <option value="produto" selected> Nome do Produto </option>
                                                <option value="descricao"> Descrição do Produto   </option>
                                                <option value="valor-maior-que" > Valor maior que </option>
                                                <option value="valor-menor-que" > Valor menor que </option>
                                            </select>

                                            <input id="input-filtro" class="form-control col-8 ml-1" type="text" placeholder="Procurar" id="filtro">

                                            <span class="align-middle text-center ml-2">
                                                <i  id="icon-search" class="fas fa-search align-middle text-center" style="font-size:25px;"></i>
                                            </span>

                                        </div>

                                        <div id="content-js">

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
