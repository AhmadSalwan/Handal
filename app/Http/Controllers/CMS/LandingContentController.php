<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\LandingContent;
use Illuminate\Http\Request;

class LandingContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the landing content.
     */
    public function edit()
    {
        // Get the first row or create one if not exists
        $content = LandingContent::first();
        if (!$content) {
            $content = LandingContent::create([
                'tentang_program_content' => '',
                'visi_content' => '',
                'misi_content' => '',
            ]);
        }

        return view('cms.landing.edit', compact('content'));
    }

    /**
     * Update the landing content.
     */
    public function update(Request $request)
    {
        $request->validate([
            'tentang_program_content' => 'required|string',
            'visi_content' => 'required|string',
            'misi_content' => 'required|string',
        ]);

        $content = LandingContent::first();
        if (!$content) {
            $content = LandingContent::create($request->only(
                'tentang_program_content',
                'visi_content',
                'misi_content'
            ));
        } else {
            $content->update($request->only(
                'tentang_program_content',
                'visi_content',
                'misi_content'
            ));
        }

        return redirect()->route('landingcontent.edit')
            ->with('success', 'Konten landing page berhasil diperbarui!');
    }
}
