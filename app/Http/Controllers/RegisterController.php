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
        
        $attributes['name']=ucwords($attributes['name']);
        
        if($attributes['select']==1) {
            $attributes = request()->validate(['fees'=>'required|float|min:4']);
        }
         else {
            unset($attributes['fees']);
         };   

        Certificate::create($attributes);
        return redirect('/');
    }


    
    public function update(){
      $attributes = request()->validate([
            'name' =>['required','string'],
            'description' => ['required','string'],
            'switch' => 'boolean',
            'select' => ['required','string'],
            'fees' => ['']
        ]);
        $attributes['name']=ucwords($attributes['name']);
        
    if($attributes['select']==1) {
        $attributes = request()->validate(['fees'=>'required|float|min:4']);
    }
     else {
        unset($attributes['fees']);
     };   
    
    
    
    
    
         $certificate->updateOrFail($attributes);
    
        return view ('/update');

    }









        public function allcertificate()
        { 
            return view('allcertificates', [
               'certificates' => Certificate::orderBy('name')->get()
               
            
    
            ]);
        }







        public function find(Certificate $certificate)
    { 
        return view('allCertificates', [
            'Certificate' => Certificate::find($certificate->id)
        ]);
    
    }
}
