<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Plan\StorePlanRequest;
use App\Http\Requests\Plan\UpdatePlanRequest;
use App\Models\Plan;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    protected $duration;
    public function __construct()
    {

        $this->duration = (object)[
            (object)['duration' => 'yearly', 'name' => 'Yearly'],
            (object)['duration' => 'monthly', 'name' => 'Monthly']
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home-content.plan.index', [
            'plans' => Plan::orderBy('order_number','asc')->get(),
            'pageTitle' => "Plan List"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $duration = $this->duration;
        return view('admin.home-content.plan.create', compact('duration'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanRequest $request)
    {
        try {
            DB::beginTransaction();
            $plan = new Plan();
            self::storeAndUpdate($plan, $request);
            DB::commit();
            Toastr::success('Plan create successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('admin.plan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
         $duration = $this->duration;
        return view('admin.home-content.plan.edit', compact('duration','plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanRequest  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        try {
            DB::beginTransaction();
            self::storeAndUpdate($plan, $request);
            DB::commit();
            Toastr::success('Plan update successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('admin.plan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        try {
            DB::beginTransaction();
            $plan->delete();
            DB::commit();
            Toastr::success('Plan delete successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('admin.plan.index');
    }

    public function storeAndUpdate(Plan $plan, $request): Plan
    {
        $plan->title = $request->title;
        $plan->price = $request->price;
        $plan->duration = $request->duration;
        $plan->badge_icon = $request->badge_icon;
        $plan->button_text = $request->button_text;
        $plan->is_actived = $request->is_actived;
        $plan->order_number = $request->order_number;
        $plan->features = $request->features;
        $plan->save();
        return $plan;
    }
}
