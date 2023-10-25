<?php

namespace festochshop\shop\domaine\service\evening;

use festochshop\shop\domaine\dto\EveningDTO;

interface iServiceEvening
{

    public function getEveningById(int $id): EveningDTO;

    public function getAllThematics(): array;

    public function getAllDates(): array;

}

