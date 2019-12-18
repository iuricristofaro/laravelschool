<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['course_id', 'name', 'description'];
    
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function modulesUser()
    {
        return $this->join('courses', 'courses.id', '=', 'modules.course_id')
                        ->where('courses.user_id', auth()->user()->id)
                        ->pluck('modules.name', 'modules.id');
    }
}
