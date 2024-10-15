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
        
        // dd($employeePP);

        $employeePP = EmployeePP::findOrFail($request->id);

        // dd($employeePP);

        // Log the raw request data
        \Log::info('Raw request data:', $request->all());

        
        \Log::info('Validated data:', $request->validated());

        // $result = $employeePP->update($request->validated());

        $result = $employeePP->update([
            'employee_id' => $request->input('employee_id')
        ]);

        if (!$result) {
            return redirect()->back()->with('error', 'Failed to update employee.');
        }
        
        // Log the result and the model state
        \Log::info('Update result: ' . ($result ? 'success' : 'failure'));
        \Log::info('EmployeePP after update:', [
            'attributes' => $employeePP->getAttributes(),
        'original' => $employeePP->getOriginal(),
        'changes' => $employeePP->getChanges(),
    ]);

        $request->session()->flash('employeePP.id', $employeePP->id);

        //dd('Point 1: Before redirect attempt');

        $redirectResponse = redirect()->route('dashboard');

        // dd('Point 2: After redirect creation');

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request, EmployeePP $employeePP)
    {
        $employeePP->delete();

        return redirect()->route('employee-pps.index'); 
    }
}
