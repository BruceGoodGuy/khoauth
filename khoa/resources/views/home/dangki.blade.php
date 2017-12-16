	@extends("template.indexTemplate")
    @include("module.headerIndex")
	@section('content')
        <div id="coverAll">
		    <div id="containBox">
                <div class="containLogin">
                    <h3>Đăng Kí</h3>
                    @if(count($errors)>0)
                        @foreach($errors->all() as $errors)
                            <div class="error">{{$errors}}</div>
                        @endforeach
                    @endif
                    @if(session('error'))
                        <div class="error">{{session('error')}}</div>
                    @endif
                    <form action="{{route('dangki')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input class="form-control" type="text" name="username" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="username">Email:</label>
                            <input class="form-control" type="email" name="email" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input class="form-control" type="password" name="password" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="password">Repassword:</label>
                            <input class="form-control" type="password" name="repassword" placeholder="">
                        </div>
                        <button type="submit" class="btndn">Đăng Kí
						</button>
                            <a style="margin-right:50px; float:right" href="{{asset('/')}}dangnhap">Đã có tài khoản</a>
                    </form>
                </div>
            </div>
        </div>
    @endsection