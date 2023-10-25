<?php

namespace festochshop\shop\domaine\service\evening;

use festochshop\shop\domaine\dto\EveningDTO;

interface iServiceEvening
{

    public function getEvening(int $id): EveningDTO;

}

