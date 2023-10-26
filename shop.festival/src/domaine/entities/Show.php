<?php

namespace festochshop\shop\domaine\entities;

use festochshop\shop\domaine\dto\shop\ShowDTO;

class Show extends \Illuminate\Database\Eloquent\Model
{
    public $connection = 'festival';
    protected $table = 'Show';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'time',
        'video',
        'evening_id',
    ];

    public function evening()
    {
        return $this->belongsTo(Evening::class, 'evening_id');
    }

    public function artists () {
        return $this->hasMany(Artist::class, 'show_id');
    }

    public function images() {
        return $this->hasMany(ShowImage::class, 'show_id');
    }

    public function toDTO(): ShowDTO
    {
        $artistsDTO = [];
        foreach ($this->artists()->get() as $artist) {
            $artistsDTO[] = $artist->toDTO();
        }

        $imagesDTO = [];
        foreach ($this->images()->get() as $image) {
            $imagesDTO[] = $image->toDTO();
        }
        return new ShowDTO(
            $this->id,
            $this->title,
            $this->description,
            $this->time,
            $this->video,
            $this->evening_id,
            $artistsDTO,
            $imagesDTO
        );
    }

}