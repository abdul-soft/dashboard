<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\DashboardPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user  = Auth::user();

        if($user->hasRole('student')){
            $dashboard = Dashboard::firstOrCreate([
                'class_id'=>$user->class_id,
                'session_id' => $user->session_id
            ]);
            $posts = $dashboard->posts()->orderBy('created_at','desc')->paginate();
            return view('student.dashboard', compact('posts'));
        }
        if($user->hasRole('teacher')){
            return view('teacher.dashboard');
        }

    }


    public function createPost()
    {
        return view('student.create_post');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storePost(Request $request)
    {
        $user = Auth::user();

        $file = $request->file('file_url');
        $file->move('uploads',$file->getClientOriginalName());

        $dashboard = Dashboard::where('session_id', $user->session_id)->where('class_id',$user->class_id)->first();

        $request->merge(['dashboard_id' => $dashboard->id, 'user_id'=> $user->id]);

        $requestData = $request->all();
        $requestData['file_url'] = 'uploads/'.$file->getClientOriginalName();

        DashboardPost::create($requestData);

        Session::flash('flash_message', 'DashboardPost added!');

        return redirect('/');
    }

}
