<?php

namespace festochshop\shop\domaine\service\evening;

use festochshop\shop\domaine\dto\EveningDTO;
use festochshop\shop\domaine\entities\Evening;
use Psr\Log\LoggerInterface;

class ServiceEvening implements iServiceEvening

{

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @throws ServiceEveningNotFoundException
     */
    public function getEvening(int $id): EveningDTO
    {
        try {
            $evening = Evening::find($id);
            $eveningDTO = $evening->toDTO();
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new ServiceEveningNotFoundException('Evening not found');
        }
        return $eveningDTO;
    }


}