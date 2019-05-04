<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

abstract class CrudController extends Controller
{
    /**
     * Return the model for CRUD
     *
     * @return Model
     */
    protected abstract function getModel() : Model;

    /**
     * Return the view path of a Model
     *
     * @return string
     */
    protected abstract function getViewPath() : string;

    /**
     * Return data for view
     *
     * @return array
     */
    protected function getData(): array
    {
        return [];
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function validateRequest(Request $request): void
    {
        return;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemList  = $this->getModel()
            ->get();
        
        return view($this->getViewPath() . '.index', compact('itemList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->getViewPath() . '.create', $this->getData());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $this->getModel()->create($request->all());

        return back()->with('msg', 'Item is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->getData();
        $data['item'] = $this->getModel()->findOrFail($id);

        return view($this->getViewPath() . '.show', $data );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->getData();
        $data['item'] = $this->getModel()->findOrFail($id);

        return view($this->getViewPath() . '.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);
        $item = $this->getModel()->findOrFail($id);
        $item->update($request->all());

        return back()->with('msg', 'Item is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->getModel()->find($id);
        $item->delete();

        return back()->with('msg', 'Item is deleted successfully');
    }
}
