<?php

namespace festochshop\shop\domaine\service\show;

use festochshop\shop\domaine\dto\ShowDTO;
use festochshop\shop\domaine\entities\Show;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Log\LoggerInterface;

class ServiceShow implements iServiceShow

{

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @throws ServiceShowNotFoundException
     */
    public function getShows(): array
    {
        try {
            $shows = Show::all();
            $showsDTO = [];
            foreach ($shows as $show) {
                $showsDTO[] = $show->toDTO();
            }
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new ServiceShowNotFoundException('No show found');
        }
        return $showsDTO;
    }

}