<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $patient;
    protected $record;

    public function __construct()
    {
        $this->patient=new Patient();
        $this->record=new Visit();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response['patients']=$this->patient->all();
        return view('admin.adminindex')->with($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admin=Auth::guard('admin')->user();
        $data=[
            'name'=>$request->name,
            'age'=>$request->age,
            'address'=>$request->address,
            'ward'=>$request->ward,
            'bed'=>$request->bed,
            'createdby'=>$admin->name,
            'admitedon'=>$request->admitedon,
        ];
        $this->patient->create($data);
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response['patient']=$this->patient->find($id);
        return view('admin.view')->with($response);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response['patient']=$this->patient->find($id);
        return view('admin.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient=$this->patient->find($id);
        $patient->update($request->all());
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient=$this->patient->find($id);
        $patient->delete();
        return redirect()->route('admin.index');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.loginform');
    }
    /**
     * Functions for visit records are going here
     */

    public function visitindex($id){
        $response['patient']=$this->patient->find($id);
        $response['records']=$this->record->where('patientid',$id)->get();
        return view('admin.recordindex')->with($response);
    }

    public function visitstore(Request $request){
        $patientid = $request->patientid;
        $patientstatus = $this->patient->where('id', $patientid)->first()->status;
        if ($patientstatus== "Discharged") {
            return redirect()->back()->with('error','Patient is already discharged');
        }
        else{
            $admin = Auth::guard('admin')->user();
            $data = [
                'patientid' => $request->patientid,
                'visit' => $request->visit,
                'visitdate' => $request->visitdate,
                'numbervisitors' => $request->numbervisitors,
                'contactnumber' => $request->contactnumber,
                'visitedby' => $request->visitedby,
                'recordby' => $admin->name,
            ];
            $this->record->create($data);
            return redirect()->back();
        }



    }
}
