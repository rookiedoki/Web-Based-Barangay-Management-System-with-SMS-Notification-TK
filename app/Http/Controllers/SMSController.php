<?php

namespace App\Http\Controllers;
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
            'contact_number' => 'required|array',
            'body' => 'required',
        ]);

        $recipients = $validatedData["contact_number"];
        // iterate over the array of recipients and send a twilio request for each
        foreach ($recipients as $recipient) {
            $this->sendMessage($validatedData["body"], $recipient);
        }
        return back()->with(['success' => "Messages on their way!"]);
    }

    public function show(){
        $users = SMSMessages::all(); //query db with model
        return view('admin.messages', compact("contact_number")); //return view with data
    }

    private function sendMessage($message, $recipients){
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");

        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients,
            ['from' => $twilio_number, 'body' => $message] );
    }

    public function sendSMS(Request $request)
    {
        if(request()->isMethod("post")){
            $to = "";
            $from = getenv("TWILIO_FROM");
            $message = 'Hello from Twilio!';

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERPWD, getenv("TWILIO_SID"). ':' .getenv("TWILIO_TOKEN"));
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_URL, sprintf('https://api.twilio.com/2010-04-01/Accounts/'.getenv("TWILIO_SID").
            '/Messages.json', getenv("TWILIO_SID")));
            curl_setopt($ch, CURLOPT_POST, 3);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'To='.$to.'&From='.$from.'$Body='.$message);
            





        }
        return view("");
        // try {

        //     $account_sid = getenv("TWILIO_SID");
        //     $auth_token = getenv("TWILIO_TOKEN");
        //     $twilio_number = getenv("TWILIO_FROM");

        //     $client = new Client($account_sid, $auth_token);
        //     $client->messages->create($request->contact_number, [
        //         'from' => $contact_number,
        //         'body' => $request->message]);

        //     return "Message Sent";

        // } catch (Exception $e) {
        //     return $e->getMessage();
        // }
    }
}
