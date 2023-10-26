<?php

namespace festochshop\shop\domaine\dto\shop;

class EveningDTO
{
    public int $id;
    public string $name;
    public string $thematic;
    public string $date;
    public int $price;
    public int $reduced_price;
    public SpotDTO $spot;
    public array $shows;

    public function __construct (int $id, string $name, string $thematic, string $date, int $price, int $reduced_price, $spot, $shows) {
        $this->id = $id;
        $this->name = $name;
        $this->thematic = $thematic;
        $this->date = $date;
        $this->price = $price;
        $this->reduced_price = $reduced_price;
        $this->spot = $spot;
        $this->shows = $shows;
    }


}