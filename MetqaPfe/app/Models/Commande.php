<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    public function idclients()
    {
        return $this->belongsTo(User::class, 'idclient');
    }

    
}
