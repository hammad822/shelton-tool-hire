<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\ToolServices;
use Illuminate\Http\Request;

class ToolServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $Tool = Tool::find($request->tool_id);

       $service = $tool->services()->create([
           'type' => $request->service
        ]);
       foreach ($request->subServices as $subService){
           $service->subServices()->create([
               'type' => $subService
           ]);
       }

       return redirect()->back()->with('success','Services Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolServices  $toolServices
     * @return \Illuminate\Http\Response
     */
    public function show(ToolServices $toolServices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolServices  $toolServices
     * @return \Illuminate\Http\Response
     */
    public function edit(ToolServices $toolServices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ToolServices  $toolServices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToolServices $toolServices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolServices  $toolServices
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToolServices $toolServices)
    {
        //
    }
}
