export function deletedSuccessSweetAlert(sTexto) {
    return Swal.fire(
        'Removido!',
        sTexto,
        'success'
    );
}

export function insertedSuccessSweetAlert(sTexto) {
    return Swal.fire(
        'Cadastrado!',
        sTexto,
        'success'
    );
}

export function loadingScreenSweetAlert(sTexto) {
    return Swal.fire({
        title: sTexto,
        showConfirmButton: false,
        allowOutsideClick: false,
        imageUrl: "https://media.tenor.com/images/47f855960d5dc83774d7b3b428964c93/tenor.gif",
    });
}

export function updatedSuccessSweetAlert(sTexto) {
    return Swal.fire(
        'Atualizado!',
        sTexto,
        'success'
    );
}
