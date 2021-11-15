<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
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
        // dd($request);
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'required|max:2048',
            'email' => 'required|max:255',
            'sector' => 'required',
            'website' => 'required|max:55',
            'phone' => 'required|max:15',
            'facebook' => 'required|max:45',
            'linkedin' => 'required|max:55',
            'rating' => 'required',

        ]);

        $input = $request->all();
        if($request->hasFile('logo')) {
           $destination_path = 'public/images/logos';
           $logo = $request->file('logo');
           $logo_name =$request->name.'logo'.'_'.time();
           $path = $request->file('logo')->storeAs($destination_path, $logo_name);
           $input['logo'] = $logo_name;
        }

        $company = Company::create($input);
        return redirect('/companies')->with('completed', 'Company has been saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company = Company::findOrFail($company->id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::findOrFail($company->id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'required|max:2048',
            'email' => 'required|max:255',
            'sector' => 'required',
            'website' => 'required|max:55',
            'phone' => 'required|max:15',
            'facebook' => 'required|max:45',
            'linkedin' => 'required|max:55',
            'rating' => 'required',

        ]);

        $input = $request->all();
        if($request->hasFile('logo')) {
           $destination_path = 'public/images/logos';
           $logo = $request->file('logo');
           $logo_name =$request->name.'logo'.'_'.time();
           $path = $request->file('logo')->storeAs($destination_path, $logo_name);
           $input['logo'] = $logo_name;
        }else{

            unset($input['logo']) ;
        }
        Company::whereId($company->id)->update($input);
        return redirect('/companies')->with('completed', 'company has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company = Company::findOrFail($company->id);
        $company->delete();

        return redirect('/companies')->with('completed', 'company has been deleted');

    }
}
