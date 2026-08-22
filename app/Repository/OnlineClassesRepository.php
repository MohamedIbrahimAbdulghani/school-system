<?php

namespace App\Repository;

use App\Models\ClassRooms;
use App\Models\Grades;
use App\Models\OnlineClasses;
use App\Models\Sections;
use App\Services\ZoomService;
use Illuminate\Support\Facades\Auth;

class OnlineClassesRepository implements  OnlineClassesRepositoryInterface {

    protected ZoomService $zoomService;

    public function __construct(ZoomService $zoomService)
    {
        $this->zoomService = $zoomService;
    }

    public function index() {
        $online_classes = OnlineClasses::all();
        return view('pages.OnlineClasses.index', compact('online_classes'));
    }

    public function create() {
        $grades = Grades::all();
        $classrooms = ClassRooms::all();
        $sections = Sections::all();
        return view('pages.OnlineClasses.create', compact('grades', 'classrooms', 'sections'));
    }

    public function show($id) {
        return "show function";
    }

    public function store($request) {
        try {
            // إنشاء Zoom Meeting
            $meeting = $this->zoomService->createMeeting([
                'topic' => $request->topic,
                'start_at' => $request->start_at,
                'duration' => $request->duration,
            ]);
            OnlineClasses::create([
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'users_id' => Auth::user()->id,
                'metting_id' => $meeting['id'],
                'topic' => $request->topic,
                'start_at' => $request->start_at,
                'duration' => $meeting['duration'],
                'password' => $meeting['password'],
                'start_url' => $meeting['start_url'],
                'join_url' => $meeting['join_url'],
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_classes.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id) {
        //
    }

    public function update($request) {
       //
    }

    public function destroy($id) {
        try {
            $online_class = OnlineClasses::findOrFail($id);
            // حذف الاجتماع من Zoom
            if (!empty($online_class->metting_id)) {
                $this->zoomService->deleteMeeting( $online_class->metting_id );
            }
            // حذف الحصة من MySQL
            $online_class->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('online_classes.index');
        }  catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
