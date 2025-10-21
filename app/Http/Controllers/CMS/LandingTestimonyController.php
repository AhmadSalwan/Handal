<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\LandingTestimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingTestimonyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // List all testimonies
    public function index()
    {
        $testimonies = LandingTestimony::all();
        return view('cms.testimony.index', compact('testimonies'));
    }

    // Show form to create new testimony
    public function create()
    {
        return view('cms.testimony.create');
    }

    // Store new testimony
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'position', 'testimonial');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('testimonies', 'public');
        }

        LandingTestimony::create($data);

        return redirect()->route('landingtestimony.index')
            ->with('success', 'Testimoni berhasil ditambahkan!');
    }

    // Show edit form
    public function edit($id)
    {
        $testimony = LandingTestimony::findOrFail($id);
        return view('cms.testimony.edit', compact('testimony'));
    }

    // Update testimony
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $testimony = LandingTestimony::findOrFail($id);
        $data = $request->only('name', 'position', 'testimonial');

        if ($request->hasFile('photo')) {
            if ($testimony->photo && Storage::disk('public')->exists($testimony->photo)) {
                Storage::disk('public')->delete($testimony->photo);
            }
            $data['photo'] = $request->file('photo')->store('testimonies', 'public');
        }

        $testimony->update($data);

        return redirect()->route('landingtestimony.index')
            ->with('success', 'Testimoni berhasil diperbarui!');
    }

    // Delete testimony
    public function destroy($id)
    {
        $testimony = LandingTestimony::findOrFail($id);

        if ($testimony->photo && Storage::disk('public')->exists($testimony->photo)) {
            Storage::disk('public')->delete($testimony->photo);
        }

        $testimony->delete();

        return redirect()->route('landingtestimony.index')
            ->with('success', 'Testimoni berhasil dihapus!');
    }
}
