<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\PATCreation;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    //
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): Response
    {
        $id = $request->input('user_id');
        $user = User::findOrFail($id);
        $current_user = $request->user();

        if ($current_user->id == $user->id) {
            Auth::logout();
            $user->delete();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect(RouteServiceProvider::HOME);
        }

        if ($current_user->is_admin) {
            $user->delete();

            return redirect(RouteServiceProvider::HOME);
        }

        return back()->withErrors(['user_id' => 'You are either not admin nor the owner of the account to delete']);
    }

    public function pat(Request $request)
    {
        $request->user()->tokens()->delete();
        $token = $request->user()->createToken("DestorePAT");

        $request->user()->notify(new PATCreation($token->plainTextToken));
        session()->flash('success_notification', "Your new PAT token have been sent to your email.");

        return back();
    }
}
