<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Companie;
use App\Employee;
use Illuminate\Http\Request;

class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companie::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'logo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'site' => 'required'
        ]);
        
        $name = $request->get('name');
        $email = $request->get('email');
        $logo = $request->file('logo');
        $site = $request->get('site');
        
        $nameLogo = uniqid(date('HisYmd'));

        $extension = $request->logo->extension();

        $nameFileStored = "{$nameLogo}.{$extension}";

        $upload = $request->logo->storeAs('logos', $nameFileStored);

        if(!$upload)
            return redirect()->back()->with('error', 'Error ao fazer upload da imagem.')->withInput();


        $companie = new Companie([
            'name' => $name,
            'email' => $email,
            'logo' => $nameFileStored,
            'site' => $site,            
        ]);


        $companie->save();
        return redirect('/companies')->with('success', 'Empresa adicionada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function show(Companie $companie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companie = Companie::find($id);
        return view('companies.edit', compact('companie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->hasFile('newLogo'))
        {
            Storage::disk('public')->delete('logos/$companie->logo');
            $logo = $request->file('newLogo');
            $nameLogo = uniqid(date('HisYmd'));
            $extension = $request->newLogo->extension();
            $nameFileStored = "{$nameLogo}.{$extension}";
            $upload = $request->newLogo->storeAs('logos', $nameFileStored);

            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'site' => 'required'
            ]);
    
            $companie = Companie::find($id);
    
            $companie->name = $request->get('name');
            $companie->email = $request->get('email');
            $companie->logo = $nameFileStored;
            $companie->site = $request->get('site');
            $companie->save();
    
            return redirect('/companies')->with('success', 'Empresa atualizada com sucesso.');
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'site' => 'required'
            ]);
    
            $companie = Companie::find($id);
    
            $companie->name = $request->get('name');
            $companie->email = $request->get('email');
            $companie->logo = $companie->logo;
            $companie->site = $request->get('site');
            $companie->save();
    
            return redirect('/companies')->with('success', 'Empresa atualizada com sucesso.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companie = Companie::find($id);
        $companie->delete();
        return redirect('/companies')->with('success', 'Empresa excluída com sucesso.');
    }
}
