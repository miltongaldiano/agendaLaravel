<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgendasRequest;
use App\Http\Requests\UpdateAgendasRequest;
use App\Repositories\AgendasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Medico;
use App\Models\Paciente;

class AgendasController extends AppBaseController
{
    /** @var  AgendasRepository */
    private $agendasRepository;

    public function __construct(AgendasRepository $agendasRepo)
    {
        $this->agendasRepository = $agendasRepo;
    }

    /**
     * Display a listing of the Agendas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->agendasRepository->pushCriteria(new RequestCriteria($request));
        $agendas = $this->agendasRepository->all();

        return view('agendas.index')
            ->with('agendas', $agendas);
    }

    /**
     * Show the form for creating a new Agendas.
     *
     * @return Response
     */
    public function create()
    {
        $arr_m = [];
        foreach (Medico::all() as $medico) {
            $arr_m[$medico->id] = $medico->nome_medico;
        }

        $arr_p = [];
        foreach (Paciente::all() as $paciente) {
            $arr_p[$paciente->id] = $paciente->nome;
        }
        return view('agendas.create')->with('medicos', $arr_m)->with('pacientes', $arr_p);
    }

    /**
     * Store a newly created Agendas in storage.
     *
     * @param CreateAgendasRequest $request
     *
     * @return Response
     */
    public function store(CreateAgendasRequest $request)
    {
        $input = $request->all();

        $agendas = $this->agendasRepository->create($input);

        Flash::success('Agendas saved successfully.');

        return redirect(route('agendas.index'));
    }

    /**
     * Display the specified Agendas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agendas = $this->agendasRepository->findWithoutFail($id);

        if (empty($agendas)) {
            Flash::error('Agendas not found');

            return redirect(route('agendas.index'));
        }

        $arr_m = [];
        foreach (Medico::all() as $medico) {
            $arr_m[$medico->id] = $medico->nome_medico;
        }

        $arr_p = [];
        foreach (Paciente::all() as $paciente) {
            $arr_p[$paciente->id] = $paciente->nome;
        }

        return view('agendas.show')->with('agendas', $agendas)->with('medicos', $arr_m)->with('pacientes', $arr_p);
    }

    /**
     * Show the form for editing the specified Agendas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agendas = $this->agendasRepository->findWithoutFail($id);

        if (empty($agendas)) {
            Flash::error('Agendas not found');

            return redirect(route('agendas.index'));
        }

        $arr_m = [];
        foreach (Medico::all() as $medico) {
            $arr_m[$medico->id] = $medico->nome_medico;
        }

        $arr_p = [];
        foreach (Paciente::all() as $paciente) {
            $arr_p[$paciente->id] = $paciente->nome;
        }

        return view('agendas.edit')->with('agendas', $agendas)->with('medicos', $arr_m)->with('pacientes', $arr_p);
    }

    /**
     * Update the specified Agendas in storage.
     *
     * @param  int              $id
     * @param UpdateAgendasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgendasRequest $request)
    {
        $agendas = $this->agendasRepository->findWithoutFail($id);

        if (empty($agendas)) {
            Flash::error('Agendas not found');

            return redirect(route('agendas.index'));
        }

        $agendas = $this->agendasRepository->update($request->all(), $id);

        Flash::success('Agendas updated successfully.');

        return redirect(route('agendas.index'));
    }

    /**
     * Remove the specified Agendas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agendas = $this->agendasRepository->findWithoutFail($id);

        if (empty($agendas)) {
            Flash::error('Agendas not found');

            return redirect(route('agendas.index'));
        }

        $this->agendasRepository->delete($id);

        Flash::success('Agendas deleted successfully.');

        return redirect(route('agendas.index'));
    }
}
