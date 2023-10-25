<?php

namespace festochshop\shop\domaine\dto;

class EveningDTO
{
    public int $id;
    public string $name;
    public string $thematic;
    public string $date;
    public int $price;
    public int $reducted_price;

    public function __construct (string $name, string $thematico, string $date, int $price, int $reducted_price) {
        $this->name = $name;
        $this->thematic = $thematico;
        $this->date = $date;
        $this->price = $price;
        $this->reducted_price = $reducted_price;
    }


}