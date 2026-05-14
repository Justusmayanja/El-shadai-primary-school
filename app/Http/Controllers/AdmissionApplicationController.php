<?php

namespace App\Http\Controllers;

use App\Models\AdmissionApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdmissionApplicationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'child_name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'applying_class' => ['required', 'string', 'max:255'],
            'parent_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:64'],
            'email' => ['required', 'email', 'max:255'],
            'previous_school' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:5000'],
        ]);
        $data['status'] = 'new';

        AdmissionApplication::query()->create($data);

        return back()->with('status', 'Your application has been received. Our admissions team will contact you shortly.');
    }
}
