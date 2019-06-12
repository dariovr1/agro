<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <body>
    	@if ($data["status"] == 0)
       <p>il prodotto con codice {{$data["codice"]}} è stato aggiornato.</p>
       <p>Le sue unità disponibili sono passati da {{$data["aqty"]}} a {{$data["qty"]}}</p>
       @endif

       @if($data["status"] == 1)
       	  <p>il prodotto con codice {{$data["codice"]}} non è stato aggiornato. il prodotto non è disponibile (0)</p>
       @endif
    </body>
</html>