	@extends("template.indexTemplate")
	@section('content')
	@include("module.headerIndex")
	<div id="coverAll">
		<div id="containBox">
			@include("module.indexBoxMusic")
			@include("module.indexBoxNewWord")
			@include("module.indexBoxToeic")
		</div>
	</div>
	@endsection