<?php

namespace festochshop\shop\domaine\dto\shop;

use Illuminate\Database\Eloquent\Model;

class TicketDTO extends Model
{
    public string $id;
    public string $date;
    public string $barcode;
    public string $client_email;
    public int $evening_id;
    public string $id_command;
    public int $price;

    public function __construct (string $date, string $barcode, string $client_email, int $evening_id, string $id_command, int $price) {
        $this->date = $date;
        $this->barcode = $barcode;
        $this->client_email = $client_email;
        $this->evening_id = $evening_id;
        $this->id_command = $id_command;
        $this->price = $price;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'barcode' => $this->barcode,
            'client_mail' => $this->client_email,
            'evening_id' => $this->evening_id,
            'id_command' => $this->id_command,
            'price' => $this->price
        ];
    }
}