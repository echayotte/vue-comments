<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class Comment extends Model
{
    protected $fillable = ['respond_to_id', 'name', 'url', 'body'];
    // to set the relationship inside the vue component
    protected $with = ['children'];

    public function children()
    {
        return $this->hasMany('App\Comment', 'respond_to_id');
    }
    /* to format a relative date in php (allows to pass something from PHP to JavaScript)
    -->this line add the virtual property to the toArray() method which is an attribute array for $comment (see $comment->toArray())
    protected $appends = ['human_created_at'];

     - - Create a virtual attribute (there is no col in DB) as a computed property in vuejs --
    public function getHumanCreatedAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    --> retrieve this attribute in CommentForm.vue
    --> {{ comment.human_created_at }}
     */
}
