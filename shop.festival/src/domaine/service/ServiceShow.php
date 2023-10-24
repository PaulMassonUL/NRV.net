<?php

namespace festochshop\shop\domaine\service;

use Exception;
use Psr\Log\LoggerInterface;
use festochshop\shop\domaine\dto\ShowDTO;
use festochshop\shop\domaine\entities\Show;

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
                $showDTO = new ShowDTO(
                    $show->id,
                    $show->title,
                    $show->description,
                    $show->time,
                    $show->video
                );
                $showsDTO[] = $showDTO;
            }
        } catch (ServiceShowNotFoundException $e) {
            $this->logger->error($e->getMessage());
            throw new ServiceShowNotFoundException('Show not found');
        }
        return $showsDTO;
    }

    /**
     * @throws ServiceShowNotFoundException
     */
    public function getShow(int $id): ShowDTO
    {
        try {
            $show = Show::find($id);
            $showDTO = new ShowDTO(
                $show->id,
                $show->title,
                $show->description,
                $show->time,
                $show->video
            );
        } catch (ServiceShowNotFoundException $e) {
            $this->logger->error($e->getMessage());
            throw new ServiceShowNotFoundException('Show not found');
        }
        return $showDTO;
    }


}