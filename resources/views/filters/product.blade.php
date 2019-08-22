@extends("templates.master")

@section("content")

		@include("components.productlist.productlist",[
				"products" => $products
			]);
	
@endsection