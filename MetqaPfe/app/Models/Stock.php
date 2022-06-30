<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks';

    protected $fillable = [
        'articleRef',
        'articleNom',
        'articlePrixVente',
        'articleQte',
        'fournisseur',
    ];

    public function idfournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur');
    }


}
