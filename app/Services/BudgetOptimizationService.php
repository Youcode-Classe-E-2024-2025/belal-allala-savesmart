<?php

namespace App\Services;

class BudgetOptimizationService
{
    public function optimize(float $income, float $needs, float $wants, float $savings): array
    {
        // Vérifier que la somme des priorités est égale à 100
        $totalPriority = $needs + $wants + $savings;
        if ($totalPriority != 100) {
            throw new \Exception("The sum of priorities must be equal to 100.");
        }

        // Calculer les montants alloués
        $needsAmount = $income * ($needs / 100);
        $wantsAmount = $income * ($wants / 100);
        $savingsAmount = $income * ($savings / 100);

        // Préparer le résultat
        $result = [
            'needs' => $needsAmount,
            'wants' => $wantsAmount,
            'savings' => $savingsAmount,
        ];

        return $result;
    }
}