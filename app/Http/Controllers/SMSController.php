<?php

namespace App\Http\Controllers\AdminSide;
use App\Http\Controllers\Controller;
use App\Models\SMSMessages;
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;

class SMSController extends Controller
{
    public function storePhoneNumber(Request $request){
        //run validation on data sent in
        $validatedData = $request->validate([
        'phone_number' => 'required|unique:smsmessages|numeric',
        ]);

        $user_phone_number_model = new SMSMessages($request->all());
        $user_phone_number_model->save();
        $this->sendMessage('User registration successful!!', $request->phone_number);
        return back()->with(['success' => "{$request->phone_number} registered"]);
    }

    public function sendCustomMessage(Request $request){
        $validatedData = $request->validate([
            'users' => 'required|array',
            'body' => 'required',
        ]);

        $recipients = $validatedData["users"];
        // iterate over the array of recipients and send a twilio request for each
        foreach ($recipients as $recipient) {
            $this->sendMessage($validatedData["body"], $recipient);
        }
        return back()->with(['success' => "Messages on their way!"]);
    }

    public function show(){
        $users = SMSMessages::all(); //query db with model
        return view('admin.messages', compact("users")); //return view with data
    }

    private function sendMessage($message, $recipients){
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");

        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients,
            ['from' => $twilio_number, 'body' => $message] );
    }
}
