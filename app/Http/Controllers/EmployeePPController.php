<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeePPStoreRequest;
use App\Http\Requests\EmployeePPUpdateRequest;
use App\Models\EmployeePP;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeePPController extends Controller
{
    public function index(Request $request)
    {
        $employeePPs = EmployeePP::all();

        return view('employeePP.index', compact('employeePPs'));
    }

    public function create(Request $request)
    {
        return view('employeePP.create');
    }

    public function store(EmployeePPStoreRequest $request)
    {
        $employeePP = EmployeePP::create($request->validated());

        $request->session()->flash('employeePP.id', $employeePP->id);

        return redirect()->route('employee-pps.index');
    }

    public function show(Request $request, EmployeePP $employeePP)
    {
        return view('employeePP.show', compact('employeePP'));
    }

    public function edit(Request $request, $id)
    {
        $employeePP = EmployeePP::findorfail($id);
        //dd($employeePP);
        return view('employeePP.edit', compact('employeePP'));
    }

    public function update(EmployeePPUpdateRequest $request, EmployeePP $employeePP)
    {
        $employeePP->update($request->validated());

        $request->session()->flash('employeePP.id', $employeePP->id);

        return redirect()->route('employee-pps.index');
    }

    public function destroy(Request $request, EmployeePP $employeePP)
    {
        $employeePP->delete();

        return redirect()->route('employee-pps.index'); 
    }
}
