<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    public function test_tickets_index_page_is_accessible(): void
    {

        $response->assertOk();
        $response->assertSee('Solicitudes de soporte');
    }

    public function test_ticket_can_be_created_with_valid_data(): void
    {
        $ticketData = [
            'title' => 'Unable to access email',
            'description' => 'Login returns an error.',
            'requester_name' => 'Demo User',
            'requester_email' => 'demo@example.com',
            'priority' => 'high',
        ];

        $response = $this->post(
            route('tickets.store'),
            $ticketData
        );

        $response->assertRedirect(route('tickets.index'));

        $this->assertDatabaseHas('tickets', [
            'title' => 'Unable to access email',
            'requester_email' => 'demo@example.com',
            'priority' => 'high',
            'status' => 'open',
        ]);
    }

    public function test_ticket_rejects_an_invalid_email(): void
    {
        $ticketData = [
            'title' => 'Invalid email ticket',
            'description' => 'Testing email validation.',
            'requester_name' => 'Demo User',
            'requester_email' => 'invalid-email',
            'priority' => 'medium',
        ];

        $response = $this
            ->from(route('tickets.create'))
            ->post(route('tickets.store'), $ticketData);

        $response->assertRedirect(route('tickets.create'));
        $response->assertSessionHasErrors('requester_email');

        $this->assertDatabaseMissing('tickets', [
            'title' => 'Invalid email ticket',
        ]);
    }
}