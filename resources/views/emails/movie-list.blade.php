@component('mail::message')
# Daily Movie List

Here are the movies you should watch soon:

@foreach ($movies as $movie)
@component('mail::panel')
<img src="{{ $movie->img }}" alt="{{ $movie->title }}" style="max-width: 100%">
<h2>{{ $movie->title }}</h2>
<p>{{ $movie->description }}</p>
@endcomponent
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent