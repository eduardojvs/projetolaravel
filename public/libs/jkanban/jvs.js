    function jvsKanban() 
    $(function () {
        getKanbans();
    });

    /**
     * AJAX responsável pelo retorno do Kanbans
     */
    function getKanbans() {
        let tSwal;
        // Efetua o AJAX responsável pelo retorno do Kanbans.
        $.ajax({
            url: "{{route('api.kanbans.index')}}",
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
            },
            // Tela de Loading...
            beforeSend : function(){
                tSwal = Swal.fire({
                    title: 'Carregando!',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    imageUrl: "https://media.tenor.com/images/47f855960d5dc83774d7b3b428964c93/tenor.gif",
                });
            },
            complete: function(){
                tSwal.close();
            },
            success: function(response) {
                tSwal.close();
                //console.log(response.data);
                let KanbanTest = new jKanban({
                    element: "#myKanban",
                    gutter: "10px",
                    widthBoard: "450px",
                    itemHandleOptions:{
                        enabled: true,
                    },
                    click: function(el) {
                        //console.log('el');
                        //console.log(el);
                    },
                    context: function(el, e) {
                        //console.log("Trigger on all items right-click!");
                    },
                    dropEl: function(el, target, source, sibling){
                        //console.log(target.parentElement.getAttribute('data-id'));
                        //console.log(el, target, source, sibling)
                    },
                    buttonClick: function(el, boardId) {
                        // create a form to enter element
                        var formItem = document.createElement("form");
                        formItem.setAttribute("class", "itemform");
                        formItem.innerHTML =
                        '<div class="form-group">'
                        +'    <textarea class="form-control" rows="2" autofocus></textarea>'
                        +'</div>'
                        +'<div class="form-group">'
                        +'    <button type="submit" class="btn btn-primary btn-xs pull-right">'
                        +'        Submit'
                        +'    </button>'
                        +'    <button type="button" id="CancelBtn" class="btn btn-default btn-xs pull-right">'
                        +'        Cancel'
                        +'    </button>'
                        +'</div>';

                        KanbanTest.addForm(boardId, formItem);
                        formItem.addEventListener("submit", function(e) {
                            e.preventDefault();
                            var text = e.target[0].value;
                            create = function (sucess){
                                KanbanTest.addElement(boardId, {
                                    id: sucess.data.id,
                                    title: text
                                });
                                formItem.parentNode.removeChild(formItem);
                            };
                            let id = createItemAjax(boardId, text, create);

                        });
                        document.getElementById("CancelBtn").onclick = function() {
                            formItem.parentNode.removeChild(formItem);
                        };
                    },
                    itemAddOptions: {
                        enabled: true,
                        content: '+ Adicionar',
                        class: 'mb-4 ml-4 btn btn-light',
                        footer: true
                    },
                    boards: response.data
                });


                var addBoardDefault = document.getElementById("addDefault");
                addBoardDefault.addEventListener("click", function() {
                    let title   = 'Kanban Default';
                    let classes = 'bg-warning';
                    create = function (sucess) {
                        KanbanTest.addBoards([
                            {
                                id: sucess.data.id,
                                title: title,
                                class: classes
                            }
                        ]);
                    }

                    let id = createBoardAjax(title, classes, create);

                });
            }
        });
    }

    /**
     * Ao clicar para deletar item...
     */
    $(document).on('click', '.deletar-item', function(event) {
        if (!confirm('Deseja apagar o item?')) {
            return false;
        }
        let id = $(this).data('id');
        deleteItemAjax(id);
        $('div[data-eid='+id+']').remove();
    });

    /**
     * Ao clicar para deletar item...
     */
    $(document).on('click', '.deletar-board', function(event) {
    /* if (!confirm('Deseja apagar o Board?')) {
            return false;
        }
        let
        deleteBoardAjax($(this).data('id'));
        $('.kanban-board').data('id');*/
    });

    /**
     * Ao clicar para editar item...
     */
    $(document).on('click', '.editar-board', function(event) {
        //console.log('.editar-item');


        let id         = $(this).data('id');
        let seletorDiv = 'div[data-boardId='+id+']';
        let divItem    = $(seletorDiv).html();
        let text       = $(seletorDiv + ' a.boardTitle').html();

        let form = ''
        +'<form>'
        +'  <div class="form-group">'
        +'      <textarea class="form-control" rows="2" autofocus class="textareaEdit">'+text+'</textarea>'
        +'  </div>'
        +'  <div class="form-group">'
        +'      <a data-id="'+id+'" class="submit-edit-board btn btn-primary btn-xs pull-right">'
        +'          Submit'
        +'      </a>'
        +'      <a data-id="'+id+'" class="cancel-edit-board btn btn-danger btn-xs pull-right">'
        +'          Cancel'
        +'      </a>'
        +'  </div>'
        +'</form>'

        $(seletorDiv).html(form);

    });

    $(document).on('click', '.submit-edit-board', function(event) {
        let id         = $(this).data('id');
        let seletorDiv = 'div[data-boardId='+id+']';
        let divItem    = $(seletorDiv).html();
        let novoTexto  = $(seletorDiv + ' form div.form-group textarea').val();

        let content = ''
        +'<div class="kanban-title-board" data-boardId="'+id+'">'
        +'    <div class="d-flex justify-content-end">'
        +'        <a class="editar-board" data-id="'+id+'">'
        +'            <i class="far fa-edit"></i>'
        +'        </a>'
        +'        <a>  </a>'
        +'        <a class="ml-2 deletar-board" data-id="'+id+'">'
        +'            <i class="fas fa-trash"></i>'
        +'        </a>'
        +'        <a></a>'
        +'    </div>'
        +'    <a class="boardTitle">'+novoTexto+'</a>'
        +'</div>'
        $(seletorDiv).html(content);
        updateBoardAjax(id, novoTexto);
    });

    $(document).on('click', '.cancel-edit-board', function(event) {
        let id          = $(this).data('id');
        let seletorDiv  = 'div[data-boardId='+id+']';
        let texto       = $(seletorDiv + ' form div.form-group textarea').html();
        let content = ''
        +'<div class="kanban-title-board" data-boardId="'+id+'">'
        +'    <div class="d-flex justify-content-end">'
        +'        <a class="editar-board" data-id="'+id+'">'
        +'            <i class="far fa-edit"></i>'
        +'        </a>'
        +'        <a>  </a>'
        +'        <a class="ml-2 deletar-board" data-id="'+id+'">'
        +'            <i class="fas fa-trash"></i>'
        +'        </a>'
        +'        <a></a>'
        +'    </div>'
        +'    <a class="boardTitle">'+texto+'</a>'
        +'</div>'
        $(seletorDiv).html(content);
    })

    /**
     * Ao clicar para editar item...
     */
    $(document).on('click', '.editar-item', function(event) {
        //console.log('.editar-item');
        let id         = $(this).data('id');
        let seletorDiv = 'div[data-eid='+id+']';
        let divItem    = $(seletorDiv).html();
        let text       = $(seletorDiv + ' div.item_handle a').html();

        let form = ''
        +'<form>'
        +'  <div class="form-group">'
        +'      <textarea class="form-control" rows="2" autofocus class="textareaEdit">'+text+'</textarea>'
        +'  </div>'
        +'  <div class="form-group">'
        +'      <button type="submit" data-id="'+id+'" class="submit-edit-item btn btn-primary btn-xs pull-right">'
        +'          Submit'
        +'      </button>'
        +'      <button type="button" data-id="'+id+'" class="cancel-edit-item btn btn-danger btn-xs pull-right">'
        +'          Cancel'
        +'      </button>'
        +'  </div>'
        +'</form>'
        $(seletorDiv).html(form);

    });

    $(document).on('click', '.submit-edit-item', function(event) {
        let id = $(this).data('id');
        let seletorDiv = 'div[data-eid='+id+']';
        let novoTexto = $(seletorDiv + ' form div.form-group textarea').val();
        //console.log('novoTexto');
        //console.log(novoTexto);
        let content = ''
        +'<div class="d-flex justify-content-end">'
        +'    <a class="editar-item" data-id="'+id+'">'
        +'        <i class="far fa-edit"></i>'
        +'    </a>'
        +'    <a>'
        +'    </a>'
        +'    <a class="ml-2 deletar-item" data-id="'+id+'">'
        +'        <i class="fas fa-trash"></i>'
        +'    </a>'
        +'    <a></a>'
        +'</div>'
        +'<div class="item_handle ">'
        +'    <a>'+novoTexto+'</a>'
        +'</div>'
        $(seletorDiv).html(content);
        updateItemAjax(id, novoTexto);
    });

    $(document).on('click', '.cancel-edit-item', function(event) {
        let id = $(this).data('id');
        let seletorDiv = 'div[data-eid='+id+']';
        let texto = $(seletorDiv + ' form div.form-group textarea').html();
        let content = ''
        +'<div class="d-flex justify-content-end">'
        +'    <a class="editar-item" data-id="'+id+'">'
        +'        <i class="far fa-edit"></i>'
        +'    </a>'
        +'    <a>  </a>'
        +'    <a class="ml-2 deletar-item" data-id="'+id+'">'
        +'        <i class="fas fa-trash"></i>'
        +'    </a>'
        +'    <a>  </a>'
        +'</div>'
        +'<div class="item_handle ">'
        +'    <a>'+texto+'</a>'
        +'</div>'
        $(seletorDiv).html(content);
    })

    /**
     * AJAX responsável pela criação do item.
     */
    function createItemAjax(boardId, text, funcao) {
        let id;
        $.ajax({
            url: "{{route('api.kanbans.item.create')}}",
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'board_id': boardId,
                'title'  : text
            },
            success: funcao
        });

        return id;
    }

    /**
     * AJAX responsável pela criação do item.
     */
    function updateItemAjax(id, texto) {
        // Efetua o AJAX responsável pelo retorno do Kanbans.
        console.log('id')
        console.log(id)
        console.log('texto')
        console.log(texto)
        $.ajax({
            url: "{{route('api.kanbans.item.update')}}",
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:    id,
                title: texto
            },
            success: function(response) {
                console.log(response.data);
            }
        });
    }

    /**
     * AJAX responsável pela remoção do item.
     */
    function deleteItemAjax(id) {
        // Efetua o AJAX responsável pelo retorno do Kanbans.
        $.ajax({
            url: "{{route('api.kanbans.item.delete')}}",
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id
            },
            success: function(response) {
                console.log(response.data);
            }
        });
    }

    /**
     * AJAX responsável pela criação do board.
     */
    function createBoardAjax(title, classes, funcao) {
        // Efetua o AJAX responsável pelo retorno do Kanbans.
        let id;
        $.ajax({
            url: "{{route('api.kanbans.board.create')}}",
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                title: title,
                class: classes
            },
            success: funcao
        });

        return id;
    }

    /**
     * AJAX responsável pela atualização do board.
     */
    function updateBoardAjax(id, texto) {
        // Efetua o AJAX responsável pelo retorno do Kanbans.
        $.ajax({
            url: "{{route('api.kanbans.board.update')}}",
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:    id,
                title: texto
            },
            success: function(response) {
                console.log(response.data);
            }
        });
    }

    /**
     * AJAX responsável pela remoção do board.
     */
    function deleteBoardAjax(id) {
        // Efetua o AJAX responsável pelo retorno do Kanbans.
        $.ajax({
            url: "{{route('api.kanbans.board.delete')}}",
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id
            },
            success: function(response) {
                console.log(response.data)
            }
        });
    }

};
