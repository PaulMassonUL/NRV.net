<?php

namespace festochshop\shop\domaine\entities;

use Illuminate\Database\Eloquent\Model;

class SpotImage extends Model
{
    public $connection = "festival";
    protected $table = 'SpotImage';
    protected $primaryKey = 'id';

    public function toDTO () {

    }

}