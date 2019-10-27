<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = [
        'machine_name', 'machine_ip', 'machine_status','machine_creation_date','machine_end_date','machine_creator','machine_comment','created_at','updated_at','vendor_name','status'
    ];
}
