$(function() {
    $('body').on('keyup', '.has-externo input', function(event) {
        if ((event.originalEvent.key == 'F2') || (event.originalEvent.code == 'F2')) {
            openExterno($(event.target));
        }
    });

    $('body').on('click', '.has-externo a', function(event) {
        event.preventDefault();
        openExterno($(this).siblings('input'));
    });

    $('body').on('change', '.has-externo input', function(event) {
        $(this).trigger('externo:buscar');
    });

    $('body').on('externo:buscar', '.has-externo input', function(event) {

        const codigo = $(this);
        const inputs = codigo.closest('.externo-group').find('input').not(codigo);
        if (codigo.val()) {
            console.log(`${APP_URL}/${codigo.data('rotina')}/${codigo.val()}/get`);
            $.ajax({
                type:'GET',
                url: `${APP_URL}/${codigo.data('rotina')}/${codigo.val()}/get`,
                dataType: 'json',
                data: {},
                beforeSend: function() {
                    inputs.each(function() {
                        $(this).val('Carregando...');
                        $(this).prop('disabled', true);
                    });
                },
                success: function(data) {
                    inputs.each(function() {
                        let reg = new RegExp(`${codigo.data('rotina')}_(\\w+)\\[?\\]?`);
                        let filedName = $(this).attr('name').replace(reg, '$1');
                        if (data[filedName]) {
                            $(this).val(data[filedName]);
                            $(this).prop('disabled', false);
                        }
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (errorThrown == 'Not Found') {
                        alert(`Registro ${codigo.val()} não encontrado!`);
                    }
                    else if (errorThrown == 'Forbidden') {
                        try {
                            alert(jqXHR.responseJSON.message);
                        } catch (e) {
                            alert(errorThrown);
                        }
                    }
                    else {
                        alert(errorThrown);
                    }
                    inputs.each(function() {
                        $(this).val('');
                        $(this).prop('disabled', false);
                    });
                    codigo.val('');
                },
            });
        }
        else {
            inputs.each(function() {
                $(this).val('');
                $(this).prop('disabled', false);
            });
        }
    });

    function openExterno(target) {

        let titulo = target.data('titulo');
        const modal = $('<div class="modal modal-externo fade" tabindex="-1" role="dialog" aria-labelledby="modalExterno" aria-hidden="true"><div class="modal-dialog modal-xl modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">'+ titulo +'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button></div></div></div></div>');
        $('body').append(modal);
        modal.modal();
        modal.on('hidden.bs.modal', function() {
            modal.remove();
        });
        modal.on('shown.bs.modal', function() {
            ajaxExterno(`${APP_URL}/externo/${target.data('rotina')}`, modal, target);
        });
    }

    function ajaxExterno(url, modal, target) {
        $.ajax({
            type:'GET',
            url: url,
            dataType: 'html',
            data: {},
            beforeSend: function() {
                modal.find('.modal-body').html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Carregando...</span></div></div>');
            },
            success: function(data) {
                modal.find('.modal-body').html(data);
                $('form[name=externoSelect]').on('submit', function(event) {
                    event.preventDefault();
                    modal.modal('hide');
                    target.val($(this).data('id'));
                    target.focus();
                    target.trigger('externo:buscar');
                });
                modal.on('click', 'nav a', function(event) {
                    event.preventDefault();
                    ajaxExterno($(this).attr('href'), modal, target);
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                if (errorThrown == 'Forbidden') {
                    let text = $(jqXHR.responseText).find('.ml-4.text-lg.text-gray-500.uppercase.tracking-wider').text().trim();
                    alert(text ? text : errorThrown);
                }
                else {
                    alert(errorThrown);
                }
                modal.modal('hide');
            },
        });
    }
});

