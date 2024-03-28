<?php

namespace App\Http\Controllers;
use App\Models\wishlist;


use Illuminate\Http\Request;

class wishlists extends Controller
{
    public function add(Request $request, $id){
        $studentID =  $request->session()->get('activeSession');
        $offerID = $id;

        $existingWishlist = wishlist::where('student_id', $studentID)
        ->where('offer_id', $offerID)
        ->exists();

        if ($existingWishlist) {
        return redirect()->back()->with('error', 'You have already added this offer to wishlist.');
        }

        $wishlist = new wishlist();
        $wishlist->student_id = $studentID;
        $wishlist->offer_id = $offerID;
        $wishlist->save();
        return redirect()->route('offer.show', $id)->with('success', 'This offer is now in your wishlist.');
    }

    public function delete(Request $request, $id)
    {
        $studentID =  $request->session()->get('activeSession');
        wishlist::where('student_id', $studentID)
        ->where('offer_id', $id)
        ->delete();
        return redirect('account')->with('success', 'The offer has been removed from your wishlist');
    }
}
