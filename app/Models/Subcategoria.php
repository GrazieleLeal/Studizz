<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubCategoria
 *
 * @property unsignedBigInteger $id
 * @property unsignedBigInteger $categoria_id
 * @property string $descricao
 *
 */


class Subcategoria extends Model
{
    use HasFactory;
    protected $table = 'subcategoria';
    public $timestamps = true;

    protected $fillable = [
        'categoria_id',
        'descricao',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'categoria_id','id');
    }

    public function pergunta_subcategoria()
    {
        return $this->belongsTo(PerguntaSubcategoria::class,'subcategoria_id','id');
    }
}
