<?php

namespace festochshop\auth\domaine\utils;

use Illuminate\Database\Capsule\Manager as DB;

class Eloquent
{

    private $db;

    public function __construct () {
        $this->db = new DB();
    }

    public function init ($fileConfig, $name) {
        $this->db->addConnection(parse_ini_file($fileConfig), $name);
        $this->db->bootEloquent();
        $this->db->setAsGlobal();
    }
}