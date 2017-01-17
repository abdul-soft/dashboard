<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\AcademicSession;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Dashboard;
use Illuminate\Http\Request;
use Session;

class DashboardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $dashboards = Dashboard::paginate(25);

        return view('dashboards.index', compact('dashboards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $sessions = AcademicSession::pluck('title','id');

        $classes = AcademicClass::pluck('name','id');

        return view('dashboards.create', compact('classes', 'sessions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Dashboard::create($requestData);

        Session::flash('flash_message', 'Dashboard added!');

        return redirect('dashboards');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $dashboard = Dashboard::findOrFail($id);

        return view('dashboards.show', compact('dashboard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $dashboard = Dashboard::findOrFail($id);

        $sessions = AcademicSession::pluck('title','id');

        $classes = AcademicClass::pluck('name','id');


        return view('dashboards.edit', compact('dashboard','classes','sessions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $dashboard = Dashboard::findOrFail($id);
        $dashboard->update($requestData);

        Session::flash('flash_message', 'Dashboard updated!');

        return redirect('dashboards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Dashboard::destroy($id);

        Session::flash('flash_message', 'Dashboard deleted!');

        return redirect('dashboards');
    }
}
