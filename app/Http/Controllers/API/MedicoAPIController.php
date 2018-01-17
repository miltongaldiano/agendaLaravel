<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMedicoAPIRequest;
use App\Http\Requests\API\UpdateMedicoAPIRequest;
use App\Models\Medico;
use App\Repositories\MedicoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MedicoController
 * @package App\Http\Controllers\API
 */

class MedicoAPIController extends AppBaseController
{
    /** @var  MedicoRepository */
    private $medicoRepository;

    public function __construct(MedicoRepository $medicoRepo)
    {
        $this->medicoRepository = $medicoRepo;
    }

    /**
     * Display a listing of the Medico.
     * GET|HEAD /medicos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->medicoRepository->pushCriteria(new RequestCriteria($request));
        $this->medicoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $medicos = $this->medicoRepository->all();

        return $this->sendResponse($medicos->toArray(), 'Medicos retrieved successfully');
    }

    /**
     * Store a newly created Medico in storage.
     * POST /medicos
     *
     * @param CreateMedicoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMedicoAPIRequest $request)
    {
        $input = $request->all();

        $medicos = $this->medicoRepository->create($input);

        return $this->sendResponse($medicos->toArray(), 'Medico saved successfully');
    }

    /**
     * Display the specified Medico.
     * GET|HEAD /medicos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Medico $medico */
        $medico = $this->medicoRepository->findWithoutFail($id);

        if (empty($medico)) {
            return $this->sendError('Medico not found');
        }

        return $this->sendResponse($medico->toArray(), 'Medico retrieved successfully');
    }

    /**
     * Update the specified Medico in storage.
     * PUT/PATCH /medicos/{id}
     *
     * @param  int $id
     * @param UpdateMedicoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedicoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Medico $medico */
        $medico = $this->medicoRepository->findWithoutFail($id);

        if (empty($medico)) {
            return $this->sendError('Medico not found');
        }

        $medico = $this->medicoRepository->update($input, $id);

        return $this->sendResponse($medico->toArray(), 'Medico updated successfully');
    }

    /**
     * Remove the specified Medico from storage.
     * DELETE /medicos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Medico $medico */
        $medico = $this->medicoRepository->findWithoutFail($id);

        if (empty($medico)) {
            return $this->sendError('Medico not found');
        }

        $medico->delete();

        return $this->sendResponse($id, 'Medico deleted successfully');
    }
}
