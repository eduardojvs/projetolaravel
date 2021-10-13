import { FORMAT_DATATABLE, URL_PATH_API } from '../consts/consts.js';

/**
 *
 * @param {array} aValores
 * @returns object
 */
export function getInputValues(aValores) {
    let objeto = {};
    for (let x = 0; x < aValores.length; x++) {
        objeto[aValores[x]] = $('#'+aValores[x]).val();
    }
    return objeto;
}

/**
 *
 * @param {String}} name
 */
export function hideModal(name) {
    $(name).modal('hide');
}

/**
 *
 * @param {array} aInputs
 * @param {boolean} val
 * @param {boolean} removeClass
 * @param {boolean} feedback
 */
export function resetInputs(aInputs, bVal = true, bRemoveClass = true, bFeedback = true) {
    aInputs.forEach(element => {
        if (bVal === true) {
            $('#'+element).val('');
        }
        if (bRemoveClass === true) {
            $('#'+element).removeClass('is-valid');
            $('#'+element).removeClass('is-invalid');
        }
        if (bFeedback === true) {
            $('#'+element+'-feedback').remove();
        }
    });
}

/**
 *
 * @param {string} sId
 * @param {string} sTitle
 * @param {string} sClass
 * @param {string} sPosition
 * @returns string
 */
 export function createToolTipError(sId = '', sTitle = '', sClass = '', sPosition = 'top') {
    let tooltip =
        `<span id="${sId}"
            type="button"
            data-toggle="tooltip"
            data-html="true"
            title="${sTitle}"
            data-placement="${sPosition}"
            class="${sClass}"
        >
        </span>`;

    return tooltip;
}
