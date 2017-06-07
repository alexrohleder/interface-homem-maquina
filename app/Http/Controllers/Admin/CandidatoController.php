<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Candidato;
use Illuminate\Http\Request;
use Session;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $candidato = Candidato::where('numero', 'LIKE', "%$keyword%")
				->orWhere('nome', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $candidato = Candidato::paginate($perPage);
        }

        return view('admin.candidato.index', compact('candidato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.candidato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'numero' => 'required',
			'nome' => 'required|max:100'
		]);
        $requestData = $request->all();
        
        Candidato::create($requestData);

        Session::flash('flash_message', 'Candidato added!');

        return redirect('admin/candidato');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $candidato = Candidato::findOrFail($id);

        return view('admin.candidato.show', compact('candidato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $candidato = Candidato::findOrFail($id);

        return view('admin.candidato.edit', compact('candidato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'numero' => 'required',
			'nome' => 'required|max:100'
		]);
        $requestData = $request->all();
        
        $candidato = Candidato::findOrFail($id);
        $candidato->update($requestData);

        Session::flash('flash_message', 'Candidato updated!');

        return redirect('admin/candidato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Candidato::destroy($id);

        Session::flash('flash_message', 'Candidato deleted!');

        return redirect('admin/candidato');
    }
}
