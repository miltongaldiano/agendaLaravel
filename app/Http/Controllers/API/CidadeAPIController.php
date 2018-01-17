<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCidadeAPIRequest;
use App\Http\Requests\API\UpdateCidadeAPIRequest;
use App\Models\Cidade;
use App\Repositories\CidadeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CidadeController
 * @package App\Http\Controllers\API
 */

class CidadeAPIController extends AppBaseController
{
    /** @var  CidadeRepository */
    private $cidadeRepository;

    public function __construct(CidadeRepository $cidadeRepo)
    {
        $this->cidadeRepository = $cidadeRepo;
    }

    /**
     * Display a listing of the Cidade.
     * GET|HEAD /cidades
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cidadeRepository->pushCriteria(new RequestCriteria($request));
        $this->cidadeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cidades = $this->cidadeRepository->all();

        return $this->sendResponse($cidades->toArray(), 'Cidades retrieved successfully');
    }

    /**
     * Store a newly created Cidade in storage.
     * POST /cidades
     *
     * @param CreateCidadeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCidadeAPIRequest $request)
    {
        $input = $request->all();

        $cidades = $this->cidadeRepository->create($input);

        return $this->sendResponse($cidades->toArray(), 'Cidade saved successfully');
    }

    /**
     * Display the specified Cidade.
     * GET|HEAD /cidades/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cidade $cidade */
        $cidade = $this->cidadeRepository->findWithoutFail($id);

        if (empty($cidade)) {
            return $this->sendError('Cidade not found');
        }

        return $this->sendResponse($cidade->toArray(), 'Cidade retrieved successfully');
    }

    /**
     * Update the specified Cidade in storage.
     * PUT/PATCH /cidades/{id}
     *
     * @param  int $id
     * @param UpdateCidadeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCidadeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cidade $cidade */
        $cidade = $this->cidadeRepository->findWithoutFail($id);

        if (empty($cidade)) {
            return $this->sendError('Cidade not found');
        }

        $cidade = $this->cidadeRepository->update($input, $id);

        return $this->sendResponse($cidade->toArray(), 'Cidade updated successfully');
    }

    /**
     * Remove the specified Cidade from storage.
     * DELETE /cidades/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cidade $cidade */
        $cidade = $this->cidadeRepository->findWithoutFail($id);

        if (empty($cidade)) {
            return $this->sendError('Cidade not found');
        }

        $cidade->delete();

        return $this->sendResponse($id, 'Cidade deleted successfully');
    }
}
