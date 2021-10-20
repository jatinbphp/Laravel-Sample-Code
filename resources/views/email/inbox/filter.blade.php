@if(count($emails) > 0)
  @foreach($emails as $key => $email)
    @include("email.inbox.item",['email' => $email])
  @endforeach
@else
  <div class="no-data-found collection-item">
      <h6 class="center-align font-weight-500">
      No Results Found
      </h6>
  </div>
@endif
