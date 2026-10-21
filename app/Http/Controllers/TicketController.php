<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function index(): View
    {
        $tickets = Ticket::latest()->get();

        return view('tickets.index', compact('tickets'));
    }

    public function create(): View
    {
        return view('tickets.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'requester_name' => 'required|string|max:100',
            'requester_email' => 'required|email|max:150',
            'priority' => 'required|in:low,medium,high,critical',
        ]);

        Ticket::create($validated);

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Ticket created successfully.');
    }
}