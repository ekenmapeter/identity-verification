<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verification;
use Illuminate\Support\Facades\Storage;
use App\Models\Verify;

class VerificationController extends Controller
{
    public function index()
    {
        return view('verification');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'front_image' => 'required|image',
            'back_image' => 'required|image',
            'selfie_image' => 'required|image'
        ]);

        try {
            $verify = Verify::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'front_image' => $request->file('front_image')->store('verifications'),
                'back_image' => $request->file('back_image')->store('verifications'),
                'selfie_image' => $request->file('selfie_image')->store('verifications')
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $verification = Verify::findOrFail($id);
        return view('admin.verification-show', compact('verification'));
    }

    public function destroy($id)
    {
        $verification = Verify::findOrFail($id);
        $verification->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Verification request deleted successfully');
    }
}
