<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{
    /**
     * Redirect authenticated users to their appropriate portal
     */
    public function redirect()
    {
        if (!Auth::check()) {
            return redirect()->route('welcome');
        }

        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    /**
     * Show portal selection page for guests
     */
    public function select()
    {
        if (Auth::check()) {
            return $this->redirect();
        }

        return view('portal-select');
    }
} 