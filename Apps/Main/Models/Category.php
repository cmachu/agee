<?php

namespace Apps\Main\Models;

class Category extends \Agee\Parents\Model
{

    protected $guarded = array('id');
    protected $fillable = array('name');
    public $timestamps = false;

}