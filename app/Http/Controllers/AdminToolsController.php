<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compliance;
use Response;

class AdminToolsController extends Controller
{
    public function compliance() {
        $data = Compliance::orderBy('id', 'DESC')->get();
        return view('admin.tools.compliance_settings')->with('data', $data);
    }

    public function postCompliances(Request $request) {
        $data = Compliance::create($request->all());
        // return Response::json($data);
        return redirect()->back()->with('success', 'Created successfully');
    }

    public function delete($id){
        $data = Compliance::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'ownership structure was deleted successfully!');
    }

    public function edit($id){
        $data = Compliance::find($id); 
        return view('backend.events.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
            $this->validate(request(),[
              'ownership_structure' => 'required',
            ]);

            $data = Compliance::find($id);
            $data->ownership_structure = $request->ownership_structure;
            $data->save();
            
            // return redirect()->route('Thoughtterm');

    }
}
