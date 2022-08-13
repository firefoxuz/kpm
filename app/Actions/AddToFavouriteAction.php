<?php

namespace App\Actions;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class AddToFavouriteAction
{
    public function execute(Contact $contact)
    {
        $exact_contact = \auth()->user()->contacts()->where('contact_id', $contact->id)->first();

        if (!$exact_contact) {
            Auth::user()->contacts()->attach($contact);
            return true;
        }

        return false;
    }
}
