<?php

namespace festochshop\shop\domaine\dto;

class SpotDTO extends DTO
{
    public int $id;
    public string $name;
    public string $address;
    public string $nb_standing;
    public int $nb_seated;

    public function __construct(int $id, string $name, string $address, string $nb_standing, int $nb_seated)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->nb_standing = $nb_standing;
        $this->nb_seated = $nb_seated;
    }


}