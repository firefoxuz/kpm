<?php

namespace App\Http\Controllers;

use App\Actions\AddToFavouriteAction;
use App\Models\Contact;
use App\Services\ToastrService;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $favourite_contacts = Auth::user()->contacts;
        return view('contact.index', [
            'contacts' => $contacts,
            'favourite_contacts' => $favourite_contacts,
        ]);
    }

    public function addToFavourite(Contact $contact, AddToFavouriteAction $action)
    {
        $is_added = $action->execute($contact);

        $is_added ? ToastrService::addMessage('success', 'Marked as favourite')
            : ToastrService::addMessage('error', 'Something went wrong');

        return redirect()->back();
    }

}
