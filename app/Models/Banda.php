<?php

namespace App\Models;

use App\Http\Controllers\ArtistaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banda extends Model
{
    use HasFactory;
    
    public function Banda(){
        return $this->hasMany(Artista::class);
    }
}
