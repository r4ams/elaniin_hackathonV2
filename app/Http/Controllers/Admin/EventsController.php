<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventsRequest;
use App\Http\Requests\Admin\UpdateEventsRequest;

class EventsController extends Controller
{

    public function index()
    {
        if (! Gate::allows('event_access')) {
            return abort(401);
        }

        $events = Event::all();

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        if (! Gate::allows('event_create')) {
            return abort(401);
        }
        return view('admin.events.create');
    }

    public function store(StoreEventsRequest $request)
    {
        if (! Gate::allows('event_create')) {
            return abort(401);
        }
        $event = Event::create($request->all());



        return redirect()->route('admin.events.index');
    }


    public function edit($id)
    {
        if (! Gate::allows('event_edit')) {
            return abort(401);
        }
        $event = Event::findOrFail($id);

        return view('admin.events.edit', compact('event'));
    }

    public function update(UpdateEventsRequest $request, $id)
    {
        if (! Gate::allows('event_edit')) {
            return abort(401);
        }
        $event = Event::findOrFail($id);
        $event->update($request->all());



        return redirect()->route('admin.events.index');
    }

    public function show($id)
    {
        if (! Gate::allows('event_view')) {
            return abort(401);
        }
        $tickets = \App\Ticket::where('event_id', $id)->get();

        $event = Event::findOrFail($id);

        return view('admin.events.show', compact('event', 'tickets'));
    }

    public function destroy($id)
    {
        if (! Gate::allows('event_delete')) {
            return abort(401);
        }
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index');
    }

    public function massDestroy(Request $request)
    {
        if (! Gate::allows('event_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Event::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
