<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePacienteAPIRequest;
use App\Http\Requests\API\UpdatePacienteAPIRequest;
use App\Models\Paciente;
use App\Repositories\PacienteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PacienteController
 * @package App\Http\Controllers\API
 */

class PacienteAPIController extends AppBaseController
{
    /** @var  PacienteRepository */
    private $pacienteRepository;

    public function __construct(PacienteRepository $pacienteRepo)
    {
        $this->pacienteRepository = $pacienteRepo;
    }

    /**
     * Display a listing of the Paciente.
     * GET|HEAD /pacientes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pacienteRepository->pushCriteria(new RequestCriteria($request));
        $this->pacienteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pacientes = $this->pacienteRepository->all();

        return $this->sendResponse($pacientes->toArray(), 'Pacientes retrieved successfully');
    }

    /**
     * Store a newly created Paciente in storage.
     * POST /pacientes
     *
     * @param CreatePacienteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePacienteAPIRequest $request)
    {
        $input = $request->all();

        $pacientes = $this->pacienteRepository->create($input);

        return $this->sendResponse($pacientes->toArray(), 'Paciente saved successfully');
    }

    /**
     * Display the specified Paciente.
     * GET|HEAD /pacientes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Paciente $paciente */
        $paciente = $this->pacienteRepository->findWithoutFail($id);

        if (empty($paciente)) {
            return $this->sendError('Paciente not found');
        }

        return $this->sendResponse($paciente->toArray(), 'Paciente retrieved successfully');
    }

    /**
     * Update the specified Paciente in storage.
     * PUT/PATCH /pacientes/{id}
     *
     * @param  int $id
     * @param UpdatePacienteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePacienteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Paciente $paciente */
        $paciente = $this->pacienteRepository->findWithoutFail($id);

        if (empty($paciente)) {
            return $this->sendError('Paciente not found');
        }

        $paciente = $this->pacienteRepository->update($input, $id);

        return $this->sendResponse($paciente->toArray(), 'Paciente updated successfully');
    }

    /**
     * Remove the specified Paciente from storage.
     * DELETE /pacientes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Paciente $paciente */
        $paciente = $this->pacienteRepository->findWithoutFail($id);

        if (empty($paciente)) {
            return $this->sendError('Paciente not found');
        }

        $paciente->delete();

        return $this->sendResponse($id, 'Paciente deleted successfully');
    }
}
