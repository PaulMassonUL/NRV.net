<?php

namespace festochshop\shop\domaine\entities;

use festochshop\shop\domaine\dto\shop\ShowImageDTO;
use Illuminate\Database\Eloquent\Model;

class ShowImage extends Model
{
    public $connection = 'festival';
    protected $table = 'ShowImage';
    protected $primaryKey = 'id';

    protected $fillable = [
        'path',
        'show_id',
    ];

    public function toDTO() {
        return new ShowImageDTO($this->id, $this->path);
    }

}