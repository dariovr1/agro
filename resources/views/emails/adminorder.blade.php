<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Benvenuto su Agroambiente s.r.l</title>
        <style type="text/css">
        body {margin: 0; padding: 0; min-width: 100%!important;}
        .content {width: 100%;}  
        </style>
    </head>
    <body yahoo bgcolor="#f6f8f1">

    	<div>
    		<p>dettagli nuovo ordine:</p>
    	</div>

      <h1>Dettaglio acquisto:</h1>

            <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                   	<tr>
                   		<td>nome prodotto</td>
                   		<td>prezzo</td>
                   		<td>quantità</td>
                   		<td>subtotale</td>
                   	</tr>
                       @foreach( $data["carrello"] as $carrello )
                          <tr>
                       			<td>{{$carrello["name"]}}</td>
                       			<td>{{
                       				number_format((float)$carrello["price"], 2, ',', '.')
                       				}}</td>
                       			<td>{{$carrello["qty"]}}</td>
                       			<td>{{
                       				number_format((float)$carrello["price"] * $carrello["qty"], 2, ',', '.')
                       				}}</td>
                       	  </tr>
                       @endforeach
            </table>


            <h1>Anagrafica:</h1>


             <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td>nome</td>
                      <td>cognome</td>
                      <td>e-mail</td>
                      <td>telefono</td>
                    </tr>
                          <tr>
                            <td>{{ $data["user"]["nome"] }}</td>
                            <td>{{ $data["user"]["cognome"] }}</td>
                            <td>{{ $data["user"]["email"] }}</td>
                            <td>{{ $data["user"]["phone"] }}</td>
                          </tr>
            </table>




                <h1>Spedizione:</h1>


               
             <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td>nome</td>
                      <td>cognome</td>
                      <td>via</td>
                      <td>presso</td>
                      <td>cap</td>
                      <td>comune</td>
                      <td>provincia</td>
                    </tr>
                          <tr>
                            <td>{{$data["spedizione"]["nome"]}}</td>
                            <td>{{$data["spedizione"]["cognome"]}}</td>
                            <td>{{$data["spedizione"]["via"]}}</td>
                            <td>{{$data["spedizione"]["presso"] }}</td>
                            <td>{{$data["spedizione"]["cap"] }}</td>
                            <td>{{   renderIDOrder([
                                "key" => "comune",
                                "value" =>   $data["spedizione"]["comune"] 
                              ])

                            }}</td>
                            <td>{{
                              renderIDOrder([
                                "key" => "provincia",
                                "value" =>   $data["spedizione"]["provincia"] 
                              ])
                          }}</td>
                          </tr>
            </table>




    </body>
</html>