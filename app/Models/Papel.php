<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubCategoria
 *
 * @property unsignedBigInteger $id
 * @property string $descricao
 *
 */

class Papel extends Model
{
    use HasFactory;
    protected $table = 'papel';
    public $timestamps = true;

    protected $fillable = [
        'descricao',
    ];


    public function user(): HasMany
    {
        return $this->hasMany(User::class,'papel_id','id');
    }
}
