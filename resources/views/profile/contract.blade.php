@extends('layouts.app')
@section('content')
<div class="section groups-container" id="user-profile">
    <div class="row">
        <div class="col s12">
            <div class="header-group">
                @php
                    $bgimage = $user->cover_photo;
                @endphp
                <div class="cover-group userCoverPhoto" style="background-image:url('{{$bgimage}}')">
                    <div class="logo-group">
                        <img src='{{$user->avatar}}' alt="avatar" class="userProfilePhoto" />
                    </div>
                    <div class="titlu-group">
                        <input type="hidden" id="user_id" value="{{$user->id}}" />
                        <p class="user_name_N">{{$user->name}}</p>
                        <span>{{$userRoleName}}</span>
                    </div>

                    <div class="buttons-group">
                        <a class="btn btn-gray">
                          {{trans('message.activities_journal')}}
                        </a>
                        <a class="btn btn-gray dateGenerale">
                          {{trans('message.change_blanket')}}
                        </a>

                        <a class="btn btn-gray" onclick="event.preventDefault(); document.getElementById('download-contract').submit();">
                          {{trans('message.download_contract')}}
                        </a>
                    </div>
                    <form id="download-contract" name="download-contract" action="{{route('user.contract.download')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <!-- User Post Feed -->
                    <div class="row">
                        <div class="col s12 m12 xl12">
                            <div class="post-wrapper card card-border new-post-widget">
                                <div class="post-comments">
                                    <div class="post-comment comment">
                                        <div class="comment-input">
                                            @include("profile.download",['contract' => $contract])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
