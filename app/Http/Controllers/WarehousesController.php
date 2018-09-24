<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\WarehouseCreateRequest;
use App\Http\Requests\WarehouseUpdateRequest;
use App\Repositories\WarehouseRepository;
use App\Validators\WarehouseValidator;

/**
 * Class WarehousesController.
 *
 * @package namespace App\Http\Controllers;
 */
class WarehousesController extends Controller
{
    /**
     * @var WarehouseRepository
     */
    protected $repository;

    /**
     * @var WarehouseValidator
     */
    protected $validator;

    /**
     * WarehousesController constructor.
     *
     * @param WarehouseRepository $repository
     * @param WarehouseValidator $validator
     */
    public function __construct(WarehouseRepository $repository, WarehouseValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $warehouses = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $warehouses,
            ]);
        }

        return view('warehouses.index', compact('warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  WarehouseCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(WarehouseCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $warehouse = $this->repository->create($request->all());

            $response = [
                'message' => 'Warehouse created.',
                'data'    => $warehouse->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warehouse = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $warehouse,
            ]);
        }

        return view('warehouses.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouse = $this->repository->find($id);

        return view('warehouses.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  WarehouseUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(WarehouseUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $warehouse = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Warehouse updated.',
                'data'    => $warehouse->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Warehouse deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Warehouse deleted.');
    }
}
