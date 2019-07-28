@extends("templates.master")

@section("content")
	<div class="container">
		<div class="box">
			<h1>{{$name}}</h1>
			<div class="row">
	                @foreach($productcategorie as $prodcat)
	                <div class="col-md-4">
	                  <div class="product--categories">
	                    <div class="text">
	                    	<br/>
	                      <img src="http://ecommerce2.sabaservice.com/images/home_page/classi/{{$prodcat->img}}" class="img-responsive" />
	                      <h3 style="text-align: center;"><a href="/subcat/{{$prodcat->id}}">{{ $prodcat->name}}</a></h3>
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