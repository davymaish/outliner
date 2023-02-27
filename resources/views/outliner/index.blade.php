@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Outline Items') }}</div>
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        @php $i = 1 @endphp
                        @foreach ($items as $outliner)
                            @if ($outliner->parent_id == null)
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="heading{{ $outliner->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $outliner->id }}" aria-expanded="false" aria-controls="collapse{{ $outliner->id }}">
                                            Item {{ $i }} : {{ $outliner->title }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $outliner->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $outliner->id }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>{{ $outliner->description }}</strong>
                                            <a href="{{ route('outliner.edit', $outliner->id) }}" class="btn btn-sm btn-primary float-end">{{ __('Edit') }}</a>
                                            @php $x = 1 @endphp
                                            @foreach ($outliner->children as $child)
                                            <div class="accordion-item mb-3 mt-3">
                                                <h2 class="accordion-header" id="h{{ $child->id }}">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c{{ $child->id }}" aria-expanded="false" aria-controls="c{{ $child->id }}">
                                                        Sub Item {{ $x }} : {{ $child->title }}
                                                    </button>
                                                </h2>
                                                <div id="c{{ $child->id }}" class="accordion-collapse collapse" aria-labelledby="h{{ $child->id }}">
                                                    <div class="accordion-body">
                                                        {{ $child->description }} 
                                                        <a href="{{ route('outliner.edit', $child->id) }}" class="btn btn-sm btn-primary float-end">{{ __('Edit') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $x++ @endphp
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @php $i++ @endphp
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
