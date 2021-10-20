@extends('layouts.app')

@section('content')

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="col s12">
            <div class="container">
                <div class="card-panel border-radius-6 card-inner-continer mt-0">
                    @include("layouts.common.welcome")

                    @include("layouts.common.button")

                    @include("layouts.common.tab")
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('clock/clock.js')}}"></script>
<script src="{{ asset('js/obeservation.js')}}"></script>
@endpush
