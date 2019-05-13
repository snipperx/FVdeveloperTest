<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Companies;
use App\Assets;

class AssetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $assets = DB::table('assets')
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->simplePaginate(8);

        $data['assets'] = $assets;
        return view('assets.asset')->with($data);
    }

    public function createAsset()
    {
        $compony = Companies::where('status', 1)->get();
        $data['compony'] = $compony;
        return view('assets.create_asset')->with($data);
    }

    public function addAsset(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'company_id' => 'required',
            'amount' => 'required',
        ]);
        $SysData = $request->all();
        unset($SysData['_token']);
        //format money
        $amount = $SysData['amount'] = str_replace(',', '', $SysData['amount']);
        $amount = $SysData['amount'] = str_replace('. 00', '', $SysData['amount']);

        $asset = new Assets();
        $asset->name = !empty($SysData['name']) ? $SysData['name'] : '';
        $asset->description = !empty($SysData['description']) ? $SysData['description'] : '';
        $asset->model = !empty($SysData['model']) ? $SysData['model'] : '';
        $asset->amount = $amount;
        !empty($amount) ? $amount : 0;
        $asset->company_id = !empty($SysData['company_id']) ? $SysData['company_id'] : 1;
        $asset->status = 1;
        $asset->save();

        //return back();
        return redirect('/contacts/assets/' . $asset->id . '/view')->with('success_add', "The Asset has been added successfully");
    }

    public function showAsset(Assets $assets)
    {
        $Asset = DB::table('assets')
            ->select('assets.*', 'companies.name as companyName')
            ->leftJoin('companies', 'assets.company_id', '=', 'companies.id')
            ->where('assets.id', $assets->id)
            ->orderBy('assets.id')
            ->first();

        $data['Asset'] = $Asset;
        return view('assets.view_asset')->with($data);
    }

    public function showcampony(Assets $assets)
    {
        $company = Companies::where('id', $assets->id)->first();
       // return $company;
        $data['company'] = $company;
        return view('companies.view_company')->with($data);
    }
}
