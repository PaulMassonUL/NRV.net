<?php

namespace festochshop\shop\domaine\dto\shop;

class CommandDTO
{
    public string $id;
    public string $client_email;
    public string $date_commande;
    public int $etat;
    public int $montant_total;
    public array $tickets;


    public function __construct(string $client_email, array $tickets) {
        $this->client_email = $client_email;
        $this->tickets = $tickets;
    }

    public function toArray(): array
    {
        $tickets = [];
        foreach ($this->tickets as $ticket) {
            $tickets[] = $ticket->toArray();
        }

        return [
            'id' => $this->id,
            'date' => $this->date_commande,
            'client_email' => $this->client_email,
            'montant_total' => $this->montant_total,
            'tickets' => $tickets,
            'etat' => $this->etat
        ];
    }

}