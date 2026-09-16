<?php

namespace App\Http\Controllers\Teacher\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlineClass;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Section;
use App\Services\ZoomService;



class OnlineClassController extends Controller
{

    protected ZoomService $zoomService;

    public function __construct(ZoomService $zoomService)
    {
        $this->zoomService = $zoomService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $online_classes = OnlineClass::where('created_by', auth('teacher')->user()->email)->get();
        return view('pages.Teachers.dashboard.online_classes.index', compact('online_classes'));
    }

    public function create() {
        $grades = Grade::all();
        $classrooms = Classroom::all();
        $sections = Section::all();
        return view('pages.Teachers.dashboard.online_classes.create', compact('grades', 'classrooms', 'sections'));
    }

    public function show($id) {
        return "show function";
    }

    public function store(Request $request) {
        try {
            $meeting = $this->zoomService->createMeeting([
                'topic' => $request->topic,
                'start_at' => $request->start_at,
                'duration' => $request->duration,
            ]);
            OnlineClass::create([
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'created_by' => auth('teacher')->user()->email,
                'meeting_platform' => 'Zoom',
                'meeting_id' => $meeting['id'],
                'topic' => $request->topic,
                'start_at' => $request->start_at,
                'duration' => $meeting['duration'],
                'password' => $meeting['password'],
                'start_url' => $meeting['start_url'],
                'join_url' => $meeting['join_url'],
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_classe.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id) {
        //
    }

    public function update(Request $request) {
       //
    }
    public function destroy($id)
    {
        try {
            $online_class = OnlineClass::findOrFail($id);
            // Delete from Zoom only if the meeting was created on Zoom
            if (
                $online_class->meeting_platform === 'Zoom'
                && !empty($online_class->metting_id)
            ) {
                $this->zoomService->deleteMeeting(
                    $online_class->metting_id
                );
            }
            // Delete from database
            $online_class->delete();
            toastr()->success(trans('messages.delete'));
            return redirect()->route('online_classe.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    
    public function createManualonlineclass() {
        $grades = Grade::all();
        $classrooms = Classroom::all();
        $sections = Section::all();
        return view('pages.Teachers.dashboard.online_classes.createManual', compact('grades', 'classrooms','sections'));
    }

    public function storeManualonlineclass(Request $request)
    {
        try {

            OnlineClass::create([
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'created_by' => auth('teacher')->user()->email,
                'meeting_platform' => $request->meeting_platform,
                // 'metting_id' => $request->metting_id,
                'meeting_id' => preg_replace('/\s+/', '', $request->metting_id), // to remove any space when take id copy from zoom application
                'topic' => $request->topic,
                'start_at' => $request->start_at,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => null,
                'join_url' => $request->meeting_link,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_classe.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}
