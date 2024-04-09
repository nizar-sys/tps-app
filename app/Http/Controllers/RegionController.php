<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Requests\RequestRegion;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::orderByDesc('id');
        $regions = $regions->paginate(50);

        return view('dashboard.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTeam = User::whereIn('role', ['operator_wilayah',
        'mentor_penggerak'])->orderByDesc('id')->get();

        $mentors = $newTeam->filter(function ($user) {
            return $user->role == 'mentor_penggerak';
        });

        $operators = $newTeam->filter(function ($user) {
            return $user->role == 'operator_wilayah';
        });

        return view('dashboard.regions.create', compact('mentors', 'operators'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestRegion $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $region = Region::create($validated);

        return redirect(route('regions.index'))->with('success', 'Data wilayah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Region::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::findOrFail($id);
        $newTeam = User::whereIn('role', ['operator_wilayah',
        'mentor_penggerak'])->orderByDesc('id')->get();

        $mentors = $newTeam->filter(function ($user) {
            return $user->role == 'mentor_penggerak';
        });

        $operators = $newTeam->filter(function ($user) {
            return $user->role == 'operator_wilayah';
        });

        return view('dashboard.regions.edit', compact('region', 'mentors', 'operators'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestRegion $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $region = Region::findOrFail($id);

        $region->update($validated);

        return redirect(route('regions.index'))->with('success', 'Data wilayah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Region::findOrFail($id);
        $region->delete();

        return redirect(route('regions.index'))->with('success', 'Data wilayah berhasil dihapus.');
    }
}
