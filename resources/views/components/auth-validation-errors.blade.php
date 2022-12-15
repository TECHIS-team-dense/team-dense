@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>

        <div class="text-danger p-3 text-center">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    </div>
@endif