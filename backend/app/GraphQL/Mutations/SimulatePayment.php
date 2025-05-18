<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Payment;

class SimulatePayment
{
    public function __invoke($_, array $args)
    {
        return Payment::create([
            'project_id' => $args['project_id'],
            'amount' => $args['amount'],
            'status' => 'completed'
        ]);
    }
}

