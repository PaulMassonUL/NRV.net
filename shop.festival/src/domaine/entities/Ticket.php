<?php

namespace festochshop\shop\domaine\entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $connection = 'festival';
    protected $table = 'Ticket';
    protected $primaryKey = 'id';

    public function toDTO() {

    }

}