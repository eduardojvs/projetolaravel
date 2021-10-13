@if (!$visualizacao)
    <div class="externo-group d-flex {{$class}}">
        <div class="input-group has-externo">
            <input class="form-control" data-rotina="{{$rotina}}" data-titulo="{{$titulo}}" id="externo-{{$rotina}}" name="{{ $chave ? $chave : $rotina}}" value="{{$valor}}">
            <a href="#" class="input-group-append">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
            </a>
        </div>
        {{$slot}}
    </div>
@else
    {{$valor}}
    {{$slot}}
@endif
