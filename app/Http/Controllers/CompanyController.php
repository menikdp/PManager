<?php

namespace App\Http\Controllers;

use App\Http\Models\Company;
use Illuminate\Http\Request;
use Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all companies that relates to user id
        if (Auth::check()) {
            $companies = Company::where('user_id', Auth::user()->id)->get();

            return view('companies.index', ['companies'=>$companies]);
        }
        
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //save data
        if (Auth::check()) {
            $company = Company::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id
            ]);
            
            //if sucecess, sent flash and redirect to company page
            if ($company) {
                return redirect()->route('companies.show', ['company'=>$company->id])->with('success', 'Company added successfully');
            }  
        }

        return back()->withInput()->with('error', 'Error creating company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //retrieve one data
        $company = Company::find($company->id);

        return view('companies.show', ['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //retrieve one data
        $company = Company::find($company->id);
        
        return view('companies.edit', ['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //save data
        $companyUpdate = Company::where('id', $company->id)->update([
                            'name'=>$request->input('name'),
                            'description'=>$request->input('description')
                        ]);
        if ($companyUpdate) {
            return redirect()->route('companies.show', ['company'=>$company->id])->with('success', 'Company update successfully');
        }
        //redirect
        return back()->withInput()->with('error', 'Company could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $findCompany = Company::find($company->id);
        if ($findCompany->delete()) {
            return redirect()->route('companies.index')->with('success', 'Company delete successfully');
        }

        return back()->withInput()->with('error', 'Company could not be delete');
    }
}
