<?php

namespace App\Models\Shield;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'users';
}
