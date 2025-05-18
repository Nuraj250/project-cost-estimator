<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use App\Models\Staff;
use App\Models\Payment;
use App\Models\OfficeExpense;

class DeleteEntities
{
    public function deleteProject($_, array $args)
    {
        $project = Project::findOrFail($args['id']);
        $project->delete();
        return $project;
    }

    public function deleteStaff($_, array $args)
    {
        $staff = Staff::findOrFail($args['id']);
        $staff->delete();
        return $staff;
    }

    public function deletePayment($_, array $args)
    {
        $payment = Payment::findOrFail($args['id']);
        $payment->delete();
        return $payment;
    }

    public function deleteOfficeExpense($_, array $args)
    {
        $expense = OfficeExpense::findOrFail($args['id']);
        $expense->delete();
        return $expense;
    }
}
