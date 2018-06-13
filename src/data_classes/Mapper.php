<?php
/**
 * Created by PhpStorm.
 * User: ofryak
 * Date: 08.06.18
 * Time: 7:25
 */

class Mapper {
    protected $db;
    public function __construct($db) {
        $this->db = $db;
    }
}