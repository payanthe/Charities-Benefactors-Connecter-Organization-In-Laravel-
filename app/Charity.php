<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    protected $table = 'charity';
    //
    protected $fillable = [
        'id','user_id','username','location_id', 'address','required_abilities','latest_records','abilities_id',
    ];
    public function location(){
        return $this->belongsTo('App\Location');
    }
}
