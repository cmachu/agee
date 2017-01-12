<?php

namespace Apps\Main\Models;

class Category extends \Core\Model
{

    protected $guarded = array('id');
    protected $fillable = array('name');
    public $timestamps = false;

}