<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GoodCreateRequest;
use App\Http\Requests\GoodUpdateRequest;
use App\Repositories\GoodRepository;
use App\Validators\GoodValidator;

/**
 * Class GoodsController.
 *
 * @package namespace App\Http\Controllers;
 */
class GoodsController extends Controller
{
    /**
     * @var GoodRepository
     */
    protected $repository;

    /**
     * @var GoodValidator
     */
    protected $validator;

    /**
     * GoodsController constructor.
     *
     * @param GoodRepository $repository
     * @param GoodValidator $validator
     */
    public function __construct(GoodRepository $repository, GoodValidator $validator)
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
        $goods = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $goods,
            ]);
        }

        return view('goods.index', compact('goods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GoodCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(GoodCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $good = $this->repository->create($request->all());

            $response = [
                'message' => 'Good created.',
                'data'    => $good->toArray(),
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
        $good = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $good,
            ]);
        }

        return view('goods.show', compact('good'));
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
        $good = $this->repository->find($id);

        return view('goods.edit', compact('good'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GoodUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(GoodUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $good = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Good updated.',
                'data'    => $good->toArray(),
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
                'message' => 'Good deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Good deleted.');
    }
}
