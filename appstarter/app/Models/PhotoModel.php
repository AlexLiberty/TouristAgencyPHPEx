<?php
namespace App\Models;

use CodeIgniter\Model;

class PhotoModel extends Model
{
    protected $table = 'hotel_photos';
    protected $allowedFields = ['hotel_id', 'photo_path'];
}
