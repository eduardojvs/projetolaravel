const OPERACAO_MAIOR = '>';
const OPERACAO_MENOR = '<';
const OPERACAO_IGUAL = '=';
const OPERACAO_MAIOR_IGUAL = '=';
const OPERACAO_MENOR_IGUAL = '=';


export class Input {
    constructor(objectJquery, required = true, minLength = null, maxLength = null) {
        this.setObject(objectJquery);
        this.required  = true;
        this.minLength = minLength;
        this.maxLength = maxLength;
    }

    setObject(objectJquery) {
        this.type         = $(objectJquery).attr('type');
        this.value        = $(objectJquery).val();
        //this.required     = $(objectJquery).data('required');
        this.objectJquery = objectJquery;
        this.valid;
    }

    checkIfItsRequired() {
        if (this.required == true) {
            return true;
        } else {
            return false;
        }
    }

    checkIfItHasToolTipFeedback() {
        let id = $(this.objectJquery).attr('id');
        console.log('$(this).attr(id)')
        if ($('#'+id+'-feedback').length == 1) {

        }
        //if ($('#'+id+'-feedback').length )

    }

    checkLength() {
        let min;
        let max;

        if (this.minLength == null) {
            min = true;
        } else {
            if (this.value.length >= this.minLength) {
                min = true;
            } else {
                min = false;
            }
        }

        if (this.maxLength == null) {
            max = true;
        } else {
            if (this.value.length <= this.maxLength) {
                max = true;
            } else {
                max = false;
            }
        }

        if (min == true && max == true) {
            this.valid = true;
        } else {
            this.valid = false;
        }

        return this.valid;
    }

    matchTextNoSpecials(pValue = null) {
        let letters = /^[A-Za-z0-9\s]+$/;
        let sValue  = pValue === null ? this.value : pValue;

        if (sValue.match(letters)) {
            this.valid = true;
        } else {
            this.valid = false;
        }

        return this.valid;
    }

    matchOnlyCharacters(pSpace = null, pValue = null) {
        let letters = pSpace === null ? /^[A-Za-z]+$/ : /^[A-Za-z\s]+$/;
        let sValue  = pValue === null ? this.value : pValue;

        if (sValue.match(letters)) {
            this.valid = true;
        } else {
            this.valid = false;
        }
        return this.valid;
    }

    matchOnlyNumbers(pSpace = null, pValue = null) {
        let numbers = pSpace === null ? /^[0-9]+$/ : /^[0-9\s]+$/;
        let sValue  = pValue === null ? this.value : pValue;

        if (sValue.match(numbers)) {
            this.valid = true;
        } else {
            this.valid = false;
        }

        return this.valid;
    }

    setValue(sTexto) {
        $(this.objectJquery).val(this.value);
        this.setObject($(this.objectJquery))
    }

    validateInput(businessRule) {
        if (businessRule() && this.checkLength()) {
            this.addClassValid(this.objectJquery);
        } else {
            this.addClassInvalid(this.objectJquery);
        }
        this.setObject($(this.objectJquery))
    }


    addClassInvalid() {
        let required = this.checkIfItsRequired();

        if (required || (!required && !this.checkLength())) {
            $(this.objectJquery).removeClass('is-valid');
            $(this.objectJquery).addClass('is-invalid');
        } else {
            $(this.objectJquery).removeClass('is-valid');
            $(this.objectJquery).removeClass('is-invalid');
        }
    }

    addClassValid() {
        this.checkIfItHasToolTipFeedback();
        $(this.objectJquery).removeClass('is-invalid');
        $(this.objectJquery).addClass('is-valid');
    }





}
