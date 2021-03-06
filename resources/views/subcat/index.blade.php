@extends("templates.master")

@section("content")
  <div class="container">
    <div class="box">
      <h1>{{$name}}</h1>
      <div class="row">
                  @foreach($data as $d)
                  <div class="col-md-4">
                    <div class="product--categories">
                      <div class="text">
                        <br/>
                        <img src="{{$d->imgurl.$d->img}}" class="img-responsive" />
                        <h3 style="text-align: center;"><a href="/subcat/{{$d->id}}/productlist">{{ $d->name}}</a></h3>
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