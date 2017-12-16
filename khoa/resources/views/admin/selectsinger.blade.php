@extends('template.adminTemplate')
@section('content')
     <div id="page-inner">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cảnh báo</h4>
        </div>
        <div class="modal-body">
          <p>Bạn thật sự muốn xóa ca sỹ {{$singer -> name}}?</p>
        </div>
        <div class="modal-footer">
        <button id="xoa" type="button" class="btn btn-success">Đúng</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
               <div class="row">
                  <div class="col-lg-12">
                     <h2> Trang Quản Trị Website</h2>
                  </div>
               </div>
                 <hr />
               <div class="row">
                  <div class="col-lg-12 ">
                     <div class="alert alert-info">
                        <strong>Ca sĩ: {{$singer -> name}}</strong>
                     </div>
                  </div>
               </div>
               <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                     <div class="div-square">
                        <a href="{{asset('/')}}admin/music/editsinger/{{$singer->id}}" >
                           <i class="fa fa-pencil-square-o  fa-5x"></i>
                           <h4>Sửa</h4>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                     <div class="div-square">
                        <a href="#" id="myBtn">
                           <i class="fa fa-times fa-5x"></i>
                           <h4>Xóa</h4>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                    <div class="page-header">
                        <h3>{{$singer->name}}</h3>
                    </div>
                      <img src="{{asset('/')}}public/image/avatarSinger/{{$singer->image}}" alt="{{$singer->name}}" class="img-thumbnail">  
                    </br>
                    </br>
                    <blockquote>
                    <p>{{$singer->bio}}</p>
                    </blockquote>
                  </div>
                </div>
    </div>
   <script>
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
        $('#xoa').click(function(){
          location.href="{{asset('/')}}admin/music/deletesinger/{{$singer->id}}";
        });
    });
    </script>
@endsection