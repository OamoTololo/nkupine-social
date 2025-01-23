<?php

namespace App\Service;

use App\Entity\Contribution;

class ContributionsService
{
    public function calculateTotal(Contribution $contributions): float
    {
        $total = 0;

        foreach ($contributions as $contribution) {
            if (!$contribution->getIsFine()) {
                $total += $contribution->getAmount();
            }
        }

        return $total;
    }

    public function generateStatement(Contribution $contributions): string
    {
        $statement = '';

        foreach ($contributions as $contribution) {
            $statement .= $contribution->getDate()->format('Y-m-d') . $contribution->getAmount() . PHP_EOL;
        }

        return $statement;
    }
}