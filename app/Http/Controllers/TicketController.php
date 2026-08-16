<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Services\NotificationService;
use App\Services\DocumentUploadService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function submit(Request $request, NotificationService $notifier, DocumentUploadService $uploader)
    {
        // 1. Validate form data
        $request->validate([
            'type' => 'required|string',
            'ktp' => 'nullable|image|max:5120',
        ]);
        
        // 2. Create Ticket
        $ticket = Ticket::create([
            'user_id' => auth()->id(),
            'type' => $request->type,
            'status' => 'submitted',
            'form_data' => json_encode($request->except(['_token', 'files', 'ktp'])),
            'submitted_at' => now(),
            'due_at' => now()->addHours(24) // 24h SLA
        ]);

        // 3. Log state
        $ticket->logs()->create([
            'status' => 'submitted',
            'actor_id' => auth()->id(),
            'notes' => 'Application submitted'
        ]);

        // 4. Handle Uploads using DocumentUploadService
        if ($request->hasFile('ktp')) {
            $uploadResult = $uploader->handleImageUpload($request->file('ktp'), $ticket->id, 'ktp');
            $ticket->documents()->create([
                'type' => 'ktp',
                'file_path' => $uploadResult['file_path'],
                'thumbnail_path' => $uploadResult['thumbnail_path'],
            ]);
        }
        
        // 5. Notify via Feature Flag Service
        $notifier->send(auth()->user(), "Your request #{$ticket->id} has been received.");

        // For now, redirect back with success. In real app, redirect to ticket details.
        return back()->with('success', 'Submitted successfully!');
    }
}
