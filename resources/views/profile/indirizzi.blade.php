@extends("templates.profile.master")

@section("sidebar")
	@foreach(App\User::find(Auth::id())->supplements as $indirizzo)

  <div class="panel-box ">
        <div class="panel-box__item">

              <ul>
               <li> <span class="address__name">{{ $indirizzo->nominativo }}</span></li>
               <li>
                <span class="address__label">via {{ $indirizzo->via }} 
                  {{$indirizzo->cap}} - {{$indirizzo->prov->provincia}} / {{$indirizzo->citie->comune}}<br>
                </span>
              </li>
              <li>
                    <a href="#" class="btn btn-default" role="button" aria-disabled="true">Elimina</a>
              </li>
              </ul>
        </div>
  </div>
  @endforeach
@endsection

@section("content")

	<form method="POST" action="{{ url()->current() }}/create">
      @csrf

      @include('components.errors')

      @include('components.success')


		 @include('components.input',[
        "elem" => "nominativo",
        "required" => "required"
      ])

   @include('components.input',[
        "elem" => "presso"
      ])


           <div class="form-group row">

           		<div class="col-md-8">
                  @include('components.input',[
                        "elem" => "via",
                        "required" => "required"
                      ])
                 </div>

                 <div class="col-md-4">

                    @include('components.input',[
                        "elem" => "cap",
                        "required" => "required"
                      ])

                 </div>
          </div>


           @include('components.select',[
                "name" => "comune",
                "elems" => App\Citie::orderBy('comune')->get(),
                "id" => "id",
                "field" => "comune",
                "required" => "required"
              ])

         @include('components.select',[
                "name" => "provincia",
                "elems" => App\Prov::orderBy('provincia')->get(),
                "id" => "id",
                "field" => "provincia",
                "required" => "required"
              ])



          	<button class="btn btn-primary">Inserisci Indirizzo</button>

	</form>
@endsection