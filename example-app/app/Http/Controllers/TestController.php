<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        return "Hello from invoke method";
    }

    public function documents($documentId)
    {
        return route('documents', ['documentId' => $documentId]);

        return "Documents from Test controller  - " . $documentId;
    }
}
