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
}