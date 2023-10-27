<?php

namespace festochshop\shop\domaine\service\commande;

use festochshop\shop\domaine\dto\shop\CommandDTO;
use festochshop\shop\domaine\entities\Command;
use festochshop\shop\domaine\entities\Ticket;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Log\LoggerInterface;
use Ramsey\Uuid\Uuid;

class ServiceCommand implements iCommand
{

    private LoggerInterface $logger;

    public function __construct (LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function creerCommande(CommandDTO $commandeDTO): CommandDTO
    {
        // validation des infos commande
        $email = $commandeDTO->client_email;
        $arrayTickets = $commandeDTO->tickets;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            print "email invalide";
            throw new ServiceCommandeInvalidException();
        }
        if (empty($arrayTickets)) {
            throw new ServiceCommandeInvalidException();
        }

        $command = new Command();
        $command->id = Uuid::uuid4()->toString();
        $command->date_commande = date("Y-m-d H:i:s");
        $command->etat = Command::ETAT_CREE;
        $command->client_mail = $email;


        foreach ($arrayTickets as $ticketDTO) {
            $ticket = new Ticket();
            $ticket->id = Uuid::uuid4()->toString();
            $ticket->date = $ticketDTO->date;
            $ticket->barcode = $ticketDTO->barcode;
            $ticket->client_email = $ticketDTO->client_email;
            $ticket->price = $ticketDTO->price;
            $ticket->evening_id = $ticketDTO->evening_id;
            $command->tickets()->save($ticket);
        }

        $command->calculerMontantTotal();
        $command->save();
        $this->logger->info('CommandeServiceLogger: CommandeService: Commande créée');
        return $command->toDTO();
    }

    public function accederCommande(string $idCommande): CommandDTO
    {
        try {
            return Command::where('id', $idCommande)->firstOrFail()
                ->toDTO();
        } catch (ModelNotFoundException $e) {
            throw new ServiceCommandeNotFoundException("Commande inexistante");
        }
    }


    public function validerCommande(string $idCommande): CommandDTO
    {
        try {
            $commande = Command::where('id', $idCommande)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            throw new ServiceCommandeInvalidException("Commande inexistante",404);
        }

        if ($commande->etat >= Command::ETAT_VALIDE) {
            throw new ServiceCommandeInvalidException("Commande déjà validée",400);
        }

        $commande->etat = Command::ETAT_VALIDE;
        $commande->save();

        $this->logger->info('CommandeServiceLogger: CommandeService: Commande validée');

        return $commande->toDTO();
    }
}