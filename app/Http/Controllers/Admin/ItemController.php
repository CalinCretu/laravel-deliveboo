<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{

    public function sidebar(string $slug)
    {

        $user = Auth::user();
        if ($slug == $user->slug) {
            $user_id = $user->id;
            $items = Item::where('user_id', '=', $user_id)->get();
            $orders = Order::where('user_id', '=', $user_id)->get();
            return view('admin.partials.sidebar', compact('items', 'user', 'orders'));
        } else {
            return view('admin.errors.error');
        }
    }

    public function statistics(string $slug)
    {

        $user = Auth::user();
        if ($slug == $user->slug) {
            $user_id = $user->id;
            $items = Item::where('user_id', '=', $user_id)->get();
            $orders = Order::where('user_id', '=', $user_id)->get();
            return view('admin.items.statistics', compact('items', 'user', 'orders'));
        } else {
            return view('admin.errors.error');
        }
    }

    public function header(string $slug)
    {

        $user = Auth::user();
        if ($slug == $user->slug) {
            $user_id = $user->id;
            $items = Item::where('user_id', '=', $user_id)->get();
            $orders = Order::where('user_id', '=', $user_id)->get();
            return view('admin.layouts.app', compact('items', 'user', 'orders'));
        } else {
            return view('admin.errors.error');
        }
    }

    public function index(string $slug)
    {
        $user = Auth::user();
        if ($slug ==  $user->slug) {
            $user_id = $user->id;
            $items = Item::where('user_id', '=', $user_id)->get();
            return view('admin.items.index', compact('items', 'user'));
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
        $items_slug = Item::pluck('slug')->toArray();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'string|unique:items,slug|max:255',
            'price' => 'required|numeric|min:0',
            'item_img' => 'required',
            'description' => 'required|string',
            'is_visible' => 'boolean',
        ]);

        $data = $request->all();
        $file_path = Storage::put('items_img', $request->item_img);
        $data['item_img'] = $file_path;
        $data['slug'] = Str::slug($data['name']);
        $i = 1;
        if (in_array($data['slug'], $items_slug)) {
            while (in_array($data['slug'] . $i, $items_slug)) {
                $i++;
            };
            $data['slug'] .= $i;
        };
        $data['is_vegan'] = $request->is_vegan == 'on' ? 1 : 0;
        $data['is_gluten_free'] = $request->is_gluten_free == 'on' ? 1 : 0;
        $data['is_spicy'] = $request->is_spicy == 'on' ? 1 : 0;
        $item = Item::create($data);
        $item->user()->associate($user);
        $item->save();
        return redirect()->route('admin.items.show', ['slug' => $user->slug, 'item' => $item]);
    }

    public function show(string $slug, Item $item)
    {
        $user = Auth::user();
        $items = Item::where('user_id', '=', $user->id)->pluck('id')->toArray();
        $currentItemIndex = array_search($item->id, $items);
        if(count($items) == 1) {
            $nextItemId = $items[$currentItemIndex];
            $previousItemId = $items[$currentItemIndex];
        }else if ($currentItemIndex == 0) {
            $nextItemId = $items[$currentItemIndex + 1];
            $previousItemId = $items[count($items) - 1];
        } elseif ($currentItemIndex == count($items) - 1) {
            $previousItemId = $items[$currentItemIndex - 1];
            $nextItemId = $items[0];
        } else {
            $previousItemId = $items[$currentItemIndex - 1];
            $nextItemId = $items[$currentItemIndex + 1];
        };

        // dd($nextItemId, $previousItemId);

        if ($user->id ==  $item->user->id && $slug ==  $user->slug) {
            return view('admin.items.show', ['item' => $item], compact('user', 'previousItemId', 'nextItemId'));
        } else {
            return view('admin.errors.error');
        }
    }

    public function edit(string $slug, Item $item)
    {
        $user = Auth::user();

        if ($user->id ==  $item->user->id && $slug ==  $user->slug) {
            // dd($item);
            return view('admin.items.edit', compact('item', 'user'));
        } else {
            return view('admin.errors.error');
        }
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        // dd($request);
        $user = Auth::user();
        $items_slug = Item::pluck('slug')->toArray();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'string|unique:items,slug|max:255',
            'price' => 'required|numeric|between:0,999.99',
            // 'item_img' => 'required',
            'description' => 'required|string',
            'is_visible' => 'boolean',
        ]);
        $data = $request->all();
        if ($request->hasFile('item_img')) {

            $file_path = Storage::put('items_img', $request->item_img);
            $data['item_img'] = $file_path;
            if ($item->item_img) {
                Storage::delete($item->item_img);
            }
        }
        $data['slug'] = Str::slug($data['name']);
        $i = 1;
        if (in_array($data['slug'], $items_slug)) {
            while (in_array($data['slug'] . $i, $items_slug)) {
                $i++;
            };
            $data['slug'] .= $i;
        };
        $data['is_vegan'] = $request->is_vegan == 'on' ? 1 : 0;
        $data['is_gluten_free'] = $request->is_gluten_free == 'on' ? 1 : 0;
        $data['is_spicy'] = $request->is_spicy == 'on' ? 1 : 0;
        $item->update($data);
        return redirect()->route('admin.items.show', ['slug' => $user->slug, 'item' => $item]);
    }

    public function restore($item_id)
    {
        $post = Item::withTrashed()->where('id', $item_id)->first();

        if (!isset($item)) {
            abort(404);
        }

        if ($item->trashed()) {
            $item->restore();
        }

        return back();
    }


    public function destroy($item_id)
    {
        $item = Item::withTrashed()->where('id', $item_id)->first();
        // $item->delete();
        if (!isset($item)) {
            abort(404);
        }
        $item->orders()->sync([]);
        if ($item->trashed()) {
            $item->forceDelete();
        } else {
            $item->delete();
        }
        return redirect()->route('admin.items.index', ['slug' => Auth::user()->slug]);
    }
}
