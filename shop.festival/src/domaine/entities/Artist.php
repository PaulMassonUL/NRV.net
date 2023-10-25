<?php

namespace festochshop\shop\domaine\entities;

use festochshop\shop\domaine\dto\ArtistDTO;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $connection = 'festival';
    protected $table = 'Artist';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'show_id'
    ];

    public function toDTO() {
        return new ArtistDTO($this->id, $this->name);
    }
}