<?php

namespace festochshop\shop\domaine\dto\shop;

class SpotImageDTO
{
    public int $id;
    public string $path;

    public function __construct(int $id, string $path) {
        $this->id = $id;
        $this->path = $path;
    }

}