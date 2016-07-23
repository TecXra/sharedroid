<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests;
use App\Message;
use App\User;
use App\Http\Controllers\Controller;

class ShareController extends Controller
{
    

// recieve id + token from primary user and upgate in 



public function upStream(Request $request)
{
	/*
	Requests\ContactRequest $request
		$user=User::findOrFail($request->id);
        $user->update($request->all());


        return "200";*/
	$user = User::findorFail($request->id);
	$user->update(array('token' => $request->token));
	$user->save();

return "$user";
}


public function index()
{
	return view('share.create');
}


public function store(Request $request)
{

$user = User::create($request->all());
$user->save();

return "$user";


}


// allow secondary send by primary,

public function allowStream(Request $request)
{
	
	$user = User::findorFail($request->id);
	$user->update(array('token' => $request->token));
	$user->save();

	return "$user";
}















  // recieve  third number + Message + through 
 //               'to_number'+'message'+'user_id'



public function downStream(Request $request)
{



$data = Message::create($request->all()); 

$data->save();

$udata=User::findOrFail($request->user_id);

return "$udata"."$data";







//$msg = Message::create($request->all());
//$msg->save();

//$m= Message::findorFail($msg->id);
//$user= SaUsers::findOrFail($m->user_id);

//return "$user $m";


//return "$user->message";





}




public function mindex()
{
	return view('share.mcreate');
}

















public function allcontacts()
{
	$user = User::all();
	//return 'ali';
 	return "$user";


}





public function tokenUpdate(Request $request)
{
	$user = User::findorFail($request->id);
	$user->update(array('token' => $request->token));
	$user->save();

//	return "$user";

}



public function SecondaryIdUpdate(Request $request)
{

	//	return "$request";


	$user = User::findorFail($request->id);
	$user->update(array('secondary_id' => $request->secondary_id));
	$user->save();

	return "$user";

}




public function SendMsgToPrimary(Requests\MessageRequest $request)
{
		

		$user = User::find($request->primary_id);	
		$token = $user->token;


		
   		$headers = ['Content-Type' => 'application/json',
       'Authorization' => 'key=AIzaSyA3LJ5StdqrfmIkJW44cu3v5SAFE8JkJSE'
    ];
       $client = new Client();

	   $r = $client->request('POST', 'https://gcm-http.googleapis.com/gcm/send',[
         'headers' => $headers ,
  		 'json' =>     [    'to'     => $token,
         'data'     =>     [    'messageBody' => $request->message,
                               'sendTo' => $request->to_number
                               ]
              ]
	]);


	   	$Conversation=Message::Create($request->all());
	   	$Conversation->check='s';
		$Conversation->save();








}






	public function storesendconversation(Requests\ContactRequest $request)
	{
		$user = User::find(1);	

		$token = $user->token;
   		$headers = ['Content-Type' => 'application/json',
       'Authorization' => 'key=AIzaSyA3LJ5StdqrfmIkJW44cu3v5SAFE8JkJSE'
   ];


       $client = new Client();

   $r = $client->request('POST', 'https://gcm-http.googleapis.com/gcm/send',[
         'headers' => $headers ,
  'json' =>     [    'to'     => $token,

                  'data'     =>     [    'messageBody' => $request->message,
                               'sendTo' => $request->phone_number
                               ]
              ]
]);

	//	dd($request);


//		$Conversation=Conversation::Create($request->all());
	//	$Contacts =Contact::Create($request->all());
	//	return view('pages.composer',compact('Contacts','Conversation'));
	




		$Conversation=Conversation::Create($request->all());
		$Conversation->user_id=$user->id;
		$Conversation->save();
		
		$composer = 'composer/' .$Conversation->user_id . '/' .  $Conversation->phone_number ;



		return redirect($composer);
	}









}
