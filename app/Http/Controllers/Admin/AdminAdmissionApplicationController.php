<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminAdmissionApplicationController extends Controller
{
    public function index(): View
    {
        $applications = AdmissionApplication::query()->latest()->simplePaginate(20);

        return view('admin.admission-applications.index', compact('applications'));
    }

    public function show(AdmissionApplication $admission_application): View
    {
        return view('admin.admission-applications.show', ['application' => $admission_application]);
    }

    public function update(Request $request, AdmissionApplication $admission_application): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,viewed,contacted,accepted,rejected,archived'],
        ]);
        $admission_application->update($data);

        return redirect()->route('admin.admission-applications.show', $admission_application)->with('status', 'Status updated.');
    }
}
