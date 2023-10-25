<?php

namespace festochshop\shop\domaine\entities;

use festochshop\shop\domaine\dto\SpotDTO;
use festochshop\shop\domaine\dto\SpotImageDTO;
use Illuminate\Database\Eloquent\Model;

class SpotImage extends Model
{
    public $connection = "festival";
    protected $table = 'SpotImage';
    protected $primaryKey = 'id';

    public function toDTO () {
        return new SpotImageDTO($this->id, $this->path);
    }

}