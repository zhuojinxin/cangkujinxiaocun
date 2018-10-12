<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Repositories\GoodRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CodeCreateRequest;
use App\Http\Requests\CodeUpdateRequest;
use App\Repositories\CodeRepository;
use App\Validators\CodeValidator;

/**
 * Class CodesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CodesController extends Controller
{
    /**
     * @var CodeRepository
     */
    protected $repository;

    /**
     * @var CodeValidator
     */
    protected $validator;

    /**
     * CodesController constructor.
     *
     * @param CodeRepository $repository
     * @param CodeValidator $validator
     */
    public function __construct(CodeRepository $repository, CodeValidator $validator)
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
        $codes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $codes,
            ]);
        }

        return view('codes.index', compact('codes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CodeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CodeCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $code = $this->repository->create($request->all());

            $response = [
                'message' => 'Code created.',
                'data'    => $code->toArray(),
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
        $code = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $code,
            ]);
        }

        return view('codes.show', compact('code'));
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
        $code = $this->repository->find($id);

        return view('codes.edit', compact('code'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CodeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CodeUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $code = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Code updated.',
                'data'    => $code->toArray(),
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
                'message' => 'Code deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Code deleted.');
    }
    public  function orcode($id){
        return view('qrcode',['id'=>$id]);

    }
}
