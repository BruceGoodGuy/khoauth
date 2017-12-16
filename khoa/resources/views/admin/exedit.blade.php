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
    </div>
    <div class="page-header">
    <h1>Sửa</h1>
    </div>
    <div class="container col-md-8">
        <form action="{{$list->id}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="ten">Tên: </label>
            <input type="text" name="ten" value="{{$list->ten}}" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="sb" value="Sửa" class="btn btn-success">
        </div>
        </form>
    </div>
    @if(session('success'))
    <div class=" row col-md-8 alert-success">
        {{session('success')}}
    </div>
    @endif
    @if(count($errors)>0)
    @foreach($errors -> all() as $errors)
    <div class=" row col-md-8 alert-danger">
        {{$errors}}
    </div>
    @endforeach
    @endif
</div>
@endsection