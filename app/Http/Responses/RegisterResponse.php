<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Laravel\Fortify\Fortify; // Import Fortify facade

class RegisterResponse implements RegisterResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        // --- Add your flash message here ---
        session()->flash('status', 'Registration successful! Welcome aboard!');
        // You can use any key ('status', 'success', 'message', etc.)
        // and any message you like.

        // --- Define your custom redirect ---
        // Option 1: Redirect to a named route (Recommended)
        $redirectUrl = "/"; // Or 'profile.show', or any other named route

        // Option 2: Redirect to a specific URI
        // $redirectUrl = '/welcome'; // Or '/my-custom-page'

        // Option 3: Redirect to the intended URL or Fortify's configured home
        // This is the default Fortify behaviour, useful if you only want to add the flash message
        // $redirectUrl = Fortify::redirects('register', route('dashboard')); // Provides a fallback

        // Perform the redirect
        return $request->wantsJson()
                    ? new JsonResponse(['message' => 'Registration successful.'], 201) // Keep JSON response for APIs
                    : redirect()->intended($redirectUrl)->with('success', 'Logged in successfully!'); // Use intended() for flexibility or just redirect()
                    // Using redirect($redirectUrl); is simpler if you always want to go to that specific page.
    }
}