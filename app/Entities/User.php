<?php

namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity
{
     protected $casts = [
          'created_at' => 'string',
          'updated_at' => 'string'
     ];

     public function setPassword(string $pass)
     {
          $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);

          return $this;
     }
}
