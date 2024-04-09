<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogisticRequest;
use App\Models\Category;
use App\Models\Logistic;
use Illuminate\Http\Request;

class LogisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logistics = Logistic::orderByDesc('id');
        $logistics = $logistics->paginate(50);

        return view('dashboard.logistics.index', compact('logistics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('dashboard.logistics.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogisticRequest $request)
    {
        $validatedData = $request->validated();

        Logistic::create($validatedData);

        return redirect(route('logistics.index'))->with('success', 'Data barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logistic  $logistic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Logistic::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logistic  $logistic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logistic = Logistic::findOrFail($id);
        $categories = category::all();


        return view('dashboard.logistics.edit', compact('logistic', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logistic  $logistic
     * @return \Illuminate\Http\Response
     */
    public function update(LogisticRequest $request, $id)
    {
        $validatedData = $request->validated();

        $logistic = Logistic::findOrFail($id);

        $logistic->update($validatedData);

        return redirect(route('logistics.index'))->with('success', 'Data barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logistic  $logistic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logistic = Logistic::findOrFail($id);

        $logistic->delete();

        return redirect(route('logistics.index'))->with('success', 'Data barang berhasil dihapus.');
    }
}
