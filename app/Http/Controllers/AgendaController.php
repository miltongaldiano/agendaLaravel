<?php

namespace App\Http\Controllers;

use App\DataTables\AgendaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use App\Repositories\AgendaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\Medico;
use App\Models\Paciente;

class AgendaController extends AppBaseController
{
    /** @var  AgendaRepository */
    private $agendaRepository;

    public function __construct(AgendaRepository $agendaRepo)
    {
        $this->agendaRepository = $agendaRepo;
    }

    /**
     * Display a listing of the Agenda.
     *
     * @param AgendaDataTable $agendaDataTable
     * @return Response
     */
    public function index(AgendaDataTable $agendaDataTable)
    {
        return $agendaDataTable->render('agendas.index');
    }

    /**
     * Show the form for creating a new Agenda.
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
     * Store a newly created Agenda in storage.
     *
     * @param CreateAgendaRequest $request
     *
     * @return Response
     */
    public function store(CreateAgendaRequest $request)
    {
        $input = $request->all();

        $agenda = $this->agendaRepository->create($input);

        Flash::success('Agenda saved successfully.');

        return redirect(route('agendas.index'));
    }

    /**
     * Display the specified Agenda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agenda = $this->agendaRepository->findWithoutFail($id);

        if (empty($agenda)) {
            Flash::error('Agenda not found');

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

        return view('agendas.show')->with('agenda', $agenda)->with('medicos', $arr_m)->with('pacientes', $arr_p);
    }

    /**
     * Show the form for editing the specified Agenda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agenda = $this->agendaRepository->findWithoutFail($id);

        if (empty($agenda)) {
            Flash::error('Agenda not found');

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

        return view('agendas.edit')->with('agenda', $agenda)->with('medicos', $arr_m)->with('pacientes', $arr_p);
    }

    /**
     * Update the specified Agenda in storage.
     *
     * @param  int              $id
     * @param UpdateAgendaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgendaRequest $request)
    {
        $agenda = $this->agendaRepository->findWithoutFail($id);

        if (empty($agenda)) {
            Flash::error('Agenda not found');

            return redirect(route('agendas.index'));
        }

        $agenda = $this->agendaRepository->update($request->all(), $id);

        Flash::success('Agenda updated successfully.');

        return redirect(route('agendas.index'));
    }

    /**
     * Remove the specified Agenda from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agenda = $this->agendaRepository->findWithoutFail($id);

        if (empty($agenda)) {
            Flash::error('Agenda not found');

            return redirect(route('agendas.index'));
        }

        $this->agendaRepository->delete($id);

        Flash::success('Agenda deleted successfully.');

        return redirect(route('agendas.index'));
    }
}
