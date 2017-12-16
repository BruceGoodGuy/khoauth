@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
    <div class="row text-center pad-top">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{asset('/')}}admin/ex/add" >
                            <i class="fa fa-plus fa-5x"></i>
                            <h4>Thêm list</h4>
                            </a>
                        </div>
                    </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{asset('/')}}admin/ex/add" >
                            <i class="fa fa-plus fa-5x"></i>
                            <h4>Sửa bài</h4>
                            </a>
                        </div>
                    </div>
                     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{asset('/')}}admin/ex/addex" >
                            <i class="fa fa-plus fa-5x"></i>
                            <h4>Thêm bài</h4>
                            </a>
                        </div>
                    </div>
    </div>
    <div class="page-header">
    <h1>Danh sách các bài tập</h1>
    </div>
    <div class="container col-md-8">
    @foreach($list as $list)
    <a href="{{asset('/')}}admin/ex/edit/{{$list->id}}">
        <div class="alert alert-success">
            {{$list->ten}}
        </div>
        </a>
    @endforeach
    </div>
</div>
@endsection