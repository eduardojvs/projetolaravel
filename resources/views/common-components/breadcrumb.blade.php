<div class="col-sm-6">
    <div class="page-title-box">
        <h4>{{$title}}</h4>
            <ol class="breadcrumb m-0">
                @if(isset($li1))
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{$li1}}</a></li>
                @endif
                @if(isset($li2))
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{$li2}}</a></li>
                @endif
                @if(isset($li3))
                    <li class="breadcrumb-item active">{{$li3}}</li>
                @endif
            </ol>
    </div>
</div>
