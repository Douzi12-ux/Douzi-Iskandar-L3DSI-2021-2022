<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $table = 'fournisseurs';

    protected $fillable = [
        'nom',
        'email',
        'phone',
        'logo_image',
    ];

    public function stocks()
    {
        return $this->hasMany(stocks::class);
    }


}
