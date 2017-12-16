@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
    <div class="container col-md-8 content-justify-center">
        <div class="display">
            <h3>Thêm bài hát:</h3>
        </div>
         @if(!session('step'))
        <div class="row">
            <div class="page-header">
            <h3>Bước 1 </h3>
            </div>
            <form action="{{asset('/')}}admin/music/addsong" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="song">Tên bài hát</label>
                <input id="song" type="text" name="tenbaihat" class="form-control song" placeholder="Tên bài hát">
            </div>
            <div class="form-group">
                <label for="cover">Hình cover</label>
                <input id="cover" type="file" name="cover" class="form-control">
            </div>
            <div class="form-group">
                <label for="type">Loại bài</label>
                <select id="type" name="type" class="form-control type">
                    <option value="1">Giọng Nam</option>
                    <option value="2">Giọng Nữ</option>
                    <option value="3">Song Ca</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" id="next" class="btn btn-success">Next</button>
            </div>
            </form>
        </div>
        @endif 
        @if(session('step')==2)
        <div class="row">
            <div class="page-header">
            <h3>Bước 2 </h3>
            </div>
            <form action="{{asset('/')}}admin/music/addsong2" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <p>Chọn ca sĩ</p>
                <div class="form-group showcs">
                   
                </div>
                <div class="form-group">
                    <input type="text" name="searchcs" id="searcs" class="form-control" placeholder="Nhập tên ca sĩ">
                </div>
                <div class="list-group">
                @foreach($singer as $singer)
                <a set="0" href="javascript:void(0)" idsinger="{{$singer->id}}" id="selectsg" class="list-group-item">{{$singer->name}}</a>
                @endforeach
                </div>
            </div>
            </div>
            <div class="form-group">
                <button type="submit" id="next" class="btn btn-success">Next</button>
            </div>
            </form>
        </div>
        @endif
         @if(session('step')==3)  
          <div class="row">
            <div class="page-header">
            <h3>Bước 3 </h3>
            </div>
            <form action="{{asset('/')}}admin/music/addsong3" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="lyricEng"> Lời anh: </label>
                <textarea id="lyric" name="lyeng">
                </textarea>
            </div>
             <div class="form-group">
                <label for="lyricEng"> Lời việt: </label>
                <textarea id="lyric1" name="lyvie">
                </textarea>
            </div>
            <div class="form-group">
                <button type="submit" id="next" class="btn btn-success">Next</button>
            </div>
            <script>
                CKEDITOR.replace( 'lyric' );
                CKEDITOR.replace( 'lyric1' );
            </script>
        </div> 
        @endif  
         @if(session('step')==4) 
         <div class="row">
            <div class="page-header">
            <h3>Bước 4 </h3>
            </div>
            <form action="{{asset('/')}}admin/music/addsong4" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="lyricEng"> MV </label>
                <input type="file" name="mv" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" id="next" class="btn btn-success">Next</button>
            </div>
        </div> 
         @endif    
       @if(session('step')==5)
         <div class="row">
            <div class="page-header">
            <h3>Bước 5: Tạo file text </h3>
            </div>
            <form action="{{asset('/')}}admin/music/addsong5" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="form-group col-md-2">
                <input type="text" name="time1" class="form-control" placeholder="Time">
                </div>
                <div class="form-group col-md-5">
                <input type="text" name="eng1" class="form-control" placeholder="Lời anh">
                </div>
                <div class="form-group col-md-5">
                <input type="text" name="vie1" class="form-control" placeholder="Lời Việt">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                <input type="text" name="time2" class="form-control" placeholder="Time">
                </div>
                <div class="form-group col-md-5">
                <input type="text" name="eng2" class="form-control" placeholder="Lời anh">
                </div>
                <div class="form-group col-md-5">
                <input type="text" name="vie2" class="form-control" placeholder="Lời Việt">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                <input type="text" name="time3" class="form-control" placeholder="Time">
                </div>
                <div class="form-group col-md-5">
                <input type="text" name="eng3" class="form-control" placeholder="Lời anh">
                </div>
                <div class="form-group col-md-5">
                <input type="text" name="vie3" class="form-control" placeholder="Lời Việt">
                </div>
            </div>
            <div class="kq">
            </div>
            <div class="form-group">
                <button type="button" id="more" class="btn btn-primary">Thêm dòng</button>
                <button type="submit" id="next" class="btn btn-success">Next</button>
            </div>
        </div> 
     @endif   
       @if(session('step')==6) 
     <div class="row">
            <div class="page-header">
            <h3>Bước 6: Thêm file SRC </h3>
            </div>
            <form action="{{asset('/')}}admin/music/addsong6" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="srceng">SRC ENG</label>
                    <input type="file" name="srceng" class="form-control">
                </div>
                <div class="form-group">
                    <label for="srcvie">SRC VIE</label>
                    <input type="file" name="srcvie" class="form-control">
                </div>
                <div class="form-group">
                <button type="submit" id="next" class="btn btn-success">Next</button>
            </div>
    </div>
   @endif  
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.list-group-item').click(function(){
            var casi = $(this).text();
            var here = $(this).attr('set');
            var id=$(this).attr('idsinger');
            $.ajax({
                url:"{{route('getcs')}}",
                type:'get',
                datatype:'html',
                data:{
                    casi:id
                }
            }).done(function(data){
                $('.khoa').html(data);
            });
            if(here==0)
            {
                 $(this).addClass('active');
                $(".showcs").append("<div id='singerhere' set='"+here+"' singer='"+casi+"' class='alert alert-success col-md-3 singerhere' style='margin-right:5px;cursor:pointer'>"+casi+"</div>");
                $(this).attr('set',1);
            }
            else
            {
                $('.singerhere').each(function(){
                    if($(this).attr('singer')==casi)
                    {
                        $(this).fadeOut();
                    }
                });
                 $(this).attr('set',0);
                 $(this).removeClass('active');
            }
        });
        var dem = 3;
        $('#more').click(function(){
            dem ++;
            $.ajax({
                url:"{{route('getmore')}}",
                type:'get',
                datatype:'html',
                data:{
                    dem:dem,
                }
            }).done(function(data){
                $('.kq').append(data);
            });
        });
        $('#up').click(function(){
            location.href="{{route('upsong')}}";
        });
    });
</script>
@endsection