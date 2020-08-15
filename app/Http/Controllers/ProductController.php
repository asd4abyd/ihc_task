<?php

namespace App\Http\Controllers;

use \Validator;
use Illuminate\Http\Request;

use App\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.list')
            ->with('tableList', Product::latest('id')->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $record = new Product();
        $record = array_combine($record->getFillable(), array_fill(0, count($record->getFillable()), ''));

        return view('product.add_edit')
            ->with('title', 'Create')
            ->with('record', $record)
            ->with('update', false)
            ->with('link', route('product.store'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = $this->makeValidate($request);

        if ($validator->fails()) {

            return redirect()
                ->route('product.create')
                ->withErrors($validator)
                ->withInput();
        }

        Product::create($request->all());
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('product.add_edit')
            ->with('title', 'Edit')
            ->with('record', Product::findOrFail($id))
            ->with('update', true)
            ->with('link', route('product.update', $id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = $this->makeValidate($request);

        if ($validator->fails()) {

            return redirect()
                ->route('product.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        Product::findOrFail($id)->update($request->all());

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('product.index');
    }


    private function makeValidate(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
    }
}
