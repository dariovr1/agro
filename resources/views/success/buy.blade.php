@extends("templates.success.master")


@section("content")
	<div class="jumbotron text-xs-center">
	  <h1 class="display-3">Acquisti Completati con successo!</h1>
	  <hr>
	  <p>Gentile Utente, Grazie per aver acquistato presso Agroambiente s.r.l</p>
	  <p>una e-mail di riepilogo è stata inoltrata a <b>{{$user->email}}</b> </p>
	</div>
@endsection