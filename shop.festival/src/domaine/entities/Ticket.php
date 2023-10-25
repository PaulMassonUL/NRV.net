<?php

namespace festochshop\shop\domaine\entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $connection = 'festival';
    protected $table = 'Ticket';
    protected $primaryKey = 'id';

    protected $fillable = [
        'price',
        'quantity',
        'evening_id',
        'user_id'
    ];

    public function toDTO() {

    }

}