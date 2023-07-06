<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['id','name_en', 'name_sr'];
    // protected $table = "zanrovi"; Ovo dodajemo ako se ne pridrzavamo preporuke pa da on zna na koju tabelu da se poveze, napravljen je da trazi mnozinu reci koju smo stvili
    // protected $primaryKey = 'Moj_id' - menjamo koja kolona ima primarny kljuc ukoliko je potrebno
}
