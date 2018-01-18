<?php

namespace App\Http\Controllers;

use App\DataTables\CidadeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCidadeRequest;
use App\Http\Requests\UpdateCidadeRequest;
use App\Repositories\CidadeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\Estado;

class CidadeController extends AppBaseController
{
    /** @var  CidadeRepository */
    private $cidadeRepository;

    public function __construct(CidadeRepository $cidadeRepo)
    {
        $this->cidadeRepository = $cidadeRepo;
    }

    /**
     * Display a listing of the Cidade.
     *
     * @param CidadeDataTable $cidadeDataTable
     * @return Response
     */
    public function index(CidadeDataTable $cidadeDataTable)
    {
        return $cidadeDataTable->render('cidades.index');
    }

    /**
     * Show the form for creating a new Cidade.
     *
     * @return Response
     */
    public function create()
    {
        $arr_e = [];
        foreach (Estado::all() as $estado) {
            $arr_e[$estado->id] = $estado->sigla;
        }
        return view('cidades.create')->with('estados', $arr_e);
    }

    /**
     * Store a newly created Cidade in storage.
     *
     * @param CreateCidadeRequest $request
     *
     * @return Response
     */
    public function store(CreateCidadeRequest $request)
    {
        $input = $request->all();

        $cidade = $this->cidadeRepository->create($input);

        Flash::success('Cidade saved successfully.');

        return redirect(route('cidades.index'));
    }

    /**
     * Display the specified Cidade.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cidade = $this->cidadeRepository->findWithoutFail($id);

        if (empty($cidade)) {
            Flash::error('Cidade not found');

            return redirect(route('cidades.index'));
        }

        return view('cidades.show')->with('cidade', $cidade);
    }

    /**
     * Show the form for editing the specified Cidade.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cidade = $this->cidadeRepository->findWithoutFail($id);

        if (empty($cidade)) {
            Flash::error('Cidade not found');

            return redirect(route('cidades.index'));
        }

        $arr_e = [];
        foreach (Estado::all() as $estado) {
            $arr_e[$estado->id] = $estado->sigla;
        }

        return view('cidades.edit')->with('cidade', $cidade)->with('estados', $arr_e);
    }

    /**
     * Update the specified Cidade in storage.
     *
     * @param  int              $id
     * @param UpdateCidadeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCidadeRequest $request)
    {
        $cidade = $this->cidadeRepository->findWithoutFail($id);

        if (empty($cidade)) {
            Flash::error('Cidade not found');

            return redirect(route('cidades.index'));
        }

        $cidade = $this->cidadeRepository->update($request->all(), $id);

        Flash::success('Cidade updated successfully.');

        return redirect(route('cidades.index'));
    }

    /**
     * Remove the specified Cidade from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cidade = $this->cidadeRepository->findWithoutFail($id);

        if (empty($cidade)) {
            Flash::error('Cidade not found');

            return redirect(route('cidades.index'));
        }

        $this->cidadeRepository->delete($id);

        Flash::success('Cidade deleted successfully.');

        return redirect(route('cidades.index'));
    }
}
