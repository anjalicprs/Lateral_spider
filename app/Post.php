<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
	//use SoftDeletes;
    protected $fillable=[
    	'user_id', 'post_on', 'live','content'
    ];
    protected $dates= ['post_on'];
    public function setLiveAttribute($value)
    {
    	$this->attributes['live'] = (boolean)($value);

    }
    public function getShortContentAttribute()
    {
    	return (substr($this->content, 0, random_int(6,50)). '...');
    }
    public function setPostOnAttribute($value)
    {
    	$this->attributes['post_on']=Carbon::parse($value);
    }
}
