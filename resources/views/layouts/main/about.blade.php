@foreach ($about as $data)
  @if ($loop->odd)
    @include('layouts.main.aboutOdd')
  @else
    @include('layouts.main.aboutEven')
  @endif
@endforeach