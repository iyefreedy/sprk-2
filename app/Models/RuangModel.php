<?php

namespace App\Models;

use CodeIgniter\Model;

class RuangModel extends Model
{
     protected $table = 'room';
     protected $allowedFields = ['loaner_id', 'loaner_name', 'division', 'phone', 'activity_name', 'activity_type', 'start_time', 'start_time', 'end_time', 'involved_party', 'invitation_number', 'room', 'proposal', 'status'];
     protected $useTimestamps = true;
}
