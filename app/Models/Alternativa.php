<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Alternativa
 *
 * @property unsignedBigInteger $id
 * @property unsignedBigInteger $pergunta_id
 * @property string $descricao
 * @property boolean $correta
 *
 *
 */

class Alternativa extends Model
{
    use HasFactory;
    protected $table = 'alternativa';
    public $timestamps = true;


    protected $fillable = [
        'pergunta_id',
        'descricao',
        'correta'
    ];




    public function pergunta(): BelongsTo
    {
        return $this->belongsTo(Pergunta::class,'pergunta_id','id');
    }
}
