<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pessoas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'data_nascimento', 'nome_arquivo_foto', 'foto_base64', 'status'
    ];

    /**
     * A people may have multiple dependents.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dependents()
    {
        return $this->hasMany('App\Models\Dependent', 'pessoa_id', 'id');
    }
}
