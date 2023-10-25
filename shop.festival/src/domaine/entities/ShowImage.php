<?php

namespace festochshop\shop\domaine\entities;

use festochshop\shop\domaine\dto\ShowImageDTO;
use Illuminate\Database\Eloquent\Model;

class ShowImage extends Model
{
    public $connection = 'festival';
    protected $table = 'ShowImage';
    protected $primaryKey = 'id';

    public function toDTO() {
        return new ShowImageDTO($this->id, $this->path);
    }

}