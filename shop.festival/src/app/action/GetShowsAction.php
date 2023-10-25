<?php

namespace festochshop\shop\app\action;

use festochshop\shop\domaine\service\show\iServiceShow;
use festochshop\shop\domaine\service\show\ServiceShowNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class GetShowsAction extends Action
{

    private iServiceShow $serviceShow;

    public function __construct(iServiceShow $serviceShow)
    {
        $this->serviceShow = $serviceShow;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        try {
            if (isset($rq->getQueryParams()['date'])) {
                $shows = $this->serviceShow->getShowsByDate($rq->getQueryParams()['date']);
            } elseif (isset($rq->getQueryParams()['lieu'])) {
                $shows = $this->serviceShow->getShowsBySpot($rq->getQueryParams()['lieu']);
            } elseif (isset($rq->getQueryParams()['thematic'])) {
                $shows = $this->serviceShow->getShowsByThematic($rq->getQueryParams()['thematic']);
            } else {
                $shows = $this->serviceShow->getShows();
            }

            $data = [
                'type' => 'resource',
                'nbShows' => count($shows),
            ];
            foreach ($shows as $show) {
                $data['shows'][] = [
                    'id' => $show->id,
                    'title' => $show->title,
                    'description' => $show->description,
                    'time' => $show->time,
                    'video' => $show->video,
                    'evening_id' => $show->evening_id,
                    'artists' => $show->artists,
                    'images' =>$show->images
                ];
            }

            $rs->getBody()->write(json_encode($data));
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(200);

        } catch (ServiceShowNotFoundException) {
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(404);
        }

    }

}