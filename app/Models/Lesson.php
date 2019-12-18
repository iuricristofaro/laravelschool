<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Module;
use App\Models\Course;

class Lesson extends Model
{
    protected $fillable = ['module_id', 'name', 'url', 'description', 'free', 'video'];

    
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'sales', 'course_id', 'user_id')
                        ->where('sales.status', 'approved');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
