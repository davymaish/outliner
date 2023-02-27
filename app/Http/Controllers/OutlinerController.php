<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OutlinerItem;
use Illuminate\Support\Facades\Auth;
use Str;

class OutlinerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $items = $user->outlinerItems()->orderBy('position')->get();
        return view('outliner.index', compact('items'));
    }

    public function create()
    {
        $parent_items = OutlinerItem::isRoot()->get();
        return view('outliner.create', compact('parent_items'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'parent_id' => 'nullable|exists:outliner_items,id',
        ]);

        $user = Auth::user();
        $position = $user->outlinerItems()->max('position') + 1;

        $item = new OutlinerItem([
            'title' => $validatedData['title'],
            'position' => $position,
            'description' => $validatedData['description'],
            'parent_id' =>  $validatedData['parent_id'],
            'sync_id' => Str::uuid(),
        ]);

        $user->outlinerItems()->save($item);

        return redirect()->route('outliner.index')->with('success', 'Outline item created successfully.');
    }

    public function edit($id)
    {
        $outliner = OutlinerItem::findOrFail($id);
        $parent_items = OutlinerItem::isRoot()->get();

        return view('outliner.edit', compact('outliner','parent_items'));
    }

    public function update(Request $request, $id)
    {
        $outliner = OutlinerItem::find($id);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'parent_id' => 'nullable|exists:outliners,id'
        ]);

        $outliner->title = $validatedData['title'];
        $outliner->description = $validatedData['description'];
        $outliner->parent_id = $validatedData['parent_id'];

        $outliner->save();

        return redirect()->route('outliner.index')->with('success', 'Outline item updated successfully.');
    }

}
