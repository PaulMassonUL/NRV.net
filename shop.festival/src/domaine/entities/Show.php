<?php

namespace festochshop\shop\domaine\entities;

class Show extends \Illuminate\Database\Eloquent\Model
{
    public $connection = 'festival';
    protected $table = 'Show';
    protected $primaryKey = 'id';


}