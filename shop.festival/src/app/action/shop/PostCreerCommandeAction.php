<?php

namespace festochshop\shop\app\action\shop;

use festochshop\shop\domaine\dto\shop\CommandDTO;
use festochshop\shop\domaine\dto\shop\TicketDTO;
use festochshop\shop\domaine\service\commande\iCommand;
use festochshop\shop\domaine\service\commande\ServiceCommandeNotFoundException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Ramsey\Uuid\Uuid;
use Slim\Exception\HttpNotFoundException;

class PostCreerCommandeAction
{


    private iCommand $iCommander;

    public function __construct(iCommand $commande)
    {
        $this->iCommander = $commande;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $data = json_decode($request->getBody()->getContents(), true);

        try {
            $commandeDTO2 = $this->iCommander->creerCommande(
                new CommandDTO(
                    $data['mail_client'],
                    array_map(
                        fn($ticket) => new TicketDTO(
                            $ticket['date'],
                            $ticket['barcode'],
                            $ticket['client_email'],
                            $ticket['evening_id'],
                            $ticket['id_command'],
                            $ticket['price'],
                        ),
                        $data['tickets']
                    )
                )
            );
        } catch (ServiceCommandeNotFoundException $e) {
            throw new HttpNotFoundException($request, $e->getMessage());
        }

        $dataJson = [
            'type' => 'resource',
            'commande' => $commandeDTO2->toArray()
        ];

        $response->getBody()->write(
            json_encode($dataJson)
        );

        return $response;
    }

}