<?php

namespace festochshop\shop\app\action;

use festochshop\shop\domaine\service\show\iServiceShow;
use festochshop\shop\domaine\service\show\ServiceShow;
use festochshop\shop\domaine\service\show\ServiceShowNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class GetShowsFilterByDateAction extends Action
{

    private ServiceShow $serviceShow;

    public function __construct(iServiceShow $serviceShow)
    {
        $this->serviceShow = $serviceShow;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        try {
            $shows = $this->serviceShow->getShowsByDate($args['date']);

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
                ];
            }

            $rs->getBody()->write(json_encode($data));
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(200);

        } catch (ServiceShowNotFoundException) {
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(404);
        }

    }

}