<?php

namespace App\Http\Controllers\Admin;
use App\Event;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTicketsRequest;
use App\Http\Requests\Admin\UpdateTicketsRequest;

class TicketsController extends Controller
{

    public function index()
    {
        if (! Gate::allows('ticket_access')) {
            return abort(401);
        }

        $tickets = Ticket::all();

        return view('admin.tickets.index', compact('tickets'));
    }

    public function create()
    {
        if (! Gate::allows('ticket_create')) {
            return abort(401);
        }
        $events = Event::all();


        return view('admin.tickets.create', compact('events'));
    }

    public function store(StoreTicketsRequest $request)
    {
        if (! Gate::allows('ticket_create')) {
            return abort(401);
        }
        $ticket = Ticket::create($request->all());



        return redirect()->route('admin.tickets.index');
    }

    public function edit($id)
    {
        if (! Gate::allows('ticket_edit')) {
            return abort(401);
        }
        $events = \App\Event::get()->pluck('title', 'id')->prepend('Please select', '');

        $ticket = Ticket::findOrFail($id);

        return view('admin.tickets.edit', compact('ticket', 'events'));
    }

    public function update(UpdateTicketsRequest $request, $id)
    {
        if (! Gate::allows('ticket_edit')) {
            return abort(401);
        }
        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());



        return redirect()->route('admin.tickets.index');
    }

    public function show($id)
    {
        if (! Gate::allows('ticket_view')) {
            return abort(401);
        }

        $ticket = Ticket::findOrFail($id);
        
        return view('admin.tickets.show', compact('ticket'));
    }

    public function destroy($id)
    {
        if (! Gate::allows('ticket_delete')) {
            return abort(401);
        }
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('admin.tickets.index');
    }

    public function massDestroy(Request $request)
    {
        if (! Gate::allows('ticket_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Ticket::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
