<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Benvenuto su Agroambiente s.r.l</title>
        <style type="text/css">
        body {margin: 0; padding: 0; min-width: 100%!important;}
        .content {width: 100%; max-width: 600px;}  
        </style>
    </head>
    <body yahoo bgcolor="#f6f8f1">
        <table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <p>benvenuto nuovo utente su Agroambiente</p>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>di seguito ecco i dati riportati in fase di iscrizione:</td>
                        </tr>
                            <tr>
                            @foreach($data as $key => $value) 
                                <td>{{$key}} : {{$value}}</td>
                            @endforeach
                            </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>