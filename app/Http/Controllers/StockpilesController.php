<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\StockpileCreateRequest;
use App\Http\Requests\StockpileUpdateRequest;
use App\Repositories\StockpileRepository;
use App\Validators\StockpileValidator;

/**
 * Class StockpilesController.
 *
 * @package namespace App\Http\Controllers;
 */
class StockpilesController extends Controller
{
    /**
     * @var StockpileRepository
     */
    protected $repository;

    /**
     * @var StockpileValidator
     */
    protected $validator;

    /**
     * StockpilesController constructor.
     *
     * @param StockpileRepository $repository
     * @param StockpileValidator $validator
     */
    public function __construct(StockpileRepository $repository, StockpileValidator $validator)
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
        $stockpiles = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $stockpiles,
            ]);
        }

        return view('stockpiles.index', compact('stockpiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StockpileCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(StockpileCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $stockpile = $this->repository->create($request->all());

            $response = [
                'message' => 'Stockpile created.',
                'data'    => $stockpile->toArray(),
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
        $stockpile = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $stockpile,
            ]);
        }

        return view('stockpiles.show', compact('stockpile'));
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
        $stockpile = $this->repository->find($id);

        return view('stockpiles.edit', compact('stockpile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StockpileUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(StockpileUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $stockpile = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Stockpile updated.',
                'data'    => $stockpile->toArray(),
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
                'message' => 'Stockpile deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Stockpile deleted.');
    }
}
