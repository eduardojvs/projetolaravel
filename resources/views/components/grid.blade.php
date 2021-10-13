<?php
?>
<fieldset class="fieldgrid" id="{{$id}}">
    <legend>{{$titulo}}</legend>
        {{-- @if (!$visualizacao) --}}
        @php $j = count($varLoop) ? count($varLoop) : $linhasIniciais @endphp


        @for ($$varIteracao = 0; $$varIteracao < $j; $$varIteracao++)

            @if ($$varIteracao == 0)

            <div class="d-flex">
                @foreach ($cabecalho as $item)
                    <label class="ml-5">{{$item}}</label>
                @endforeach
            </div>
            @endif

            <div class="form-group">
                <div class="d-flex">
                    {{ $slot }}
                    <button type="button" class="btn btn-danger btn-grid-remove" title="Remover"><i class="far fa-trash-alt"></i></button>
                </div>
            </div>
        @endfor

        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-info btn-grid-add"><i class="fas fa-plus"></i> Adicionar</button>
        </div>
        <script>
            if (typeof gridConfig == 'undefined') {
                gridConfig = {};
            }
            gridConfig['{{$id}}'] = {
                data: {!! json_encode($varLoop) !!},
                campos: {!! json_encode($campos) !!},
                linha: '<div class="form-group">'
                       +    '<div class="d-flex">'
                       +       '{!! preg_replace(['/\s*\r?\n\s+/', '/\s+/'],['', ' '], $slot) !!}'
                       +        '<button type="button" class="btn btn-danger btn-grid-remove" title="Remover">'
                       +             '<i class="far fa-trash-alt"></i>'
                       +         '</button>'
                       +     '</div>'
                       + '</div>'
            }
        </script>
  {{--  @else
        @foreach ($varLoop as $item)
            <div class="form-group">
                <div class="d-flex">
                    @foreach ($campos as $campo => $traducao)
                        @if (!$loop->first) -  @endif {{$item[$campo]}}
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
    --}}
</fieldset>
