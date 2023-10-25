<?php

namespace festochshop\shop\domaine\entities;

use festochshop\shop\domaine\dto\SpotDTO;

class Spot extends \Illuminate\Database\Eloquent\Model
{
    public $connection = 'festival';
    protected $table = 'Spot';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'address',
        'nb_standing',
        'nb_seated',
    ];

    public function images () {
        return $this->hasMany(SpotImage::class, 'spot_id');
    }

    public function toDTO(): SpotDTO
    {
        $imagesDTO = [];
        foreach ($this->images()->get() as $image) {
            $imagesDTO [] = $image->toDTO();
        }
        return new SpotDTO(
            $this->id,
            $this->name,
            $this->address,
            $this->nb_standing,
            $this->nb_seated,
            $imagesDTO
        );
    }



}