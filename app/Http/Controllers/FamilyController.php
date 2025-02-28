<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Invitation;
use App\Http\Requests\StoreFamilyRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\InvitationSent;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\GenerateInvitationRequest;

class FamilyController extends Controller
{    
    public function index()
    {
        $families = auth()->user()->families;

        return view('families.index', compact('families'));
    }
    
    public function create()
    {
        return view('families.create');
    }

   
    public function store(StoreFamilyRequest $request)
    {
        $validatedData = $request->validated();

        $family = Family::create([
            'name' => $validatedData['name'],
        ]);

        auth()->user()->families()->attach($family->id, ['is_owner' => true, 'permissions' => 'admin']);

        return redirect()->route('families.show', $family->id); 
    }


    public function show(Family $family)
    {
        if (! Gate::allows('view', $family)) {
            abort(403);
        }

        return view('families.show', compact('family'));
    }

    public function manage(Family $family)
    {
        if (! Gate::allows('manage', $family)) {
            abort(403);
        }
        $invitations = Invitation::where('family_id', $family->id)->get();

        return view('families.manage', compact('family', 'invitations'));
    }

    public function generateInvitation(GenerateInvitationRequest $request, Family $family)
    {
        if (! Gate::allows('generateInvitation', $family)) {
            abort(403);
        }

        $request->validate([
            'email' => 'nullable|email|max:255',
        ]);

        $invitationCode = Str::random(60); 

        $invitation = Invitation::create([
            'family_id' => $family->id,
            'code' => $invitationCode,
            'email' => $request->input('email'),
            'expires_at' => now()->addDays(7), // Expiration après 7 jours
        ]);

        // Envoi de l'e-mail
        Mail::to($request->input('email'))->send(new InvitationSent($invitation));

        return redirect()->route('families.manage', $family->id)->with('success', 'Invitation code generated successfully!');
    }

    public function destroy(Family $family)
    {
        if (! Gate::allows('manage', $family)) {
            abort(403);
        }

        // Dissocier tous les utilisateurs de la famille avant de la supprimer
        $family->users()->detach();

        $family->delete();

        return redirect()->route('families.index')->with('success', 'Family deleted successfully!');
    }
}