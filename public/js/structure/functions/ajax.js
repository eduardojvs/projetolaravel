import { loadingScreenSweetAlert } from './sweetalert.js';
import {
    createToolTipError
} from './functions.js';


const DEFAULT_EXCEPTION    = 0;
const INVALID_FORM_REQUEST = 1;
const QUERY_EXCEPTION      = 2;

export function ajaxRequest(ajax, options = null) {
    let tSwal;

    $.ajax({
        url: ajax.url,
        type: ajax.type,
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: ajax.data,
        beforeSend: function() {
            tSwal = loadingScreenSweetAlert('Carregando!');
        },
        complete: function() {
            tSwal.close();
        },
        success: function (success) {

            ajax.success(success);
            console.log('success')
            console.log(success)
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log('Houve um erro no teu Ajax, burrao')
            console.log(xhr.responseJSON)

            if (typeof xhr.responseJSON.type !== 'undefined') {
                if (xhr.responseJSON.type == INVALID_FORM_REQUEST) {
                    if (typeof options !== 'undefined') {
                        if (typeof options.inputs !== 'undefined') {
                            dataInvalidFromValidation(xhr.responseJSON.errors, options.inputs);
                        } else {
                            dataInvalidFromValidation(xhr.responseJSON.errors);
                        }
                    }

                    console.log(1)
                    Swal.fire('Ops...', xhr.responseJSON.message, 'error');
                } else if (xhr.responseJSON.type == QUERY_EXCEPTION) {
                    console.log(xhr.responseJSON.error)

                    Swal.fire('Ops...', xhr.responseJSON.error.message, 'error');
                } else {
                    console.log(0)
                    Swal.fire('Ops...', xhr.responseJSON.message, 'error');
                }
            }


            if (typeof ajax.error !== 'undefined') {
                ajax.error(xhr.responseJSON, ajaxOptions, thrownError);
            }


        }
    });
}


function dataInvalidFromValidation(jsonErrors, inputs = null) {
    if (inputs === null){
        for (let error in jsonErrors) {
            for (let x = 0; x < jsonErrors[error].length; x++) {

                $('#'+error).before(createToolTipError(error+'-feedback', jsonErrors[error][0], 'warning-error-validation', 'top'));

                $('#'+error).removeClass('is-valid');
                $('#'+error).addClass('is-invalid');
                $('#modalUpdate').modal('hide');
            }
        }
    } else {
        for (let i = 0; i < inputs.length; i++) {
            let error = inputs[i];
            if ($('#'+error+'-feedback').length != 0) {
                $('#'+error+'-feedback').remove()
            }

            if (inputs[i] in jsonErrors) {
                inputInvalido(error, jsonErrors[error][0])
            } else {
                inputValido(error)
            }
        }
    }
}

function inputInvalido(error, mensagem) {
    $('#validation-space-'+error).attr('data-original-title', mensagem)
    $('#validation-space-'+error).removeClass('is-valid-icon');
    $('#validation-space-'+error).addClass('is-invalid-icon');
    $('#'+error+'-feedback').tooltip();
    $('#'+error).removeClass('is-valid');
    $('#'+error).addClass('is-invalid');
}

function inputValido(error) {
    $('#'+error+'-feedback').remove();
    $('#'+error).removeClass('is-invalid');
    $('#'+error).addClass('is-valid');
    $('#validation-space-'+error).removeClass('is-invalid-icon');
    $('#validation-space-'+error).addClass('is-valid-icon');
    $('#validation-space-'+error).tooltip('dispose');
}
