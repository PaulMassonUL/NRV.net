<?php

namespace festochshop\shop\domaine\service\user;

use festochshop\shop\domaine\dto\auth\UserDTO;

interface iServiceUser
{

    public function getUserById(string $id): UserDTO;


}

