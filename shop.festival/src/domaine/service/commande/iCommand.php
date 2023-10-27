<?php

namespace festochshop\shop\domaine\service\commande;

use festochshop\shop\domaine\dto\shop\CommandDTO;

interface iCommand
{
    public function creerCommande(CommandDTO $commandeDTO): CommandDTO;
    public function accederCommande(string $idCommande): CommandDTO;
    public function validerCommande(string $idCommande): CommandDTO;
}