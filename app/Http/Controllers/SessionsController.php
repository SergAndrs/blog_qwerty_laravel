<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    /**
     * Don't allow authenticated user see all except
     * 'Log out' method.
     *
     * SessionsController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    /**
     * Display the form for 'log in'.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * 'Log in' method.
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function store()
    {
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Check if you registered.'
            ]);
        };

        return redirect('/');
    }

    /**
     * 'Log out' method.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
