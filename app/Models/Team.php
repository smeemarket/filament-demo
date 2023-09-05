<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Filament\Models\Contracts\HasCurrentTenantLabel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model implements HasCurrentTenantLabel
{
    use HasFactory;

    public function getCurrentTenantLabel(): string
    {
        return 'Current team';
    }

    protected $fillable = ['name', 'slug'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
