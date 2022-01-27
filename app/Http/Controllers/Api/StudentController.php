<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\studentRequest;
use App\Models\Student;
use App\Models\StudentOrder;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;

class StudentController extends Controller
{
    public function register(studentRequest $request){
        try{
            $request->validated();
            // student create
            $studentCreate = Student::create([
               'name' => $request->name,
               'school_id' => $request->school_id
            ]);
            // latest student
            $st = Student::select(['id','name','school_id'])->latest()->first();
            // create order
            $orderCreate = StudentOrder::create([
                'school_id' => $st->school_id,
                'student_id' => $st->id,
            ]);
            $st->order = StudentOrder::where('student_id',$st->id)->count();
            $st->save();
            $admin = auth()->user();
            //Notification::send($admin, new \App\Notifications\StudentOrder($st));
            $admin->notify(new \App\Notifications\StudentOrder($st));
            return response()->json([
               'message' => 'student created !',
               'status' => true
            ]);
        }catch (\Exception $exception){
            return response()->json([
               'message' => $exception->getMessage(),
               'status' => false
            ],400);
        }
    }
}
