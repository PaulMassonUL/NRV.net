<?php

namespace festochshop\shop\domaine\entities;

use festochshop\shop\domaine\dto\EveningDTO;

class Evening extends \Illuminate\Database\Eloquent\Model
{
    protected $connection = 'festival';
    protected $table = 'Evening';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function shows()
    {
        return $this->hasMany(Show::class, 'evening_id');
    }

    public function spot(){
        return $this->belongsTo(Spot::class, 'spot_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'evening_id');
    }

    public function toDTO(): EveningDTO
    {
        $showsDTO = [];
        foreach ($this->shows()->get() as $show) {
            $showsDTO [] = $show->toDTO();
        }
        return new EveningDTO(
            $this->id,
            $this->name,
            $this->thematic,
            $this->date,
            $this->price,
            $this->reduced_price,
            $this->spot()->first()->toDTO(),
            $showsDTO
        );
    }


}