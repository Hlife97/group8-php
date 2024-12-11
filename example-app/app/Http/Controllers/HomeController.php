<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $name = 'John Doe';
        $email = 'johndoe@example.com';
        return view('home', compact('name', 'email'));
    }

    public function about(): View
    {
        return view('about');
    }

    public function blog($id)
    {
        return 'blog id: ' . $id;
    }

    public function contract(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        return 'Contract: ' . $year . '-' . $month;
    }

    public function users()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function documents($documentId): string
    {
        return route('documents', ['documentId' => $documentId]);
        return "Documents from home controller  - " . $documentId;
    }
}
