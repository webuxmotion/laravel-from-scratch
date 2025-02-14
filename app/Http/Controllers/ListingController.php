<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function index(Request $request) {

        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(6)
        ]);
    }

    public function show(Listing $listing) {
        return view('listings.show', [ 
            'listing' => $listing
        ]);
    }

    // Show Create Form
    public function create() {
        return view('listings.create');
    }

    // Store Listing Data
    public function store(Request $request) {

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'description' => 'required',
            'tags' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email']
        ]);

        $formFields['user_id'] = auth()->id();

        

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        
        Listing::create($formFields);

        return redirect('/')
            ->with('message', 'Your listing has been added!');
    }

    // Show Edit Form
    public function edit(Listing $listing) {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing) {

        // Make sure logged in user is the owner of the listing
        if (auth()->id() !== $listing->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'description' => 'required',
            'tags' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email']
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return redirect('/listings/' . $listing->id)
            ->with('message', 'Listing updated successfully!');
    }

    // Show manage listings
    public function manage() {
        return view('listings.manage', [
            'listings' => auth()->user()->listings
        ]);
    }

    // Delete Listing
    public function destroy(Listing $listing) {
        // Make sure logged in user is the owner of the listing
        if (auth()->id() !== $listing->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        $listing->delete();

        // Delete logo file
        if ($listing->logo) {
            Storage::disk('public')->delete($listing->logo);
        }

        return redirect('/')
            ->with('message', 'Listing deleted successfully!');
    }
}
