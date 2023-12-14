<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\forgetPasswordMail;
use Illuminate\Support\Str;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {



        $request->validate([
            'email' => ['required', 'email'],
        ]);

       

        $record = User::where('email', $request->email)->exists();
        $user = User::where('email', $request->email)->first();

        // dd($user);
        if(!empty($record)){
            $user->setRememberToken(Str::random(30));
            $user->save();
        Mail::to($user)->send(new forgetPasswordMail($user));
        return redirect()->back()->with('success', 'We have sent your password reset link!');
        }
        else
        {
            return redirect()->back()->with('error', "this email don't meet our credintials");
        }




    }
}
