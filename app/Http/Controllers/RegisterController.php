<?php

namespace App\Http\Controllers;

use App\Actions\StoreRegisterAction;
use App\DataTransferObjects\RegisterData;
use App\Http\Requests\RegisterRequest;
use App\Services\ToastrService;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('register.create');
    }

    /**
     * @param RegisterRequest $request
     * @param StoreRegisterAction $action
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request, StoreRegisterAction $action): RedirectResponse
    {
        $data = RegisterData::fromRequest($request);
        $is_created = $action->execute($data);
        $is_created ? ToastrService::addMessage('success', 'User successfully registered.')
            : ToastrService::addMessage('error', 'User registration failed');
        return redirect()->back();
    }
}
