<?php

namespace App\Service;

use App\Entity\Loan;

class LoanService
{
    public function calculateLoanInterest(Loan $amount): float
    {
        return ($amount / 100) * 20;
    }

    public function trackRepayments(Loan $loan, float $repayment): void
    {
        $loan->setRepayment($loan->getRepayment() + $repayment);
    }
}