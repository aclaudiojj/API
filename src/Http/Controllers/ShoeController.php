<?php

namespace Api\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Api\Services\ShoeService;
use Api\Http\Requests\CsvImportRequest;

class ShoeController extends Controller
{

    /**
     *
     * @return void
     */
    public function __construct(ShoeService $shoeService)
    {
        $this->service = $shoeService;
    }
    
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->service->init($request)->index();
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->init($request)->store();
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->get($id);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->service->init($request)->update($id);
    }

    /**
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
    }

    /**
     *
     * @param  int  $id
     */
    public function list(Request $request)
    {
        try {
            $shoes = $this->index($request);
        } catch (\Fouladgar\EloquentBuilder\Exceptions\NotFoundFilterException $e) {
            return redirect()->route('list');
        }

        return view('list', compact('shoes'));
    }
}
