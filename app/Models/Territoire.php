<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Territoire extends Model
{
    use HasFactory;

    protected $table='territoire';
    protected $primaryKey ='TERRCode';


    protected $keyType = 'string';
    public $incrementing ='false';
    protected $connection ='mysql';
}
