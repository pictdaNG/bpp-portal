<?php
namespace App\Repositories\MDA;

use App\Mda;
use App\User;
use Mail;

class EloquentMdaRepository implements MdaContract
{
    public function create($requestData)
    {

        $newUser = new User;
        $newUser->name = $requestData['name'];
        $newUser->email = $requestData['email'];
        $newUser->user_type = "mda";
        $newUser->bank_name = $requestData['bank_name'];
        $newUser->bank_account_no = $requestData['bank_account'];
        $newUser->split_percentage = $requestData['split_percentage'];
        $newUser->password = bcrypt($requestData['password']);
        $newUser->website = $requestData['website'];
        $newUser->phone = $requestData['phone'];
        $newUser->profile_pic = $requestData['profile_pic']->getClientOriginalName();
        $newUser->address = $requestData['address'];

        $pass = $requestData['password'];

        $existing = User::where('email', $requestData['email'])->first();

        if(1 === preg_match('~[0-9]~', $requestData['name'])){
            return 'Invalid Name';
        }
     
        else if(strlen($requestData['phone']) != 11) {
            return 'Invalid Phone Number';
        }

        else if(strlen($requestData['bank_account']) != 10 ) {
            return 'Invalid Bank Account';
        }
        else if($requestData['split_percentage'] < 0 || $requestData['split_percentage'] > 100 ) {
            return 'Invalid Split Percent';
        }

        if($existing) {
            return 'Email Already Exist';
        }

        $newUser->save();

        $file = $requestData['profile_pic'];
        $filename = $file->getClientOriginalName();
        $destinationPath = 'uploads/';

        $requestData['profile_pic'] = $filename; 
        $requestData['password'] = bcrypt($requestData['password']);
        $uploadSuccess = $file->move($destinationPath, $filename);

       Mda::create($requestData);

       $data = array(
          'username' => $requestData['name'],
          'email' => $requestData['email'],
          'password' => $pass,
          'phone' => $requestData['phone'],
          // 'bodyMessage' => $pass,
        );

        Mail::send('emails.emailMda', $data, function($message) use ($data) {
          $message->from('edwardobande36@gmail.com');
          $message->to($data['email']);
          $message->subject("PLBPP Account details");
        });

       return 1;
    }
    
    public function find($id)
    {
       return Mda::find($id);
    }
    
    
    public function listMdas()
    {
        return Mda::paginate(15);
    }
    
    
    public function destroy($id)
    {
        $client = Mda::findorFail($id);
        return $client->delete();
    }
    
    public function update($id, $requestData)
    {
       return Mda::find($id)->update($requestData);
    }

    public function removeMda($request){ 
        try {
        //    dd($request);
            $data = $request['mda'];
            for($i=0; $i<sizeof($data); $i++){
                $tmp = Mda::find($data[$i]);
                $tmp->delete();
                
            }
            return true;

        }
        catch(\Exception $e){
            //dd($e->getMessage());
            return false;
        } 
    }

    private function sendEmail($user, $code) {
        try {
            Mail::send('emails.activation', [
                'user' => $user,
                'code' => $code
            ], function($message) use ($user) {
                $message->to($user->email);
                $message->subject("Hello $user->name,");
            });
        } catch (\Swift_TransportException $e) {
            return false;
        }
        
    }
    
}