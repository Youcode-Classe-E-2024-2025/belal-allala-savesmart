<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGoalRequest;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
         $families = $user->families;
        $goals = Goal::where('user_id', $user->id)->get();

        return view('goals.index', compact('goals', 'families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('goals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGoalRequest $request)
    {
        $validatedData = $request->validated();

        $goal = new Goal();
        $goal->user_id = auth()->user()->id;
        $goal->family_id = auth()->user()->family_id; // A ajuster en fonction du contexte familial
        $goal->description = $validatedData['description'];
        $goal->target_amount = $validatedData['target_amount'];
        $goal->current_amount = $validatedData['current_amount'];
        $goal->deadline = $validatedData['deadline'];
        $goal->save();

        return redirect()->route('goals.index')->with('success', 'Goal created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Goal $goal)
    {
        if (auth()->user()->id !== $goal->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('goals.show', compact('goal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goal $goal)
    {
        if (auth()->user()->id !== $goal->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('goals.edit', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreGoalRequest $request, Goal $goal)
    {
         if (auth()->user()->id !== $goal->user_id) {
                abort(403, 'Unauthorized action.');
            }

        $validatedData = $request->validated();

        $goal->description = $validatedData['description'];
        $goal->target_amount = $validatedData['target_amount'];
        $goal->current_amount = $validatedData['current_amount'];
        $goal->deadline = $validatedData['deadline'];
        $goal->save();

        return redirect()->route('goals.show', $goal->id)->with('success', 'Goal updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goal $goal)
    {
         if (auth()->user()->id !== $goal->user_id) {
                abort(403, 'Unauthorized action.');
            }

        $goal->delete();

        return redirect()->route('goals.index')->with('success', 'Goal deleted successfully!');
    }
}
