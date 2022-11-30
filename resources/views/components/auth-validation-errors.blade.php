@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>

        <div class="text-danger p-3">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    </div>
@endif