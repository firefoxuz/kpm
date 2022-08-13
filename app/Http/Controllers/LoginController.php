<?php

namespace App\Http\Controllers;

use App\Actions\LoginUserAction;
use App\Http\Requests\LoginRequest;
use App\Services\ToastrService;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showPage()
    {
        return view('auth.login');
    }

    /**
     * @param LoginRequest $request
     * @param LoginUserAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(LoginRequest $request, LoginUserAction $action): RedirectResponse
    {
        $is_logined = $action->login($request->get('email'), $request->get('password'));

        $is_logined ? ToastrService::addMessage('success', 'User successfully logged in')
            : ToastrService::addMessage('error', 'Login or password incorrect');

        return redirect()->route('home');
    }
}
