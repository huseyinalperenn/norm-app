<?php

namespace App\Http\Controllers;

use App\Interfaces\UserAddressServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    /**
     * @param Request $request
     * @param UserAddressServiceInterface $userAddressService
     * @return RedirectResponse
     */
    public function store(
        Request $request,
        UserAddressServiceInterface $userAddressService
    ): RedirectResponse
    {
        $userAddressService->store([
            'user_id' => $request->user()->id,
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'zip' => $request->input('zip')
        ]);
        return redirect()->back();
    }
}
