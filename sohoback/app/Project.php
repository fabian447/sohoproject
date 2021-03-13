<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

	protected $table = 'projects';

	protected $fillable = [
        'name', 'description', 'tags',  'logo',  'image', 'url', 'status', 'background_color', 'font_color'
    ];


}
