<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Curso;
use Illuminate\Http\Request;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Agenda::with('course')
                ->whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end);

            if ($request->course_id) {
                $query->where('course_id', $request->course_id);
            }

            $data = $query->get()->map(function ($event) {
                return [
                    'id' => $event->id,
                    'title' => $event->title . ' (' . $event->course->nombre . ')',
                    'start' => $event->start,
                    'end' => $event->end
                ];
            });

            return response()->json($data);
        }
        return view('horarios.fullcalender', ['courses' => Curso::all()]);
    }

    public function ajax(Request $request)
    {
        switch ($request->type) {
            case 'add':
                $event = Agenda::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'course_id' => $request->course_id
                ]);
                return response()->json($event->load('course'));
                break;

            case 'update':
                $event = Agenda::find($request->id);
                $event->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'course_id' => $request->course_id
                ]);
                return response()->json($event->load('course'));
                break;

            case 'delete':
                $event = Agenda::find($request->id)->delete();
                return response()->json($event);
                break;
        }
    }

    public function index_cusos()
    {

        $courses = Curso::all();
        return response()->json($courses);
    }
}
