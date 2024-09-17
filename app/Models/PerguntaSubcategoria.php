<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubCategoria
 *
 * @property unsignedBigInteger $pergunta_id
 * @property unsignedBigInteger $subcategoria_id
 *
 */

class PerguntaSubcategoria extends Model
{
    use HasFactory;
    protected $table = 'pergunta_subcategoria';
    public $timestamps = true;

    protected $fillable = [
        'pergunta_id',
        'subcategoria_id'
    ];

/*
    public function pergunta(): HasMany
    {
        return $this->hasMany(Pergunta::class,'pergunta_id','id');
    }
        */
    public function pergunta(): \Illuminate\Database\Eloquent\Relations\BelongsToMany{
        return $this->belongsToMany(Pergunta::class, 'pergunta_subcategoria', 'subcategoria_id', 'pergunta_id');
    }

    public function subcategoria(): HasMany
    {
        return $this->hasMany(Subcategoria::class,'subcategoria_id','id');
    }
}
