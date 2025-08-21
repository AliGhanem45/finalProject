<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(User $user)
    {
        $posts = $user->posts()->paginate(100);
        return view('profile', compact('user', 'posts'));
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function deleteProfilePic(User $user)
    {
        if ($user->profilePic) {
            Storage::disk('public')->delete($user->profilePic ?? '');
            $user->profilePic = null;
            $user->save();
            return redirect()->route('profile.show', compact('user'));
        }
    }
    public function deleteCoverPic(User $user)
    {
        if ($user->coverPic) {
            Storage::disk('public')->delete($user->coverPic ?? '');
            $user->coverPic = null;
            $user->save();
            return redirect()->route('profile.show', compact('user'));
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->fill($validated);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        if ($request->has('profilePic')) {
            $profileImagePath = $request->file('profilePic')->store('uploads', 'public');
            $validated['profilePic'] = $profileImagePath;
            Storage::disk('public')->delete($request->user()->profilePic ?? '');
        }
        if ($request->has('coverPic')) {
            $coverImagePath = $request->file('coverPic')->store('coverUploads', 'public');
            $validated['coverPic'] = $coverImagePath;
            Storage::disk('public')->delete($request->user()->CoverPic ?? '');
        }
        $user = request()->user();
        $user->update($validated);

        return Redirect::route('profile.show', compact('user'));
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
