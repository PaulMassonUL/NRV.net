<?php

namespace festochshop\shop\domaine\service;

use festochshop\shop\domaine\dto\ShowDTO;

interface iServiceShow
{

    public function getShows(): array;

    public function getShow(int $id): ShowDTO;

}

