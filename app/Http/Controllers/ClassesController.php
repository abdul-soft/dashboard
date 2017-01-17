<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\AcademicSession;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $classes = AcademicClass::paginate(25);

        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $sessions = AcademicSession::pluck('title','id');

        return view('classes.create', compact('sessions'));
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

        AcademicClass::create($requestData);

        Session::flash('flash_message', 'Class added!');

        return redirect('classes');
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
        $class = AcademicClass::findOrFail($id);

        return view('classes.show', compact('class'));
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
        $sessions = AcademicSession::pluck('title','id');

        $class = AcademicClass::findOrFail($id);

        return view('classes.edit', compact('class', 'sessions'));
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
        
        $class = AcademicClass::findOrFail($id);
        $class->update($requestData);

        Session::flash('flash_message', 'Class updated!');

        return redirect('classes');
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
        AcademicClass::destroy($id);

        Session::flash('flash_message', 'Class deleted!');

        return redirect('classes');
    }
}
