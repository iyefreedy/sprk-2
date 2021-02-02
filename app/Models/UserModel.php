<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
     protected $table = 'users';
     protected $useTimestamps = true;
     protected $allowedFields = ['nip', 'username', 'password', 'fullname', 'phone', 'email', 'photo', 'division', 'level', 'role_id', 'token', 'created_at', 'updated_at'];
     protected $returnType = 'App\Entities\User';
}
