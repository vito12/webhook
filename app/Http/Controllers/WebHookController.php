<?php

namespace App\Http\Controllers;

use App\WebHook;
use App\Jobs\SendWebHook;
use Illuminate\Http\Request;

class WebHookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //se si passa un modello al dispacher lui frà la query per riprenderlo
        dispatch(new SendWebHook($request->webHook));
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
        // dd($request->all());
        // $webHook = WebHook::create(['webHook' => $request->webHook]);

        WebHook::create($request->all());

        return response(null, 202);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\weebHook  $weebHook
     * @return \Illuminate\Http\Response
     */
    public function show(weebHook $weebHook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\weebHook  $weebHook
     * @return \Illuminate\Http\Response
     */
    public function edit(weebHook $weebHook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\weebHook  $weebHook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, weebHook $weebHook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\weebHook  $weebHook
     * @return \Illuminate\Http\Response
     */
    public function destroy(weebHook $weebHook)
    {
        //
    }
}
