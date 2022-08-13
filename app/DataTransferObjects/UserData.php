<?php

namespace App\DataTransferObjects;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * @property string $email
 * @property string $password
 * @property string $name
 */
class UserData extends DataTransferObject
{
    public string $email;

    public string $password;

    public string $name;

    public static function fromArray(array $user): self
    {
        return new self([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
        ]);
    }

    public static function fromRequest(Request $request): self
    {
        return new self([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
    }
}
