<?php 

namespace App\Services;

use Mail;

class mailService {

	public function SendEmail($view,$data,$to,$subject){
		Mail::send($view, $data, function ($message) use ($data) {
                    $message->from('info@agroambientesrl.com', 'Info Agroambiente')
                    ->to($to)
                    ->subject($subject);

                });
	}

}