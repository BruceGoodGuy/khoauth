@extends('template.adminTemplate')
@section('content')
     <div id="page-inner">
               <div class="row">
                  <div class="col-lg-12">
                     <h2> Trang Quản Trị Website</h2>
                  </div>
               </div>
                 <hr />
               <div class="row">
                  <div class="col-lg-12 ">
                     <div class="alert alert-info">
                        <strong>Quản lý Nhạc</strong>
                     </div>
                  </div>
               </div>
               <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                     <div class="div-square">
                        <a href="{{asset('/')}}admin/music" >
                           <i class="fa fa-bars  fa-5x"></i>
                           <h4>Danh sách nhạc</h4>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                     <div class="div-square">
                        <a href="{{asset('/')}}admin/music/addsong" >
                           <i class="fa fa-plus fa-5x"></i>
                           <h4>Thêm nhạc</h4>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                     <div class="div-square">
                        <a href="{{asset('/')}}admin/singer" >
                           <i class="fa fa-bars  fa-5x"></i>
                           <h4>Danh sách ca sĩ</h4>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                     <div class="div-square">
                        <a href="{{asset('/')}}admin/music/makesubtxt" >
                           <i class="fa fa-bars  fa-5x"></i>
                           <h4>Tạo File sub txt</h4>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                    <div class="page-header">
                        <h3>Danh sách Nhạc</h3>
                    </div>
                    @foreach($music as $key => $value)
                        <a href="{{asset('/')}}admin/music/edit/{{$value->id}}" title="{{$value->song}}">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {{++$key}}, {{$value->song}}
                            </div>
                        </div>
                        </a>
                    @endforeach
                  </div>
                </div>
    </div>
@endsection