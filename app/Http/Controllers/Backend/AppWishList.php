<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\Sidebar;

use App\WishList;

class AppWishList extends Controller
{

    public function index(Request $request)
    {
        $wishlists = $request->user()->wishlists;
        $sidebar = Sidebar::all();

        foreach ($wishlists as $wishlist) {
            $taxonomies = [];
            foreach ($wishlist->taxonomies as $taxonomie) {
                $taxonomies[] = $taxonomie->id;
            }
            $wishlist->taxonomy = $taxonomies;
        }

        return view('backend.wishlist', [
            'wishlists' => $wishlists,
            'sidebar' => $sidebar
        ]);
    }

    public function save(Request $request)
    {
        $request["taxonomy"] = array_filter($request["taxonomy"]);

        // Save Vehicle
        $wish = new WishList();
        $wish->user_id = $request->user()->id;
        $wish->save();

        $wish->taxonomies()->attach($request["taxonomy"]);

        return back();
    }

    public function remove($id)
    {

        // Save Vehicle
        $wish = WishList::findOrFail($id);
        $wish->taxonomies()->detach();
        $wish->delete();

        return back();
    }
    
}
