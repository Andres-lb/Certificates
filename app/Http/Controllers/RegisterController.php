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
        return redirect('/');
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


        public function destroy(Certificate $certificate)
        { 
            $certificate->delete();
               
            return back()->with('success','Certificate Deleted');
    
            
        }





        public function find(Certificate $certificate)
    { 
        return view('edit', [
            'certificate' => Certificate::find($certificate->id)
        ]);
    
    }


}
