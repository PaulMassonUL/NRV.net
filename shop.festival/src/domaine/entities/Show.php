<?php

namespace festochshop\shop\domaine\entities;

use festochshop\shop\domaine\dto\ShowDTO;

class Show extends \Illuminate\Database\Eloquent\Model
{
    public $connection = 'festival';
    protected $table = 'Show';
    protected $primaryKey = 'id';

    public function toDTO(): ShowDTO
    {
        return new ShowDTO(
            $this->id,
            $this->title,
            $this->description,
            $this->time,
            $this->video,
            $this->evening_id
        );
    }
}