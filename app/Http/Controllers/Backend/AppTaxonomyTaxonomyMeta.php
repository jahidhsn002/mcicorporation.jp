<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\Sidebar;

use App\Taxonomy;
use App\TaxonomyMeta;

class AppTaxonomyTaxonomyMeta extends Controller
{
    public function index()
    {
        $sidebar = Sidebar::all();
        $taxonomies = Taxonomy::all();
        return view('backend.taxonomy', [
            'sidebar' => $sidebar,
            'taxonomies' => $taxonomies
        ]);
    }

    public function taxonomy_meta_index($taxonomy_id)
    {
        $sidebar = Sidebar::all();
        $taxonomy = Taxonomy::find($taxonomy_id);
        $taxonomy_metas = TaxonomyMeta::where('taxonomy_id', $taxonomy_id)->get();
        return view('backend.taxonomy_meta', [
            'taxonomy' => $taxonomy,
            'sidebar' => $sidebar,
            'taxonomy_metas' => $taxonomy_metas
        ]);
    }

    public function remove($id)
    {

        // Save Vehicle
        $taxonomy = Taxonomy::findOrFail($id);
        foreach ($taxonomy->ports as $port) {
            (TaxonomyMeta::find($port->id))->delete();
        }
        $taxonomy->delete();

        return back();
    }

    public function taxonomy_meta_remove($id)
    {

        // Save Vehicle
        $taxonomy_meta = TaxonomyMeta::findOrFail($id);
        $taxonomy_meta->delete();

        return back();
    }

    public function save(Request $request)
    {
        // Save Taxonomy
        if(!$request['id']) $taxonomy = new Taxonomy();
        else $taxonomy = Taxonomy::find($request['id']);

        $taxonomy->fill($request->all());
        $taxonomy->slug = str_slug($taxonomy->name);
        $taxonomy->save();

        return back();
    }

    public function taxonomy_meta_save(Request $request)
    {
        // Save TaxonomyMeta
        if(!$request['id']) $taxonomy_meta = new TaxonomyMeta();
        else $taxonomy_meta = TaxonomyMeta::find($request['id']);

        $taxonomy_meta->fill($request->all());
        $taxonomy_meta->slug = str_slug($taxonomy_meta->name);
        $taxonomy_meta->save();

        return back();
    }
}
