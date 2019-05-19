<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <body>
       <p>questo è il riepilogo degli oggetti sotto le 3 unità. Pregasi prestare attenzione (di seguito segnate in grassetto gli elementi a 0):</p>
       @foreach( $data as $product )
       		@if ($product["qty"] == 0) 
       		<p><b>{{$product["codice"]}} : totale {{$product["qty"]}} unità disponibili</b></p>
       		@else
       		<p>{{$product["codice"]}} : totale {{$product["qty"]}} unità disponibili</p>
       		@endif
       @endforeach
    </body>
</html>