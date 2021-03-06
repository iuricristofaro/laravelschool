<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Course;
use App\Models\Lesson;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'token', 'bibliography'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

        public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    
    public function checkAccess($idCourse)
    {
        if( !auth()->check() )
            return false;
        
        $permission = $this->join('sales', 'sales.user_id', '=', 'users.id')
                        ->where('sales.user_id', auth()->user()->id)
                        ->where('sales.course_id', $idCourse)
                        ->count();
        if( $permission > 0 )
            return true;
        
        return false;
    }
}
