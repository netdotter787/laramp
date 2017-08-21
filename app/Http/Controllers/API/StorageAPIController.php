<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStorageAPIRequest;
use App\Http\Requests\API\UpdateStorageAPIRequest;
use App\Models\Storage;
use App\Repositories\StorageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StorageController
 * @package App\Http\Controllers\API
 */

class StorageAPIController extends AppBaseController
{
    /** @var  StorageRepository */
    private $storageRepository;

    public function __construct(StorageRepository $storageRepo)
    {
        $this->storageRepository = $storageRepo;
    }

    /**
     * Display a listing of the Storage.
     * GET|HEAD /storages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->storageRepository->pushCriteria(new RequestCriteria($request));
        $this->storageRepository->pushCriteria(new LimitOffsetCriteria($request));
        $storages = $this->storageRepository->all();

        return $this->sendResponse($storages->toArray(), 'Storages retrieved successfully');
    }

    /**
     * Store a newly created Storage in storage.
     * POST /storages
     *
     * @param CreateStorageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStorageAPIRequest $request)
    {
        $input = $request->all();

        $storages = $this->storageRepository->create($input);

        return $this->sendResponse($storages->toArray(), 'Storage saved successfully');
    }

    /**
     * Display the specified Storage.
     * GET|HEAD /storages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Storage $storage */
        $storage = $this->storageRepository->findWithoutFail($id);

        if (empty($storage)) {
            return $this->sendError('Storage not found');
        }

        return $this->sendResponse($storage->toArray(), 'Storage retrieved successfully');
    }

    /**
     * Update the specified Storage in storage.
     * PUT/PATCH /storages/{id}
     *
     * @param  int $id
     * @param UpdateStorageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStorageAPIRequest $request)
    {
        $input = $request->all();

        /** @var Storage $storage */
        $storage = $this->storageRepository->findWithoutFail($id);

        if (empty($storage)) {
            return $this->sendError('Storage not found');
        }

        $storage = $this->storageRepository->update($input, $id);

        return $this->sendResponse($storage->toArray(), 'Storage updated successfully');
    }

    /**
     * Remove the specified Storage from storage.
     * DELETE /storages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Storage $storage */
        $storage = $this->storageRepository->findWithoutFail($id);

        if (empty($storage)) {
            return $this->sendError('Storage not found');
        }

        $storage->delete();

        return $this->sendResponse($id, 'Storage deleted successfully');
    }
}
