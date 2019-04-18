<?php
namespace App\Repositories\MDA;

use App\Mda;
use App\User;

class EloquentMdaRepository implements MdaContract
{
    public function create($requestData)
    {
        $newUser = new User;
        $newUser->name = $requestData['name'];
        $newUser->email = $requestData['email'];
        $newUser->user_type = "mda";
        $newUser->bank_name = $requestData['bank_name'];
        $newUser->bank_account = $requestData['bank_account'];
        $newUser->split_percentage = $requestData['split_percentage'];
        $newUser->password = bcrypt($requestData['password']);
        $newUser->save();

        $file = $requestData['profile_pic'];

        $filename = $file->getClientOriginalName();

        $destinationPath = 'uploads/';

        // This will store only the filename. Update with full path if you like

        $requestData['profile_pic'] = $filename; 
        $requestData['password'] = bcrypt($requestData['password']);
        $uploadSuccess = $file->move($destinationPath, $filename);

       return Mda::create($requestData);
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
            dd($e->getMessage());
            return false;
        } 
    }
    
}