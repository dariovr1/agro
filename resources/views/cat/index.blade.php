@extends("templates.master")

@section("content")
	<div class="container">
		@include("components.bc",
		[
			"elem" => $nome
		])

		<div class="box">
			<h1>{{$nome}}</h1>
			<div class="row">
	                <br/>
	                @foreach($subcat as $sub)
	                <div class="col-lg-4 col-md-6">
	                  <div class="product">
	                    <div class="text">
	                    	<br/>
	                      <h3 style="text-align: center;"><a href="/subcat/{{$sub->id}}">{{ $sub->nome}}</a></h3>
	                    </div>
	                    <!-- /.text-->
	                  </div>
	                  <!-- /.product            -->
	                </div>
	                @endforeach

	        </div>
       </div>
	</div>
@endsection