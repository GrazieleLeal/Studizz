<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



/**
 * Class Categoria
 *
 * @property unsignedBigInteger $id
 * @property string $descricao
 *
 */

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    public $timestamps = true;

    protected $fillable = [
        'descricao'
    ];




    public function subcategoria(): HasMany
    {
        return $this->hasMany(Subcategoria::class,'categoria_id','id');
    }
}
