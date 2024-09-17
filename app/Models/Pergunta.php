<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Alternativa
 *
 * @property unsignedBigInteger $id
 * @property unsignedBigInteger $users_id
 * @property string $imagem
 * @property string $pergunta
 * @property integer $nivel
 * @property boolean $aprovada
 *
 */

class Pergunta extends Model
{
    use HasFactory;
    protected $table = 'pergunta';
    public $timestamps = true;

    protected $fillable = [
        'users_id',
        'imagem',
        'pergunta',
        'nivel',
        'aprovada'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'usuario_id','id');
    }

    public function alternativa(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Alternativa::class,'pergunta_id','id');
    }


    public function pergunta_subcategoria(): BelongsTo
    {
        return $this->belongsTo(PerguntaSubcategoria::class,'pergunta_id','id');
    }

        /*
    public function pergunta_subcategoria(): \Illuminate\Database\Eloquent\Relations\BelongsToMany{
        return $this->belongsToMany(Subcategoria::class, 'pergunta_subcategoria', 'pergunta_id', 'subcategoria_id');
    }
*/
    public function getAprovadaBadgeAttribute(){
        switch (strval($this->aprovada)) {
            case null:
                return '<label class="badge badge-secondary">Em análise</label>';
            case 0:
                return '<label class="badge badge-danger">Reprovada</label>';
            case 1:
                return '<label class="badge badge-success">Aprovada</label>';
        }
    }
}
