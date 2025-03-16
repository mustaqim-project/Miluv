<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;



class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    
        try {
            $request->user()->sendEmailVerificationNotification();
            Log::info('Email verifikasi berhasil dikirim ke: ' . $request->user()->email);
            return back()->with('status', 'verification-link-sent');
        } catch (\Exception $e) {
            Log::error('Gagal mengirim email verifikasi ke: ' . $request->user()->email . ' - Error: ' . $e->getMessage());
            return back()->with('error', 'Gagal mengirim email verifikasi.');
        }
    }
}

