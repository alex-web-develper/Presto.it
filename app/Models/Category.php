<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Annuncement;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    public function annuncements()
    {
        return $this->hasMany(Annuncement::class)->where('is_accepted', true);
    }
}
