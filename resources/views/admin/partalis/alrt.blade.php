@session('success')
 <div
    class="alert alert-success alert-dismissible fade show"
    role="alert"
 >
    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
    ></button>

    <strong>{{ session()->get('success') }}</strong>
 </div>

@endsession

@if ($errors->any())
<div
    class="alert alert-danger alert-dismissible fade show"
    role="alert"
>
    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
    ></button>

   <ul>
     @foreach ($errors->all() as $item)
     <li><strong>{{ $item }}</strong></li>

     @endforeach
   </ul>
</div>


@endif
