import { URL_PATH_API, DATATABLE_LIST_FORMAT, DATATABLE_EXTERNO_FORMAT } from '../consts/consts.js';

export function createDataTable(dataTableInfo) {

    let table = $(dataTableInfo.id).DataTable({
        processing: true,
        serverSide: false,
        //"dom": 'lrtip',
        colReorder: true,
        ajax: `${URL_PATH_API}/${dataTableInfo.url.section}/datatable/0`,
        columns: setColumnsDatatable(getColunasFromComponente(dataTableInfo)),
        language: languageInfoDatatable(dataTableInfo.textLanguage)
    });

    return table;
}

export function deleteLineOnDataTable(idTabela, idRegistro) {
    return $(idTabela).DataTable().row(
        $(`a[data-id='${idRegistro}']`).parent().parent()
    ).remove().draw();
}

export function languageInfoDatatable(sTexto) {
    return {
        processing:     "Carregando...",
        search:         "Procurar&nbsp;:",
        lengthMenu:     "Mostrar _MENU_",
        info:           "Mostrando _START_ a _END_ de _TOTAL_ " + sTexto,
        infoEmpty:      "Mostrando 0 de 0 " +  sTexto + ".",
        infoFiltered:   "(_MAX_ " + sTexto + " no total)",
        infoPostFix:    "",
        //loadingRecords: "Carregando...",
        zeroRecords:    "Não há registros disponíveis.",
        emptyTable:     "Não há registros disponíveis.",
        paginate: {
            first:      "Primeiro",
            previous:   "Anterior",
            next:       "Próximo",
            last:       "Último"
        },
        aria: {
            sortAscending:  ": mostrando por ordem crescente em relação a coluna selecionada",
            sortDescending: ": mostrando por ordem decrescente em relação a coluna selecionada"
        }
    }
}


function getColunasFromComponente(table) {
    const colunasComponente = $(table.id).data('coluna');
    let colunasDataTable = [];
    for (let x = 0; x < colunasComponente.length; x++) {
        let element = colunasComponente[x];
        console.log('element')
        console.log(element)
        colunasDataTable[x] = {
            data: element,
            name: element
        }
    }

    return colunasDataTable;
}

function setColumnsDatatable(columns) {
    let aColumns = [];

    columns.forEach((element) => {
        aColumns.push(element);
    });

    if (columns.action === DATATABLE_LIST_FORMAT) {
        aColumns.push({
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            render: function ( data, type, row ) {
                let retorno =
                `<a href="/${data.route}/${data.id}/edit" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="#modalDelete" data-id="${data.id}"
                            class="btn btn-danger button-delete-on-table" data-toggle="modal" data-target="#modalDelete">
                    <i class="fas fa-trash-alt"></i>
                </a>
                <a href="/${data.route}/${data.id}/show" class="btn btn-info">
                    <i class="fas fa-eye"></i>
                </a>`;

                return retorno;
            }
        });
    } else if (columns.action === DATATABLE_EXTERNO_FORMAT) {
        aColumns.push({
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            render: function ( data, type, row ) {
                let retorno =
                `<div class="row">
                    <form name="externoSelect" data-id="${data.id}" data-target-id="id" action="#" method="GET" class="ml-2">
                        <button type="submit" class="btn btn-success">
                            Selecionar
                        </button>
                    </form>
                </div>`;
                return retorno;
            }
        });
    }

    return aColumns;
}
