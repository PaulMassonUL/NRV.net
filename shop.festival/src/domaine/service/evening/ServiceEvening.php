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

    public function createEvening(EveningDTO $eveningDTO): EveningDTO
    {
        $evening = new Evening();
        $evening->name = $eveningDTO->name;
        $evening->date = $eveningDTO->date;
        $evening->thematic = $eveningDTO->thematic;
        $evening->spot_id = $eveningDTO->spot_id;
        $evening->save();
        return $evening->toDTO();
    }

    public function updateEvening(EveningDTO $eveningDTO): EveningDTO
    {
        $evening = Evening::findOrFail($eveningDTO->id);
        $evening->name = $eveningDTO->name;
        $evening->date = $eveningDTO->date;
        $evening->thematic = $eveningDTO->thematic;
        $evening->spot_id = $eveningDTO->spot_id;
        $evening->save();
        return $evening->toDTO();
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

    public function getAllThematics(): array
    {
        $thematics = Evening::select('thematic')->distinct()->get();
        $thematicsDTO = [];
        foreach ($thematics as $thematic) {
            $thematicsDTO[] = $thematic->thematic;
        }
        return $thematicsDTO;
    }

    public function getAllDates(): array
    {
        $dates = Evening::select('date')->distinct()->get();
        $datesDTO = [];
        foreach ($dates as $date) {
            $datesDTO[] = $date->date;
        }
        return $datesDTO;
    }

    public function getPlaceByEvening(int $id): array
    {
        $evening = Evening::find($id);
        $spot = $evening->spot()->first();

        $nbPlaceTotal = $spot->nb_standing + $spot->nb_seated;
        $nbTicketSold = $evening->tickets()->count();

        return ['nbTotalPlaces' => $nbPlaceTotal, 'nbTicketSold' => $nbTicketSold, 'nbPlaceStanding' => $spot->nb_standing, 'nbPlaceSeated' => $spot->nb_seated];
    }


}