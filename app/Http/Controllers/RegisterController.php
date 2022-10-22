<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;

class RegisterController extends Controller
{
    public function create(){
        return view('register');
    }



    public function store(){
      $attributes = request()->validate([
            'name' =>['required','string'],
            'description' => ['required','string'],
            'switch' => 'boolean',
            'select' => ['required','string'],
            'fees' => ['']
        ]);
        
        $attributes['name']=ucfirst($attributes['name']);
        
        if($attributes['select']==1) {
            $attributes = request()->validate(['name' =>['required','string'],
            'description' => ['required','string'],
            'switch' => 'boolean',
            'select' => ['required','string'],
            'fees'=>'required|min:4']);
        }
         else {
            unset($attributes['fees']);
         };   

        Certificate::create($attributes);

        session()->flash('success','Your certificate has been created.');

        return redirect('/allcertificates');
    }


    
    public function update(Certificate $certificate){
      $attributes = request()->validate([
            'name' =>['required','string'],
            'description' => ['required','string'],
            'switch' => 'boolean',
            'select' => ['required','string'],
            'fees' => ['']
        ]);
       
        
        if($attributes['select']==1) {
            $attributes = request()->validate(['name' =>['required','string'],
            'description' => ['required','string'],
            'switch' => 'boolean',
            'select' => ['required','string'],
            'fees'=>'required|min:4']);
        }
     else {
        $attributes['fees'] = NULL;

     };   
    
     $attributes['name']=ucfirst($attributes['name']);
    
     
    
          $certificate->updateOrFail($attributes);
    
        return redirect('/allcertificates');

    }









        public function allcertificate()
        { 
            return view('allcertificates', [
               'certificates' => Certificate::orderBy('name')->get()
               
            
    
            ]);
        }


        public function destroy(Request $request)
        { 
            $certificate = Certificate::find($request->certificate_delete_id);
            $certificate->delete();
               
            
            return redirect('/allcertificates');
            
        }





        public function find(Certificate $certificate)
    { 
        return view('edit', [
            'certificate' => Certificate::find($certificate->id)
        ]);
    
    }


}
