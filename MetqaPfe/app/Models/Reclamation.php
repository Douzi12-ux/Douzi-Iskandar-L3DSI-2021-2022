<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    public function iddepartemente()
    {
        return $this->belongsTo(Departement::class, 'iddepartement');
    }
}
