<?php 
return [ 
'client_id' => env('PAYPAL_CLIENT_ID','AWBrXoaJKAFJPQDLNvlotaespBK38WaIdSldnw7LmY4AOe1NEqAT09umSlcZE8gG-qB2zbjzhj_UBk62'),
    'secret' => env('PAYPAL_SECRET','EL2v96XqBP7mRnZa8L9os3giYpRdXk1cohzKDBzKfDFhMHpE5yi25za_GH0hkDpzBju_SQl6CIpgX7ua'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];