@extends("templates.success.master")


@section("content")
	@if ($exist)
	<div class="jumbotron text-xs-center">
	  <h1 class="display-3">Gentile Utente, Grazie per la conferma!</h1>
	  <p class="lead">la tua e-mail {{$mail}} è stata confermata.</p>
	  <hr>
	  <p>
	   Hai riscontrato Problematiche? <a href="/contatti">Contattaci</a>
	  </p>
	  <p class="lead">
	    <a class="btn btn-primary btn-sm" href="{{ url("/") }}" role="button">Torna alla Homepage</a>
	  </p>
	</div>
	@else
		<div class="jumbotron text-xs-center">
	  <h1 class="display-3">Gentile Utente, La tua e-mail non è stata verificata.</h1>
	  <p class="lead">si è verificato un errore durante l'elaborazione. Riprova o contattaci.</p>
	  <hr>
	  <p>
	   Hai riscontrato Problematiche? <a href="/contatti">Contattaci</a>
	  </p>
	  <p class="lead">
	    <a class="btn btn-primary btn-sm" href="{{ url("/") }}" role="button">Torna alla Homepage</a>
	  </p>
	</div>
	@endif
@endsection