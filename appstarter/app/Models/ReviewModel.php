<?php
namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $allowedFields = ['hotel_id', 'user_id', 'content'];
}
