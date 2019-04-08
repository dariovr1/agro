@extends("templates.success.master")


@section("content")
	<div class="jumbotron text-xs-center">
	  <h1 class="display-3">Gentile Utente, Grazie per aver acquistato presso Agroambiente s.r.l!</h1>
	  <hr>
	  <p>una e-mail di riepilogo è stata inoltrata a {{$user->email}} </p>
	</div>
	@endif
@endsection