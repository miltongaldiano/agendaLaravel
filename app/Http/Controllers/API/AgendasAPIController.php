<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAgendasAPIRequest;
use App\Http\Requests\API\UpdateAgendasAPIRequest;
use App\Models\Agendas;
use App\Repositories\AgendasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AgendasController
 * @package App\Http\Controllers\API
 */

class AgendasAPIController extends AppBaseController
{
    /** @var  AgendasRepository */
    private $agendasRepository;

    public function __construct(AgendasRepository $agendasRepo)
    {
        $this->agendasRepository = $agendasRepo;
    }

    /**
     * Display a listing of the Agendas.
     * GET|HEAD /agendas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->agendasRepository->pushCriteria(new RequestCriteria($request));
        $this->agendasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $this->agendasRepository->with(['medico']);
        $agendas = $this->agendasRepository->all();

        return $this->sendResponse($agendas->toArray(), 'Agendas retrieved successfully');
    }

    /**
     * Store a newly created Agendas in storage.
     * POST /agendas
     *
     * @param CreateAgendasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAgendasAPIRequest $request)
    {
        $input = $request->all();

        $agendas = $this->agendasRepository->create($input);

        return $this->sendResponse($agendas->toArray(), 'Agendas saved successfully');
    }

    /**
     * Display the specified Agendas.
     * GET|HEAD /agendas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Agendas $agendas */
        $agendas = $this->agendasRepository->findWithoutFail($id);

        if (empty($agendas)) {
            return $this->sendError('Agendas not found');
        }

        return $this->sendResponse($agendas->toArray(), 'Agendas retrieved successfully');
    }

    /**
     * Update the specified Agendas in storage.
     * PUT/PATCH /agendas/{id}
     *
     * @param  int $id
     * @param UpdateAgendasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgendasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Agendas $agendas */
        $agendas = $this->agendasRepository->findWithoutFail($id);

        if (empty($agendas)) {
            return $this->sendError('Agendas not found');
        }

        $agendas = $this->agendasRepository->update($input, $id);

        return $this->sendResponse($agendas->toArray(), 'Agendas updated successfully');
    }

    /**
     * Remove the specified Agendas from storage.
     * DELETE /agendas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Agendas $agendas */
        $agendas = $this->agendasRepository->findWithoutFail($id);

        if (empty($agendas)) {
            return $this->sendError('Agendas not found');
        }

        $agendas->delete();

        return $this->sendResponse($id, 'Agendas deleted successfully');
    }
}
