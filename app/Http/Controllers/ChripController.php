<?php

namespace App\Http\Controllers;

use App\Models\Chrip;
use Illuminate\Http\Request;

class ChripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chrips.index', [
            'chrips' => Chrip::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255'
        ]);

        $request->user()->chrips()->create($validated);

        return redirect(route('chrips.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chrip  $chrip
     * @return \Illuminate\Http\Response
     */
    public function show(Chrip $chrip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chrip  $chrip
     * @return \Illuminate\Http\Response
     */
    public function edit(Chrip $chrip)
    {
        $this->authorize('update', $chrip);

        return view('chrips.edit', [
            'chrip' => $chrip
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chrip  $chrip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chrip $chrip)
    {
        $this->authorize('update', $chrip);

        $validated = $request->validate([
            'message' => 'required|max:255|string',
        ]);

        $chrip->update($validated);

        return redirect(route('chrips.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chrip  $chrip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chrip $chrip)
    {
        //
    }
}
