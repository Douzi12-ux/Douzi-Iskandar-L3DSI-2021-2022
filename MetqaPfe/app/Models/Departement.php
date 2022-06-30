<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    public function archives()
    {
        return $this->hasMany(archives::class);
    }

    public function reclamations()
    {
        return $this->hasMany(reclamations::class);
    }

    public function users()
    {
        return $this->hasMany(users::class);
    }
}
