<?php

namespace festochshop\shop\domaine\service\show;

use festochshop\shop\domaine\dto\shop\ShowDTO;
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

    public function createShow(ShowDTO $showDTO): ShowDTO
    {
        $show = new Show();
        $show->title = $showDTO->title;
        $show->description = $showDTO->description;
        $show->time = $showDTO->time;
        $show->video = $showDTO->video;
        $show->evening_id = $showDTO->evening_id;
        $show->save();
        return $show->toDTO();
    }

    public function updateShow(ShowDTO $showDTO): ShowDTO
    {
        $show = Show::findOrFail($showDTO->id);
        $show->title = $showDTO->title;
        $show->description = $showDTO->description;
        $show->time = $showDTO->time;
        $show->video = $showDTO->video;
        $show->evening_id = $showDTO->evening_id;
        $show->save();
        return $show->toDTO();
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

    public function getShowsByDate(string $date): array
    {
        $shows = Show::whereHas('evening', function ($query) use ($date) {
            $query->whereDate('date', $date);
        })->get();
        $showsDTO = [];
        foreach ($shows as $show) {
            $showsDTO[] = $show->toDTO();
        }
        return $showsDTO;
    }

    public function getShowsBySpot(string $spot): array
    {
        $shows = Show::whereHas('evening', function ($query) use ($spot) {
            $query->whereHas('spot', function ($query) use ($spot) {
                $query->where('name', $spot);
            });
        })->get();
        $showsDTO = [];
        foreach ($shows as $show) {
            $showsDTO[] = $show->toDTO();
        }
        return $showsDTO;
    }

    public function getShowsByThematic(string $thematic) : array
    {
        $shows = Show::whereHas('evening', function ($query) use ($thematic) {
            $query->where('thematic', $thematic);
        })->get();
        $showsDTO = [];
        foreach ($shows as $show) {
            $showsDTO[] = $show->toDTO();
        }
        return $showsDTO;
    }

    public function getEvening(int $id)
    {
        try {
            $evening = Show::findOrFail($id)->evening()->first();
        } catch (ModelNotFoundException $e) {
            $this->logger->error($e->getMessage());
            throw new ServiceShowNotFoundException('No evening found');
        }
        return $evening;
    }

}