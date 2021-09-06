<?php

namespace Libiary;

use PDO;

class DB
{
    protected $pdo = null;
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=test", 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
