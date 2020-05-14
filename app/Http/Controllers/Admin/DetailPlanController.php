<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use App\Models\DetailsPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailsPlan $detailsPlan, Plan $plan)
    {
        $this->repository = $detailsPlan;
        $this->plan = $plan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($urlPlan)
    {
        $plan = $this->plan->where('id', $urlPlan)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $details = $plan->details()->latest()->paginate(8);

        return view('admin.pages.plans.details.index', compact('plan', 'details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($urlPlan)
    {
        $plan = $this->plan->where('id', $urlPlan)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', compact('plan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateDetailPlan $request, $urlPlan)
    {
        $plan = $this->plan->where('id', $urlPlan)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('id', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', compact('plan', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('id', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', compact('plan', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateDetailPlan $request, $urlPlan, $idDetail)
    {
        $plan = $this->plan->where('id', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->update($request->all());

        return redirect()->route('details.plan.index', $plan->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('id', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan) {
            return redirect()->back();
        }

        $detail->delete();

        return redirect()->route('details.plan.index', $plan->id)->with('message', 'Registro removido com êxito!');
    }
}
