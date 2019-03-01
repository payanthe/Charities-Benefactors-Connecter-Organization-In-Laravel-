<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefactor extends Model
{
    //
    protected $table = 'benefactor';

    protected $fillable = [
        'id','user_id','username','birth_date','gender','location_id', 'address','abilities','favorite_field','abilities_id',
    ];

    public function abilities(){
        return $this->belongsTo('App\Abilities','favorite_field');
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }
}
