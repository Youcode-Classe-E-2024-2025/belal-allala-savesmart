<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use App\Models\Category;
use App\Http\Requests\StoreRevenueRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $families = $user->families;
        $revenues = Revenue::where('user_id', $user->id)->get();

        return view('revenues.index', compact('revenues', 'families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $categories = Category::where('user_id', $user->id)
            ->where(function ($query) use ($user) {
                $query->where('family_id', null)
                    ->orWhere('family_id', $user->family_id);
            })
            ->orderBy('name')
            ->get();

        return view('revenues.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRevenueRequest $request)
    {
        $validatedData = $request->validated();

        $revenue = new Revenue();
        $revenue->user_id = auth()->user()->id;
        $revenue->family_id = auth()->user()->family_id; // Remplacer par la logique pour déterminer le family_id
        $revenue->description = $validatedData['description'];
        $revenue->amount = $validatedData['amount'];
        $revenue->date = $validatedData['date'];
        $revenue->category_id = $validatedData['category_id'];
        $revenue->save();

        return redirect()->route('revenues.index')->with('success', 'Revenue created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Revenue $revenue)
    {
        if (auth()->user()->id !== $revenue->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('revenues.show', compact('revenue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Revenue $revenue)
    {
        if (auth()->user()->id !== $revenue->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('revenues.edit', compact('revenue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRevenueRequest $request, Revenue $revenue)
    {
         if (auth()->user()->id !== $revenue->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validated();

        $revenue->description = $validatedData['description'];
        $revenue->amount = $validatedData['amount'];
        $revenue->date = $validatedData['date'];
        $revenue->category = $validatedData['category'];
        $revenue->save();

        return redirect()->route('revenues.show', $revenue->id)->with('success', 'Revenue updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Revenue $revenue)
    {
         if (auth()->user()->id !== $revenue->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $revenue->delete();

        return redirect()->route('revenues.index')->with('success', 'Revenue deleted successfully!');
    }
}
