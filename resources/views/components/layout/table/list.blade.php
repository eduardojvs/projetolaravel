<table id="{{$id}}" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" data-coluna="{{json_encode($colunaDatatables)}}">
    <thead class="thead-dark" >
        <tr>
            @foreach ($cabecalho as $coluna)
                <td scope="col"> {{ $coluna }} </td>
            @endforeach
            @if ($menu)
                <td scope="col"> Menu </td>
            @endif
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
