<?php

namespace App\Http\Controllers;

use App\Services\GooglePeopleServices;
use Illuminate\Http\Request;

class UserContactController extends Controller
{
    /**
     * @var GooglePeopleServices
     */
    private $service;

    public function __construct(GooglePeopleServices $service)
    {
        $this->service = $service;
    }

    public function listUserContacts(Request $request)
    {
        if ($request->session()->has('socialUser')) {
            $user = $request->session()->get('socialUser');
            $contacts = $this->service->getUserContacts($user);
            return view('contacts', ['contacts' => $contacts]);
        }
        return redirect()->route('login');
    }
}
