<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Episode extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'name',
        'episode_num',
        'ep_created'
    ];

    public $sortable = ['name', 'ep_created'];
}
