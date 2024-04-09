<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;
use App\Http\Requests\RequestVillage;
use App\Models\District;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villages = Village::orderByDesc('id');
        $villages = $villages->paginate(50);

        return view('dashboard.villages.index', compact('villages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oneTimVillage = User::where('role',
        'one_desa')->orderByDesc('id')->get();
        $districts = District::orderByDesc('id')->get();

        return view('dashboard.villages.create', compact('oneTimVillage', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestVillage $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $village = Village::create($validated);

        return redirect(route('villages.index'))->with('success', 'Data desa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Village::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $village = Village::findOrFail($id);
        $oneTimVillage = User::where('role',
        'one_desa')->orderByDesc('id')->get();
        $districts = District::orderByDesc('id')->get();

        return view('dashboard.villages.edit', compact('village', 'oneTimVillage', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestVillage $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $village = Village::findOrFail($id);

        $village->update($validated);

        return redirect(route('villages.index'))->with('success', 'Data desa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $village = Village::findOrFail($id);
        $village->delete();

        return redirect(route('villages.index'))->with('success', 'Data desa berhasil dihapus.');
    }
}
