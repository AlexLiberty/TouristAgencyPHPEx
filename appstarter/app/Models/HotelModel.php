<?php
namespace App\Models;

use CodeIgniter\Model;

class HotelModel extends Model
{
    protected $table = 'hotels';
    protected $allowedFields = ['name', 'city_id', 'description'];
}
