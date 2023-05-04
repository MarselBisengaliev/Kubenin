<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        try {
            $path = $request->file('file')->store('schedules');
            $shift = $request->get('shift');
            $day = $request->get('day');


            $newSchedule = new Schedule();
            $newSchedule->shift = $shift;
            $newSchedule->path = $path;
            $newSchedule->day = $day;
            $newSchedule->save();

            return redirect()->route('create')->with('success', 'Расписание создано!');
        } catch (\Throwable $th) {
            return redirect()->route('create')->with('failure', 'Что-то пошло не так...');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        try {
            $schedule = Schedule::query()->where('id', $id)->firstOrFail();
    
            return view('edit', ['schedule' => $schedule]);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home')->with('failure', 'Ошибка 404');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, int $id)
    {
        try {    
            $path = $request->file('file')->store('schedules');
            $shift = $request->get('shift');
            $day = $request->get('day');

            $schedule = Schedule::query()->where('id', $id)->firstOrFail();
            $schedule->update([
                'path' => $path,
                'shift' => $shift,
                'day' => $day
            ]);

            return redirect()->route('edit', ['id' => $id])->with('success', 'Расписание обновленно!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home')->with('failure', 'Ошибка 404');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {    
            $schedule = Schedule::query()->where('id', $id)->firstOrFail();
            Storage::delete($schedule->path);
            $schedule->delete();

            return redirect()->route('home')->with('success', 'Расписание удаленно!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home')->with('failure', 'Ошибка 404');
        }
    }
}
