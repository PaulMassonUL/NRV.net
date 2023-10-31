<?php

namespace festochshop\shop\domaine\service\user;

use Exception;
use festochshop\shop\domaine\dto\auth\UserDTO;
use festochshop\shop\domaine\entities\User;
use Psr\Log\LoggerInterface;

class ServiceUser implements iServiceUser

{

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function getUserById(string $id): UserDTO
    {
        try {
            $user = User::find($id);
            $userDTO = $user->toDTO();
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            throw new ServiceUserNotFoundException('User not found');
        }
        return $userDTO;
    }

}