<?php

namespace App\Models;

use CodeIgniter\Model;

class Marque extends Model
{
    protected $table            = 'marque';
    protected $primaryKey       = 'NOMARQUE';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['NOM'];
}
