<?php

namespace App\Models;

use \CodeIgniter\Model;

class Usermodel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'ID';

    protected $allowedFields = ['Username', 'Email', 'Mobile', 'Gender', 'DOB', 'Password' ,'UserID'];


    
}
