@extends('base')

@section('content')
    <h1>You searched for <strong>{{ $entry }}</strong></h1>

    @foreach ($results as $result)
        <section>
            <h3>
                @if ($result->isHighlighted())
                    <span>{{ $result->getTitle() }}</span>
                @else
                    {{ $result->getTitle() }}
                @endif
            </h3>

            <p>{!! $result->getSnippet() !!}</p>
        </section>
    @endforeach
@endsection
