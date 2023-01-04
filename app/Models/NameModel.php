<?php namespace App\Models; 
use CodeIgniter\Model;

class NameModel extends Model {
    protected $table = 'ci4_db';
    
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'password'];


}


?>