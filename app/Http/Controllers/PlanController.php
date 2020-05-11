<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PlanCreateRequest;
use App\Http\Requests\PlanUpdateRequest;

class PlanController extends Controller
{
    public $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = $this->repository->latest()->paginate(8);

        return view('admin.pages.plans.index', compact("plans"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanCreateRequest $request)
    {
        $inserido = null;
        $dados = $request->all();
        $dados['url'] = Str::kebab($request->name);

        $inserido = $this->repository->create($dados);

        if ($inserido) {
            return redirect(route('plans.index'));
        }else{
            return redirect(route('plans.create'))
            ->with('message', 'Erro durante cadastro do novo plano');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $plan = $this->repository->where('id', $id)->first();

        $request->session()->put('retorno', url()->previous());

        if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanUpdateRequest $request, $id)
    {

        $plan = $this->repository->findOrFail($id);

        if(!$plan)
            return redirect()->back();

        $plan->update($request->all());


        return redirect($request->uri);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if(!$plan)
            return redirect()->back();

        $plan->delete();


        return redirect()->route('plans.index');
    }
}
