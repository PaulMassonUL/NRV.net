<?php

namespace festochshop\shop\domaine\service\spot;

use festochshop\shop\domaine\dto\ShowDTO;

interface iServiceSpot
{

    public function getSpots(): array;

    public function getAllNameSpots(): array;

}

