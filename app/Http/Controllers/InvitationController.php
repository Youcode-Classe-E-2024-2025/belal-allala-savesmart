<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function accept(string $code)
    {
        $invitation = Invitation::where('code', $code)->first();

        if (!$invitation) {
            abort(404);
        }

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('invitation_code', $code);
        }

        // Attacher l'utilisateur *qui accepte l'invitation* au groupe familial
        $user->families()->attach($invitation->family_id, ['is_owner' => false, 'permissions' => $invitation->permissions]);

        $invitation->delete();

        return redirect()->route('home');
    }
}