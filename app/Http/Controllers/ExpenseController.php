<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Controllers\CategoryController;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
         $families = $user->families;
        $expenses = Expense::where('user_id', $user->id)->get();

        return view('expenses.index', compact('expenses', 'families'));
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

        return view('expeneses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRequest $request)
    {
        $validatedData = $request->validated();

        $expense = new Expense();
        $expense->user_id = auth()->user()->id;
        $expense->family_id = auth()->user()->family_id; // Remplacer par la logique pour déterminer le family_id
        $expense->description = $validatedData['description'];
        $expense->amount = $validatedData['amount'];
        $expense->date = $validatedData['date'];
        $expense->category_id = $validatedData['category_id'];
        $expense->save();

        return redirect()->route('expenses.index')->with('success', 'Expense created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        if (auth()->user()->id !== $expense->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
         if (auth()->user()->id !== $expense->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExpenseRequest $request, Expense $expense)
    {
         if (auth()->user()->id !== $expense->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validated();

        $expense->description = $validatedData['description'];
        $expense->amount = $validatedData['amount'];
        $expense->date = $validatedData['date'];
        $expense->category = $validatedData['category'];
        $expense->save();

        return redirect()->route('expenses.show', $expense->id)->with('success', 'Expense updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
         if (auth()->user()->id !== $expense->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully!');
    }
}
