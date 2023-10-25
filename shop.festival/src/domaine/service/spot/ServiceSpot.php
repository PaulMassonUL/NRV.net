<?php

namespace festochshop\shop\domaine\service\spot;

use festochshop\shop\domaine\entities\Spot;
use Psr\Log\LoggerInterface;

class ServiceSpot implements iServiceSpot

{

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }


    /**
     * @throws ServiceSpotNotFoundException
     */
    public function getSpots(): array
    {
        try {
            $spots = Spot::all();
            $spotsDTO = [];
            foreach ($spots as $spot) {
                $spotsDTO[] = $spot->toDTO();
            }
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new ServiceSpotNotFoundException('No spot found');
        }
        return $spotsDTO;
    }

    /**
     * @throws ServiceSpotNotFoundException
     */
    public function getAllNameSpots(): array
    {
        try {
            $spots = Spot::all();
            $spotsDTO = [];
            foreach ($spots as $spot) {
                $spotsDTO[] = $spot->name;
            }
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new ServiceSpotNotFoundException('No spot found');
        }
        return $spotsDTO;
    }
}