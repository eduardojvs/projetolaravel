<script>
    $(document).on('click', '.button-delete-on-table', function(event){
        let id = $(this).data('id');
        $('#button-confirm-delete').data('value', id);
        $('#show_id').html(id)
    });
</script>

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"> REMOVER {{ strtoupper($element) }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Desejas realmente remover {{$article . ' ' . $element}} #<span id="show_id"></span>?
            </div>

            <div class="modal-footer">
                <button type="button" id="button-close-delete-modal" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="button-confirm-delete" class="btn btn-primary">Remover</button>
            </div>
        </div>
    </div>
</div>
