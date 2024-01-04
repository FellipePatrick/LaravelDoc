<?php

namespace App\Filters;
use Illuminate\Http\Request;


class InvoiceFilters{
    protected array $allowedOperatorsFields = [
        'value' => ['gt', 'eq', 'lt', 'gte', 'lte', 'ne'],
        'type' => ['eq', 'ne', 'in'],
        'paid' => ['eq', 'ne'],
        'payment_date' => ['gt', 'eq', 'lt', 'gte', 'lte', 'ne'],
    ];

    protected array $transalateOperatorsFields = [
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
        'eq' => '=',
        'ne' => '!=',
        'in' => 'in',
    ];
    public function filter(Request $request){

    }
}