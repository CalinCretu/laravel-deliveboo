<div class="wrapper">
  <div class="card" style="width: 18rem;">
    <img src="https://picsum.photos/200/150" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $item->name }}</h5>
      <p class="card-text">{{ $item->description }}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item d-flex justify-content-between">
        <span class="price">Price</span>
        <span class="fw-bold">{{ $item->price }}</span>
      </li>
    </ul>
    <div class="card-body d-flex justify-content-between">
      <a href="{{ route('admin.items.edit', ['slug' => Auth::user()->slug, 'item' => $item]) }}" class="btn btn-warning btn-sm">Edit</a>
      <button id="myBtn" class="btn btn-danger delete">Delete</button>
    </div>
  </div>
  <div id="bgForm" class="bg-form">
    <div class="d-flex gap-3 delete-form">
      <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger btn-lg">Yes</button>
      </form>
      <button id="noBtn" class="btn btn-primary btn-lg">No</button>
    </div>
  </div>
</div>