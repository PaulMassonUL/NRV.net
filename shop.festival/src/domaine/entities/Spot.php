<?php

namespace festochshop\shop\domaine\entities;

use festochshop\shop\domaine\dto\SpotDTO;

class Spot extends \Illuminate\Database\Eloquent\Model
{
    public $connection = 'festival';
    protected $table = 'Spot';
    protected $primaryKey = 'id';

    public function toDTO(): SpotDTO
    {
        return new SpotDTO(
            $this->id,
            $this->name,
            $this->address,
            $this->nb_standing,
            $this->nb_seated
        );
    }



}