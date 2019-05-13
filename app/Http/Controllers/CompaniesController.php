<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Companies;
use App\Mail\NewCompanyNotification;
use Illuminate\Support\Facades\Mail;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $companies = DB::table('companies')
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->simplePaginate(8);

        $data['companies'] = $companies;
        return view('companies.companies_index')->with($data);
    }

    public function companyProfile(Companies $company)
    {
        // get assets linked to the company
        $assets = DB::table('assets')
            ->where('company_id', $company->id)
            ->orderBy('created_at', 'DESC')
            ->simplePaginate(5);

        $data['assets'] = $assets;
        $data['company'] = $company;
        return view('companies.company_view')->with($data);
    }

    public function createCompony()
    {
        return view('companies.create_company');
    }

    public function addCompony(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'logo' => 'dimensions:min_width=100,min_height=100',
        ]);
        $SysData = $request->all();
        unset($SysData['_token']);

        $campony = new Companies();
        $campony->name = !empty($SysData['name']) ? $SysData['name'] : '';
        $campony->email = !empty($SysData['email']) ? $SysData['email'] : '';
        $campony->website_url = !empty($SysData['website_url']) ? $SysData['website_url'] : '';
        $campony->status = 1;
        $campony->save();

        //Upload Company logo
        if ($request->hasFile('logo')) {
            $fileExt = $request->file('logo')->extension();
            if (in_array($fileExt, ['jpg', 'jpeg', 'png']) && $request->file('logo')->isValid()) {
                $fileName = time() . "logo." . $fileExt;
                $request->file('logo')->storeAs('public/logos/images', $fileName);
                $campony->logo = $fileName;
                $campony->update();
            }
        }

        $name = $SysData['name'];
        $email = $SysData['email'];
        $website = $SysData['website_url'];

        //send mail
        Mail::to($SysData['email'])->send(new NewCompanyNotification($name, $email, $website));
        return redirect('/contacts/company/' . $campony->id . '/view')->with('success_add', "The company has been added successfully");
    }

    public function editcampony(Companies $company)
    {
        $data['company'] = $company;
        return view('companies.edit_company')->with($data);
    }

    public function editComponydetails(Request $request, Companies $company)
    {
        $this->validate($request, [
            'logo' => 'dimensions:min_width=100,min_height=100'
        ]);
        $SysData = $request->all();
        unset($SysData['_token']);

        $company->update($SysData);
        //Upload Company logo
        if ($request->hasFile('logo')) {
            $fileExt = $request->file('logo')->extension();
            if (in_array($fileExt, ['jpg', 'jpeg', 'png']) && $request->file('logo')->isValid()) {
                $fileName = time() . "logo." . $fileExt;
                $request->file('logo')->storeAs('public/logos/images', $fileName);
                $company->logo = $fileName;
                $company->update();
            }
        }

        return redirect('/viewassets/' . $company->id . '/list')->with('success_edit', "The company details have been successfully updated");

    }

    public function showCompany(Companies $company)
    {
        $data['company'] = $company;
        return view('companies.view_company')->with($data);
    }
}
