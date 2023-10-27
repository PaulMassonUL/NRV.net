<?php

namespace festochshop\shop\domaine\entities;

use festochshop\shop\domaine\dto\shop\CommandDTO;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    public const ETAT_CREE=1;
    public const ETAT_VALIDE= 2;
    const ETAT_PAYE=3;

    public $connection = 'festival';
    protected $table = 'Command';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['id', 'date_commande', 'etat', 'montant_total', 'client_mail'];

    public function tickets () {
        return $this->hasMany(Ticket::class, 'id_command');
    }

    public function calculerMontantTotal(): float {
        $montantTotal = 0;
        foreach ($this->tickets as $ticket) {
            $montantTotal += $ticket->price;
        }
        $this->montant_total = $montantTotal;
        $this->save();
        return $montantTotal;
    }

    public function toDTO () {
        $ticketsDTO = [];
        foreach ($this->tickets()->get() as $ticket) {
            $ticketsDTO [] = $ticket->toDTO();
        }
        $command = new CommandDTO($this->client_mail, $ticketsDTO);
        $command->date_commande = $this->date_commande;
        $command->id = $this->id;
        $command->etat = $this->etat;
        $command->montant_total = $this->montant_total;

        return $command;
    }
}