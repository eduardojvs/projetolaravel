@if (!$visualizacao)
    <input class="form-control" name="{{$rotina}}_{{$nome}}" placeholder="{{$desc}}" id="{{$nomecomplete}}" value="{{$valor}}">
@else
    - {{ $valor }}
@endif
