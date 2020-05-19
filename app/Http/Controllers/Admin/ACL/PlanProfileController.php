<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\PlanProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $repository;
    protected $plan;
    protected $profile;
    protected $records;

    public function __construct(PlanProfile $planProfile, Plan $plan, Profile $profile)
    {
        $this->repository = $planProfile;
        $this->plan = $plan;
        $this->profile = $profile;
        $this->records = new \stdClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function plans($idPlan)
    {
        $title = $this->records->title = "Perfis do Plano";

        if (!$plan = $this->plan->with('profiles')->findOrFail($idPlan)) {
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate(6);

        return view('admin.pages.profiles.plans.plans', compact('plan', 'profiles', 'title'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function profiles($idPlan)
    {
        $records = $this->records->title = "Perfis dos Planos";

        if (!$plan = $this->plan->findOrFail($idPlan)) {
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate(8);

        return view('admin.pages.plans.profiles.profiles', compact('plan', 'profiles', 'records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profilesAvailable(Request $request, $idPlan)
    {
        if (!$plan = $this->plan->findOrFail($idPlan)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $profiles = $plan->profilesAvailable($request->q);

        return view('admin.pages.plans.profiles.available', compact('profiles', 'plan', 'filters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attachPlanProfile(Request $request, $idPlan)
    {
        if (!$plan = $this->plan->findOrFail($idPlan)) {
            return redirect()->back();
        }

        if (!$request->profiles || count($request->profiles) == 0) {
            return redirect()->back()->with('app_warning', 'Precisa escolher pelo menos um plano.');
        }

        $dd = $plan->profiles()->attach($request->profiles)->toSql();
        dd($dd);

        return redirect()->route('plans.profiles', $plan->id)->with('message', 'Perfil definido com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detachProfilesPlan($idPlan, $idProfile)
    {
        $plan = $this->plan->findOrFail($idPlan);
        $profile = $this->profile->findOrFail($idProfile);

        if (!$plan || !$profile) {
            return redirect()->back();
        }

        $profile->profiles()->detach($plan);

        return response()->json([
            'success' => 'Desvinculado com sucesso.',
            'url' => route('plans.profiles', $plan->id),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detachPlansProfile($idProfile, $idPlan)
    {
        $profile = $this->profile->findOrFail($idPlan);
        $plan = $this->plan->findOrFail($idProfile);

        if (!$plan || !$profile) {
            return redirect()->back();
        }

        $plan->plans()->detach($profile);

        return response()->json([
            'success' => 'Desvinculado com sucesso.',
            'url' => route('plans.profiles', $profile->id),
        ]);
    }
}
