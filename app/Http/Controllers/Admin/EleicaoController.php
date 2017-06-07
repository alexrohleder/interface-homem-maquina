<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Eleicao;
use Illuminate\Http\Request;
use Session;

class EleicaoController extends Controller
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
            $eleicao = Eleicao::where('nome', 'LIKE', "%$keyword%")
				->orWhere('ano', 'LIKE', "%$keyword%")
				->orWhere('data', 'LIKE', "%$keyword%")
				->orWhere('ativo', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $eleicao = Eleicao::paginate($perPage);
        }

        return view('admin.eleicao.index', compact('eleicao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.eleicao.create');
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
			'nome' => 'required|max:100',
			'ano' => 'required',
			'data' => 'required'
		]);
        $requestData = $request->all();
        
        Eleicao::create($requestData);

        Session::flash('flash_message', 'Eleicao added!');

        return redirect('admin/eleicao');
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
        $eleicao = Eleicao::findOrFail($id);

        return view('admin.eleicao.show', compact('eleicao'));
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
        $eleicao = Eleicao::findOrFail($id);

        return view('admin.eleicao.edit', compact('eleicao'));
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
			'nome' => 'required|max:100',
			'ano' => 'required',
			'data' => 'required'
		]);
        $requestData = $request->all();
        
        $eleicao = Eleicao::findOrFail($id);
        $eleicao->update($requestData);

        Session::flash('flash_message', 'Eleicao updated!');

        return redirect('admin/eleicao');
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
        Eleicao::destroy($id);

        Session::flash('flash_message', 'Eleicao deleted!');

        return redirect('admin/eleicao');
    }
}
