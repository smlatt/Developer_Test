<?php

class baseObj {
    public $mysql = null;
    public $table = null; /*SuMi Modification : change private to public */

    public function __construct ()
    {
        $this->mysql = new mysqli("localhost", "root", "jit.SG", "sumitest");
        if ($this->mysql->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->mysql->connect_errno . ") " . $this->mysql->connect_error;
        }
    }

    public function get ($id, $field) 
    {
        $res = $this->mysql->query("SELECT $field FROM $this->table WHERE ID = $id"); /*SuMi Modification : change $table to $this->table */
		return $res->fetch_assoc(); /*SuMi Modification : add code to return result */
    }

    public function getAll ($id) 
    {
        $res = $this->mysql->query("SELECT * FROM $this->table WHERE ID = $id");/*SuMi Modification : change $table to $this->table */
        return $res->fetch_assoc();
    }
}

class propertyData extends baseObj {
    public $id = null;
    public $type = null;
    public $title = null;
    public $address = null;
    public $bedroom = null;
    public $livingroom = null;
    public $diningroom = null;
    protected $hdbblock = null;
    private $swimmingPool = null;

    public $table = 'Property';

    public function getType ($ID) { $Type = $this->get( $ID, 'Type'); return $Type; }
    public function getTitle ($ID) { $Title = $this->get( $ID, 'Title') ; return $Title;} /*SuMi Modification : should return $title */
    public function getAddress ($ID) { $Address = $this->get( $ID, 'Address') ; return $Address;}
    public function getBedroom ($ID) { $Bedroom = $this->get( $ID, 'Bedroom') ; return $Bedroom;}
    public function getLivingroom ($ID) { $livingroom = $this->get( $ID, 'Living_room') ; return $livingroom;}
    public function getDiningroom ($ID) { $diningroom = $this->get( $ID, 'Diningroom') ; return $diningroom;}
}

class hdbData extends propertyData {
    public $table = 'HDB';
    public function getHDBBlock ($ID) { $this->hdbblock = $this->get($ID, 'HDBBlock'); return $this->hdbblock; }
}

class condoData extends propertyData {
    public $table = 'ConDO';
    public function gotSwimmingPool ($ID)
    {
        return $this->get($ID, 'SwimmingPool');
    }
}

?>
