<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RuchukuCreateRequest;
use App\Http\Requests\RuchukuUpdateRequest;
use App\Repositories\RuchukuRepository;
use App\Validators\RuchukuValidator;

/**
 * Class RuchukusController.
 *
 * @package namespace App\Http\Controllers;
 */
class RuchukusController extends Controller
{
    /**
     * @var RuchukuRepository
     */
    protected $repository;

    /**
     * @var RuchukuValidator
     */
    protected $validator;

    /**
     * RuchukusController constructor.
     *
     * @param RuchukuRepository $repository
     * @param RuchukuValidator $validator
     */
    public function __construct(RuchukuRepository $repository, RuchukuValidator $validator)
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
        $ruchukus = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ruchukus,
            ]);
        }

        return view('ruchukus.index', compact('ruchukus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RuchukuCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RuchukuCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $ruchuku = $this->repository->create($request->all());

            $response = [
                'message' => 'Ruchuku created.',
                'data'    => $ruchuku->toArray(),
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
        $ruchuku = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ruchuku,
            ]);
        }

        return view('ruchukus.show', compact('ruchuku'));
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
        $ruchuku = $this->repository->find($id);

        return view('ruchukus.edit', compact('ruchuku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RuchukuUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(RuchukuUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ruchuku = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Ruchuku updated.',
                'data'    => $ruchuku->toArray(),
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
                'message' => 'Ruchuku deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Ruchuku deleted.');
    }
}
