<?php

namespace App\Http\Controllers\Admin;
use App\Event;
use App\Ticket;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePaymentsRequest;
use App\Http\Requests\Admin\UpdatePaymentsRequest;

class PaymentsController extends Controller
{

    public function index()
    {
        if (! Gate::allows('payment_access')) {
            return abort(401);
        }

        $payments = Payment::all();

        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        if (! Gate::allows('payment_create')) {
            return abort(401);
        }

        $events = Event::all();
        $tickets = Ticket::all();


        return view('admin.payments.create', compact('events', 'tickets'));
    }

    public function store(StorePaymentsRequest $request)
    {
        if (! Gate::allows('payment_create')) {
            return abort(401);
        }
        $payment = Payment::create($request->all());



        return redirect()->route('admin.payments.index');
    }

    public function show($id)
    {
        if (! Gate::allows('payment_view')) {
            return abort(401);
        }
        $payment = Payment::findOrFail($id);

        return view('admin.payments.show', compact('payment'));
    }

}
