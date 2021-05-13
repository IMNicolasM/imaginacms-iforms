<?php

namespace Modules\Iforms\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\Sentinel\User;

class Lead extends Model
{
    protected $table = 'iforms__leads';

    protected $fillable = [
        'form_id',
        'assigned_to',
        'values'
    ];

    protected $casts = [
        'values'=>'array'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
    public function assignedTo()
    {
        return $this->belongsTo(User::class,'assigned_to');
    }
}
