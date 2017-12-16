@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
<div class="container col-md-8">
  <h2>Quản lý comment</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Duyệt Comment</a></li>
    <li><a data-toggle="tab" href="#menu1">Đã Duyệt</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Danh sách comment chờ duyệt</h3>
      <ul class="list-group load">
      @foreach($browser as $key => $browser)
        <li idcm="{{$browser->id}}" class="list-group-item itemcomment">{{$browser->content}}
        <div class="hover-itemcoment" style="display:none">
            <button  idcm="{{$browser->id}}" class="btn btn-success allow">Duyệt</button>
            <button  idcm="{{$browser->id}}" class="btn btn-danger delete">Xóa</button>
        </div>
        </li>
      @endforeach
     </ul>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Danh sách comment đã duyệt</h3>
      <ul class="list-group">
      @foreach($done as $key => $done)
        <li idcm="{{$done->id}}" class="list-group-item itemcomment">{{$done->content}}
        <div class="hover-itemcoment" style="display:none">
            <button idcm="{{$done->id}}" class="btn btn-danger delete">Xóa</button>
        </div>
        </li>
      @endforeach
     </ul>
    </div>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
        $('.itemcomment').hover(function(){
            $(this).find('div').slideToggle();
        });
        $('.allow').click(function(){
            var id = $(this).attr('idcm');
            $.ajax({
                url:'{{route('getallow')}}',
                datatype:'html',
                type:'get',
                data:{
                    id:id,
                }
            });
            $('.itemcomment').each(function(){
                if($(this).attr('idcm')==id)
                {
                    $(this).fadeOut();
                }
            });
        });
        $('.delete').click(function(){
            var id = $(this).attr('idcm');
            $('.itemcomment').each(function(){
                if($(this).attr('idcm')==id)
                {
                    $(this).fadeOut();
                }
            });
            $.ajax({
                url:'{{route('getdelete')}}',
                datatype:'html',
                type:'get',
                data:{
                    id:id,
                }
            });
        });
    });
</script>
@endsection