<?php

namespace Apps\Main\Models;

class Category extends \Agee\Base\Model
{

    protected $guarded  = array('id');
    protected $fillable = array('name');
    public $timestamps  = false;

}