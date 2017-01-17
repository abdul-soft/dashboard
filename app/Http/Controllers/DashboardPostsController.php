<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DashboardPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class DashboardPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $dashboardposts = DashboardPost::paginate(25);

        return view('dashboard-posts.index', compact('dashboardposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard-posts.create');
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
        $file = $request->file('file_url');
        $file->move('uploads',$file->getClientOriginalName());

        $request->merge(['user_id' => Auth::user()->id]);
        $requestData = $request->all();
        $requestData['file_url'] = 'uploads/'.$file->getClientOriginalName();

        DashboardPost::create($requestData);

        Session::flash('flash_message', 'DashboardPost added!');

        return redirect('dashboard-posts');
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
        $dashboardpost = DashboardPost::findOrFail($id);

        return view('dashboard-posts.show', compact('dashboardpost'));
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
        $dashboardpost = DashboardPost::findOrFail($id);

        return view('dashboard-posts.edit', compact('dashboardpost'));
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
        $request->merge(['user_id' => Auth::user()->id]);

        $requestData = $request->all();
        
        $dashboardpost = DashboardPost::findOrFail($id);
        $dashboardpost->update($requestData);

        Session::flash('flash_message', 'DashboardPost updated!');

        return redirect('dashboard-posts');
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
        DashboardPost::destroy($id);

        Session::flash('flash_message', 'DashboardPost deleted!');

        return redirect('dashboard-posts');
    }
}
