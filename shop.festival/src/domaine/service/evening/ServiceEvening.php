<?php

namespace festochshop\shop\domaine\service\evening;

use Exception;
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
    public function getEveningById(int $id): EveningDTO
    {
        try {
            $evening = Evening::find($id);
            $eveningDTO = $evening->toDTO();
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            throw new ServiceEveningNotFoundException('Evening not found');
        }
        return $eveningDTO;
    }

    public function getAllThematic(): array
    {
        $thematics = Evening::select('thematic')->distinct()->get();
        $thematicsDTO = [];
        foreach ($thematics as $thematic) {
            $thematicsDTO[] = $thematic->thematic;
        }
        return $thematicsDTO;
    }

}