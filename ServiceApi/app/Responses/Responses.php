<?php

namespace App\Responses;

class Responses
{
    const pending = 'Pending';
    const active = 'Active';
    const cancelled = 'Cancelled';

    public function userCreated(): array
    {
        return [
          'message' => 'user created successfully',
          'response' => true
        ];
    }
}
