@extends("templates.success.master")


@section("content")
	<div class="jumbotron text-xs-center">
	  <h1 class="display-3">Acquisto Completato con successo!</h1>
	  <hr>
	  <p>Gentile {{ $user[0]["nome"] }} {{ $user[0]["cognome"] }}, Grazie per aver acquistato presso Agroambiente s.r.l</p>
	  <p>una e-mail di riepilogo è stata inoltrata a <b>{{$user[0]["email"]}}</b> </p>
	</div>
@endsection