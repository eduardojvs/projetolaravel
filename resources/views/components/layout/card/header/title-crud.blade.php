@if ($rota === 'create')
    <h2> Cadastrando {{ $titulo }} </h2>
@elseif ($rota === 'edit')
    <h2> Editando o {{ $titulo }} #{{ $codigo }} </h2>
@elseif ($rota === 'show')
    <h2> Visualizando o {{ $titulo }} #{{ $codigo }} </h2>
@endif
