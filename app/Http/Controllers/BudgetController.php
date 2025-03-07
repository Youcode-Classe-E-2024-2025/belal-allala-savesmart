<?php

namespace App\Http\Controllers;

use App\Services\BudgetOptimizationService;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    protected $budgetOptimizer;

    public function __construct(BudgetOptimizationService $budgetOptimizer)
    {
        $this->budgetOptimizer = $budgetOptimizer;
    }

    public function optimize(Request $request)
    {
        $validatedData = $request->validate([
            'income' => 'required|numeric|min:0',
            'needs' => 'required|numeric|min:0|max:100',
            'wants' => 'required|numeric|min:0|max:100',
            'savings' => 'required|numeric|min:0|max:100',
        ]);

        try {
            $result = $this->budgetOptimizer->optimize(
                $validatedData['income'],
                $validatedData['needs'],
                $validatedData['wants'],
                $validatedData['savings']
            );

            return view('budget.results', compact('result'));
        } catch (\Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function showOptimizationForm()
    {
        return view('budget.form');
    }
}
