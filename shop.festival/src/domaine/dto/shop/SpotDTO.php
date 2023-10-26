<?php

namespace festochshop\shop\domaine\dto\shop;

use festochshop\shop\domaine\dto\DTO;

class SpotDTO extends DTO
{
    public int $id;
    public string $name;
    public string $address;
    public int $nb_standing;
    public int $nb_seated;
    public array $images;

    public function __construct(int $id, string $name, string $address, int $nb_standing, int $nb_seated, array $images)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->nb_standing = $nb_standing;
        $this->nb_seated = $nb_seated;
        $this->images = $images;
    }


}