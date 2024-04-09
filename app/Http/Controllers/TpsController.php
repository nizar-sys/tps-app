<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use Illuminate\Http\Request;
use App\Http\Requests\RequestTps;
use App\Models\Village;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votings = Tps::orderByDesc('id');
        $votings = $votings->paginate(50);

        return view('dashboard.votings.index', compact('votings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oneTimVoting = User::where('role',
        'one_desa')->orderByDesc('id')->get();
        $villages = Village::orderByDesc('id')->get();

        return view('dashboard.votings.create', compact('oneTimVoting', 'villages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTps $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $voting = Tps::create($validated);

        return redirect(route('votings.index'))->with('success', 'Data desa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Tps::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voting = Tps::findOrFail($id);
        $oneTimVoting = User::where('role',
        'one_desa')->orderByDesc('id')->get();
        $villages = Village::orderByDesc('id')->get();

        return view('dashboard.votings.edit', compact('voting', 'oneTimVoting', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTps $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $voting = Tps::findOrFail($id);

        $voting->update($validated);

        return redirect(route('votings.index'))->with('success', 'Data desa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voting = Tps::findOrFail($id);
        $voting->delete();

        return redirect(route('votings.index'))->with('success', 'Data desa berhasil dihapus.');
    }
}
