<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Http\Requests\StorePayrollRequest;
use App\Http\Requests\UpdatePayrollRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class PayrollController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payrolls.index', ['payrolls' => Payroll::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Redirector
     */
    public function store(Request $request)
    {
        //Get uswer
        $user = User::find($request->get('user_id'));

        //Create new Payroll
        $payroll = new Payroll();
        //Assign user id
        $payroll->user_id = $user->id;

        //Get hours worked
        $hours = $user->hours_worked;
        $bonus = 0;

        //Check if worked hours is greater than 90
        if ($hours > 90){
            $hours += ($hours - 90) * 0.10;
            if ($hours > 100){
                //If it is greater than 100 hours add a bonus
                $bonus = 100000;
            }
        }

        $payroll->total_paid = ($hours * $user->category->value) + $bonus;

        $payroll->save();
        return redirect('/payrolls');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePayrollRequest  $request
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayrollRequest $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll)
    {
        //
    }
}
