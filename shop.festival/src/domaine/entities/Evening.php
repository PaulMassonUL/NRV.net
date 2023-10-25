<?php

namespace festochshop\shop\domaine\entities;

use festochshop\shop\domaine\dto\EveningDTO;

class Evening
{
    protected $connection = 'festival';
    protected $table = 'Evening';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function toDTO() {
        $evening = new EveningDTO($this->name,  $this->thematic, $this->date,  $this->price,  $this->reducted_price);
        $evening->id = $this->id;
        return $evening;
    }
}