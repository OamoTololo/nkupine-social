<?php

namespace App\Service;

use App\Entity\Loan;

class LoanService
{
    public function calculateLoanInterest(Loan $amount): float
    {
        return ($amount / 100) * 20;
    }
}