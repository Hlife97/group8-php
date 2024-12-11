<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();
        $created = Contact::create($validated);

        if(!$created)
            return redirect()->back()->with('error','Something went wrong');

        Session::flash('success','Your message has been sent');

        return redirect()->back()->with('success', 'You message has been sent successfully!');
    }
}
