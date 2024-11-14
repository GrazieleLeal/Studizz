<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubCategoria
 *
 * @property unsignedBigInteger $id
 * @property unsignedBigInteger $usuario_id
 * @property string $descricao
 *
 */

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    public $timestamps = true;

    protected $fillable = [
        'usuario_id',
        'descricao',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'usuario_id','id');
    }
}
