<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Requests\RequestSupport;
use Illuminate\Support\Facades\Hash;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supports = Support::orderByDesc('id');
        $supports = $supports->paginate(50);

        return view('dashboard.supports.index', compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.supports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestSupport $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        if($request->hasFile('foto_tampak_depan_rumah')){
            $fileName = time() . '.' . $request->foto_tampak_depan_rumah->extension();
            $validated['foto_tampak_depan_rumah'] = $fileName;

            // move file
            $request->foto_tampak_depan_rumah->move(public_path('uploads/images'), $fileName);
        }

        $support = Support::create($validated);

        return redirect(route('supports.index'))->with('success', 'Data dukungan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Support::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $support = Support::findOrFail($id);

        return view('dashboard.supports.edit', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestSupport $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $support = Support::findOrFail($id);

        $validated['foto_tampak_depan_rumah'] = $support->foto_tampak_depan_rumah;

        if($request->hasFile('foto_tampak_depan_rumah')){
            $fileName = time() . '.' . $request->foto_tampak_depan_rumah->extension();
            $validated['foto_tampak_depan_rumah'] = $fileName;

            // move file
            $request->foto_tampak_depan_rumah->move(public_path('uploads/images'), $fileName);

            // delete old file
            $oldPath = public_path('/uploads/images/'.$support->foto_tampak_depan_rumah);
            if(file_exists($oldPath) && $support->foto_tampak_depan_rumah != 'default.png'){
                unlink($oldPath);
            }
        }

        $support->update($validated);

        return redirect(route('supports.index'))->with('success', 'Data dukungan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $support = Support::findOrFail($id);
        // delete old file
        $oldPath = public_path('/uploads/images/'.$support->foto_tampak_depan_rumah);
        if(file_exists($oldPath) && $support->foto_tampak_depan_rumah != 'default.png'){
            unlink($oldPath);
        }
        $support->delete();

        return redirect(route('supports.index'))->with('success', 'Data dukungan berhasil dihapus.');
    }
}
