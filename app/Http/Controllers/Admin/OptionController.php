<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{

    public function index()
    {
        return view('admin.options.index', [
            'options' => Option::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new Option resource.
     */
    public function create()
    {
        $option = new Option ();
        return view('admin.options.form', [
                'option' => $option,
            ]);

    }

    /**
     * Store a new Optionly created resource in storage.
     */
    public function store(OptionFormRequest $request)
    {
        $option = Option::create($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'option a bien été créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return view('admin.options.form', [
            'option' => $option
        ]);
    }


    public function update(OptionFormRequest $request,Option  $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'option a bien été modifé');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.option.index')->with('success', 'L\'option a bien été supprimé');
    }
}
