<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CertificateController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('allcertificates', [
            'certificates' => Certificate::orderBy('name')->get() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCertificateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificateRequest $request)
    {
        $attributes = request(['name','description','Is_published','awarding','fees']);
        $attributes['name']=ucfirst($attributes['name']);
        Certificate::create($attributes);
        session()->flash('success','Your certificate has been created.');
        return redirect('/certificates');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        return view('edit', [
            'certificate' => Certificate::find($certificate->id)
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCertificateRequest  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        $attributes = request(['name','description','Is_published','awarding','fees']);
        $attributes['name']=ucfirst($attributes['name']);
        if($attributes['awarding']==1)
        {
          $attributes['fees'] = $attributes['fees'];
        }else{ $attributes['fees'] = null;}
        $certificate->updateOrFail($attributes);
        return redirect('/certificates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect('/certificates');
    }
}
