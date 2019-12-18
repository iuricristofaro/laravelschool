<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Course;
use App\User;
use App\Models\Sale;
use Mail;
use App\Mail\NewSaleStudent;
use App\Mail\NewStudentSale;

class Sale extends Model
{
    public $timestamps = false;
    protected $fillable = ['course_id', 'user_id', 'transaction', 'status', 'date'];
    
    
    public function myCourses($totalPage)
    {
        return $this->join('courses', 'courses.id', '=', 'sales.course_id')
                        ->select('sales.id', 'courses.name', 'courses.image', 'courses.url', 'courses.description')
                        ->where('sales.user_id', auth()->user()->id)
                        ->paginate($totalPage);
    }
    
    public function mySales()
    {
        return $this->join('courses', 'courses.id', '=', 'sales.course_id')
                        ->join('users', 'users.id', '=', 'sales.user_id')
                        ->select('sales.transaction', 'sales.date', 'courses.name', 'courses.url', 'courses.image', 'users.name as user_name', 'users.image as user_image', 'courses.name as course_name')
                        ->where('courses.user_id', auth()->user()->id)
                        ->get();
    }
    
    public function myStudents()
    {
        return $this->mySales();
    }
    
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
    
    public function newSale($data)
    {
        $course = Course::where('code', $data['prod'])->get()->first();
        if( $course == null )
            return response()->json(['error' => 'Course not found'], 404);
        
        $user = User::where('token', $data['hottok'])->get()->first();
        if( $user == null )
            return response()->json(['error' => 'User not found'], 404);
        
        if( $course->user_id != $user->id )
            return response()->json(['error' => 'Not Permission'], 401);
        
        if( $data['status'] == 'canceled' ) {
            $sale = Sale::where('transaction', $data['transaction'])->get()->first();
            
            if( $sale )
                Sale::where('transaction', $data['transaction'])->update([
                    'status' => 'canceled',
                ]);
        }
        
        if( $data['status'] != 'approved' )
            return response()->json(['status' => 'Pedido não liberado'], 200);
        
        $student = User::where('email', $data['email'])->get()->first();
        if( $student == null ) {
            $password = generatePassword();
            $student = User::create([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'url'       => createUrl($data['name']),
                'password'  => bcrypt($password),
            ]);
            
            Mail::to($data['email'])->send(new NewStudentSale($student, $course, $password));
        } else {
            Mail::to($data['email'])->send(new NewSaleStudent($student, $course));
        }
        
        $date = Carbon::parse($data['purchase_date'])->format('Y-m-d');
        
        $newSale = Sale::create([
            'course_id'     => $course->id,
            'user_id'       => $student->id,
            'transaction'   => $data['transaction'],
            'status'        => $data['status'],
            'date'          => $date,
        ]);
        
        if( $newSale )
            return response()->json(['success' => 'Success'], 200);
        else
            return response()->json(['error' => 'Fail Insert'], 500);
    }
}
