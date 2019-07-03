<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dependentes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'data_nascimento', 'pessoa_id'
    ];


    /**
     * Get the dependent that owns the people.
     * @return collection
     */
    public function people()
    {
        return $this->belongsTo('App\Models\People', 'pessoa_id', 'id');
    }
}
