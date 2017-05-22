<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Thread extends Model
{
    use Sluggable;
    public function sluggable()
    {
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
        return [
            'slug' => [
                'source' => 'descripcion'
            ]
        ];
    }
    protected $table = 'threads';
    protected $fillable = ['descripcion','num_mensajes','category_id','user_id'];
    public $timestamps = true;

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function messages() {
        return $this->hasMany('App\Message');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function scopeSearch($query, $descripcion) {
        return $query->where('descripcion','LIKE',"%$descripcion%");
    }
}
