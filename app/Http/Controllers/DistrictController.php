<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Requests\RequestDistrict;
use App\Models\Region;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::orderByDesc('id');
        $districts = $districts->paginate(50);

        return view('dashboard.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mentors = User::where('role',
        'mentor_kecamatan')->orderByDesc('id')->get();
        $regions = Region::orderByDesc('id')->get();

        return view('dashboard.districts.create', compact('mentors', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestDistrict $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $district = District::create($validated);

        return redirect(route('districts.index'))->with('success', 'Data kecamatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return District::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $district = District::findOrFail($id);
        $mentors = User::where('role',
        'mentor_kecamatan')->orderByDesc('id')->get();
        $regions = Region::orderByDesc('id')->get();

        return view('dashboard.districts.edit', compact('district', 'mentors', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestDistrict $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $district = District::findOrFail($id);

        $district->update($validated);

        return redirect(route('districts.index'))->with('success', 'Data kecamatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::findOrFail($id);
        $district->delete();

        return redirect(route('districts.index'))->with('success', 'Data kecamatan berhasil dihapus.');
    }
}
