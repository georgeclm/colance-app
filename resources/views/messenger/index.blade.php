  @extends('layouts.app')
  @section('title', 'Messages - Colance')
  @section('content')
      <div class="container py-5">
          @include('messenger.partials.flash')
          @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
      </div>
  @stop
