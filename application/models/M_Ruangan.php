<?php
require_once __DIR__."/BaseModel.php";
class M_Ruangan extends BaseModel
{
    public function __construct() {
        parent::__construct("ruangan", "id_ruangan");
    }
}
