$(function() {
    function addGridLine(fieldgrid) {
        let id = fieldgrid.attr('id');
        fieldgrid.find('.btn-grid-add').closest('.d-flex').before(gridConfig[id].linha);
    }

    $('.fieldgrid').on('click', '.btn-grid-add', function() {
        addGridLine($(this).closest('.fieldgrid'));
    });

    $('.fieldgrid').on('click', '.btn-grid-remove', function() {
        let fieldgrid = $(this).closest('.fieldgrid');
        $(this).closest('.form-group').remove();
        if (!fieldgrid.find('> .form-group').length) {
            addGridLine(fieldgrid);
        }
    });

    if (typeof gridConfig != 'undefined') {
        for (let id in gridConfig) {
            let linhas = $(`#${id} > .form-group`);
            gridConfig[id].data.forEach(function(objeto, i) {
                for (let attr in gridConfig[id].campos) {
                    $(linhas[i]).find(`[name='${gridConfig[id].campos[attr]}[]']`).val(objeto[attr]);
                }
            });
        }
    }
});
