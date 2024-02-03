<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index(string $slug)
    {
        $user = Auth::user();
        if ($slug ==  $user->slug) {
            $user_id = $user->id;
            $items = Item::where('user_id', '=', $user_id)->get();
            return view('admin.items.index', compact('items'));
        } else {
            return view('admin.errors.error');
        }
    }

    public function create(string $slug)
    {
        $user = Auth::user();
        if ($slug ==  $user->slug) {
            return view('admin.items.create', compact('user'));
        } else {
            return view('admin.errors.error');
        }
    }

    public function store(StoreItemRequest $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $file_path = Storage::put('items_img', $request->item_img);
        $data['item_img'] = $file_path;
        $data['slug'] = Str::slug($data['name']);
        $item = Item::create($data);
        $item->user()->associate($user);
        $item->save();
        return redirect()->route('admin.items.show', ['slug' => $user->slug, 'item' => $item]);
    }

    public function show(string $slug, Item $item)
    {
        $user = Auth::user();
        if ($user->id ==  $item->user->id && $slug ==  $user->slug) {
            return view('admin.items.show', ['item' => $item]);
        } else {
            return view('admin.errors.error');
        }
    }

    public function edit(string $slug, Item $item)
    {
        $user = Auth::user();
        if ($user->id ==  $item->user->id && $slug ==  $user->slug) {
            // dd($item);
            return view('admin.items.edit', compact('item'));
        } else {
            return view('admin.errors.error');
        }
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        $user = Auth::user();
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);
        $item->update($data);
        return redirect()->route('admin.items.show', ['slug' => $user->slug, 'item' => $item]);
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('admin.items.index', ['slug' => Auth::user()->slug]);
    }
}
