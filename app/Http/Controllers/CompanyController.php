<?php

namespace App\Http\Controllers;
use App\Models\Company;
// need this before using models
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index(){
        // this is the good practice
        // we want to pass the variables from controller to names
        // aku try
        $address = "Invoke Address cbs";
        $tac = 123;

        $companies = Company::get();
        $companies = Company::paginate(10);

        return view('companies',["address"=>$address,
        "tac"=>$tac,
        "companies"=>$companies]);

        // zahin version
        // $address = "INVOKE address";
        // $companies = Company::get();
        // // query builder
        // // type in url ?page=2
        // $companies = Company::paginate(10);
        // // dd($companies);

        // return view('companies', 
        // ["address"=> $address,
        // "companies"=> $companies]);

        // return view('companies',compact($address,$companies)); //another method, x perlu define keys
    }
    
    public function edit(Request $request){
        // return $request->id; to get the parameter
        $status="";
        $company = Company::where("id",$request->id)->first();
        $company = Company::whereId($request->id)->first();

        if(isset($request->name)){
            $company->name =$request->name;
            $company->save();
            $status="Record $company->id updated";
            return redirect('company/edit/'.$company->id)
            ->with('status',$status);
        }

        return view('company.edit',[
            "company"=>$company
        ]); // we use . instead of / for folder directory in laravel

    }
}
