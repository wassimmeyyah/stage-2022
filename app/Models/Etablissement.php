<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;

    protected $table='etablissement';
    protected $primaryKey ='ETABCode';


    protected $keyType = 'string';
    public $incrementing ='false';
    protected $connection ='mysql';
    /**
     * @var mixed
     */

    public function territoire(){
        return $this->hasOne(Territoire::class);
    }

    public function specialite(){
        return $this->hasOne(Specialite::class);
    }

    public function type(){
        return $this->hasOne(Type::class);
    }

    public function ville(){
        return $this->hasOne(Ville::class);
    }

    function porteur() {
        return $this->belongsTo('porteur', 'ETABCode');
    }

    function coordination() {
        return $this->belongsTo('coordination', 'ETABCode');
    }






}
