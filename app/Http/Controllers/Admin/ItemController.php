<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index(string $slug)
    {
        $user_slug = Auth::user()->slug;
        if ($slug ==  $user_slug) {
            $user_id = Auth::user()->id;
            $items = Item::where('user_id', '=', $user_id)->get();
            return view('admin.items.index', compact('items'));
        }
        else {
            return view('admin.errors.error');
        }
    }

    public function create(string $slug)
    {
        $user= Auth::user();
        if ($slug ==  $user->slug) {
            return view('admin.items.create', compact('user'));
        }
        else {
            return view('admin.errors.error');
        }
    }

    public function store(StoreItemRequest $request)
    {
        $user= Auth::user();
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);
        $item = Item::create($data);
        $item->user()->associate($user);
        $item->save();
        return redirect()->route('admin.items.show', ['slug' => $user->slug, 'item' => $item]);
    }

    public function show(string $slug, Item $item)
    {
        $user= Auth::user();
        if ($user->id ==  $item->user->id && $slug ==  $user->slug) {
            return view('admin.items.show', compact('item', 'user'));
        }
        else {
            return view('admin.errors.error');
        }
    }

    public function edit(string $slug, Item $item)
    {
        $user= Auth::user();
        if ($user->id ==  $item->user->id && $slug ==  $user->slug) {
            return view('admin.items.edit', ['item'=>$item, 'user'=>$user]);
        }
        else {
            return view('admin.errors.error');
        }
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        $user= Auth::user();
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);
        $item->update($data);
        return redirect()->route('admin.items.show', ['slug' => $user->slug, 'item' => $item]);
    }

    public function destroy(Item $item)
    {
    }
}
