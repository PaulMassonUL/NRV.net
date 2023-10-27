<?php

namespace festochshop\shop\domaine\entities;

use festochshop\shop\domaine\dto\shop\TicketDTO;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $connection = 'festival';
    protected $table = 'Ticket';
    protected $primaryKey = 'id';
    public $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'date',
        'barcode',
        'client_mail',
        'evening_id',
        'id_command',
        'price'
    ];

    public function evening () {
        return $this->belongsTo(Evening::class, 'evening_id');
    }


    public function toDTO()
    {
        $ticketDT0 = new TicketDTO($this->date, $this->barcode, $this->client_email, $this->evening_id, $this->price);
        $ticketDT0->id = $this->id;
        return $ticketDT0;
    }

}