<?php

namespace festochshop\shop\domaine\dto;

class ShowImageDTO
{
    public int $id;
    public string $path;

    public function __construct ($id, $path){
        $this->id = $id;
        $this->path = $path;
    }
}