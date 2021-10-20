<div id="profile" class="active">
    <div class="card-panel card-with-header p-0 border-radius-6 pt-2 mt-0">
        <div class="row ml-0 mr-0 display-flex flex-wrap">
            <div class="col s6 mb-2">
                <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100 display-flex flex-column">
                    <div class="card-header">
                        <h4 class="k-h4"> {{trans('message.profile')}}</h4>
                    </div>
                    <div class="card-inner-continer  flex-grow-1">
                        <form id="form-profile" name="form-profile" class="display-flex flex-column h-100 justify-content-between">
                            <div class="row">
                                <div class="input-field  col s6 k-input-text">
                                    <label for="name3">
                                        {{trans('message.name')}} <span>*</span>
                                    </label>
                                    <input id="name" name="name" type="text" class="validate validate k-txt-box" value="{{$user->name}}">
                                    <span class="error k-error" id="name_error">
                                    </span>
                                </div>

                                <div class="input-field  col s6 k-input-text">
                                    <label for="email3">
                                        {{trans('message.email')}} <span>*</span>
                                    </label>
                                    <input id="email" name="email" type="email" class="validate k-txt-box" value="{{$user->email}}" readonly="readonly">
                                </input>
                                <span class="error  k-error" id="email_error">
                                </span>
                            </div>
                        </div>

                        <div class="row">

                            <div class="input-field  col s6 k-input-text">
                                <label for="real_name">
                                    {{trans('message.real_name')}} <span>*</span>
                                </label>
                                <input id="real_name" name="real_name" type="text" class="validate k-txt-box" value="{{$user->real_name}}">
                            </input>
                            <span class="error k-error" id="real_name_error">
                            </span>
                        </div>

                        <div class="input-field  col s6 k-input-text">
                            <label for="phone">
                                {{trans('message.telephone')}} <span>*</span>
                            </label>
                            <input id="phone" name="phone" type="text" class="validate k-txt-box" value="{{$user->phone}}">
                        </input>
                        <span class="error k-errors" id="phone_error">
                        </span>
                    </div>
                </div>

                <div class="row">

                    <div class="input-field  col s6 k-input-text">
                        <label for="birthday">
                            {{trans('message.birth_date')}} <span>*</span>
                        </label>
                        <input id="pastDatePicker" name="birthday" type="text" class="birthdate-picker pastDatePicker validate k-txt-box" value="{{date('d-m-Y',strtotime($user->birthday))}}">
                    </input>
                    <span class="error k-errors" id="birthday_error">
                    </span>
                </div>

                @if($user->role_id != '4')

                <div class="input-field  col s6 k-input-text">
                    <label for="birthday">
                        {{trans('message.holiday')}} <span>*</span>
                    </label>
                    <input id="holiday" name="holiday" type="text" class="validate k-txt-box numeric" value="{{$user->holiday}}" maxlength="2">
                </input>
                <span class="error k-errors" id="holiday_error">
                </span>
            </div>
            @endif
        </div>

        <div class="row">
            <div class="input-field col s12">
                <button class="action-btn  btn k-button-fill k-btn-normal k-btn-icon right btnFeedProfileSave" name="action" type="submit" data-id="{{$secretId}}"><img src="{{asset('img/edit.png')}}" alt="">
                {{trans('message.update')}} </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<div class="col s6 mb-2">
    <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100 display-flex flex-column">
        <div class="card-header">
            <h4 class="k-h4"> {{trans('message.profile_photo')}}</h4>
        </div>
        <div class="card-inner-continer flex-grow-1">
            <form id="form-profile-photo" name="form-profile-photo" enctype="multipart/form-data" method="post" class="display-flex flex-column h-100 justify-content-between">
                @csrf
                <input type="file" id="input-file-photo" class="dropify-event userPhoto"
                data-default-file='{{$user->avatar}}' />

                <div class="row">
                    <div class="input-field col s12">

                        <button class=" action-btn  btn k-button-fill k-btn-normal k-btn-icon   btnFeedPhotoSave right" data-id="{{$secretId}}" name="action" type="submit"><img src="{{asset('img/edit.png')}}" alt=""> {{trans('message.update')}}  </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col s6 mb-2">
    <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100 display-flex flex-column">
        <div class="card-header">
            <h4 class="k-h4"> {{trans('message.change_your_password')}}</h4>
        </div>
        <div class="card-inner-continer flex-grow-1">
            <form id="form-password" name="form-password" class="display-flex flex-column h-100 justify-content-between" >
                @csrf
                <div class="row">
                    <div class="input-field col s12  k-input-text">
                                    <!--   <i class="material-icons prefix pt-2">
                                    lock_outline
                                </i> -->
                                <label for="old_password">
                                    {{trans('message.old_password')}} <span>*</span>
                                </label>
                                <input class=" validate k-txt-box" id="old_password" name="old_password" type="password"/>
                                <span class="error k-errors" id="old_password_error">
                                </span>
                            </div>

                            <div class="input-field col s12 k-input-text">
                                    <!--  <i class="material-icons prefix pt-2">
                                    lock_outline
                                </i> -->
                                <label for="password">
                                    {{trans('message.new_password')}} <span>*</span>
                                </label>
                                <input class="validate k-txt-box" id="password" name="password" type="password">
                            </input>
                            <span class="error k-errors" id="password_error">
                            </span>
                        </div>

                        <div class="input-field col s12  k-input-text">
                                    <!--   <i class="material-icons prefix">
                                    lock_outline
                                </i> -->
                                <label for="password_confirmation">
                                    {{trans('message.confirm_your_password')}} <span>*</span>
                                </label>
                                <input class="validate k-txt-box" id="password_confirmation" name="password_confirmation" type="password">
                            </input>
                            <span class="error k-errors" id="password_confirmation_error">
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">

                            <button class="action-btn  btn k-button-fill k-btn-normal k-btn-icon  right btnFeedPasswordSave " name="action" type="submit" data-id="{{$secretId}}"><img src="{{asset('img/edit.png')}}" alt="">
                                {{trans('message.update')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col s6 mb-2">
        <div class="card-panel paymentInfo card-with-header p-0 border-radius-6 mt-0 mb-0 h-100 display-flex flex-column">
            <div class="card-header modelPayment">
                <h4 class="k-h4"> {{trans('message.payment_info')}}</h4>
                <div class="model-block-row">
                </div>
            </div>
            <div class="card-inner-continer flex-grow-1">
                <form id="form-payment" name="form-payment" class="display-flex flex-column h-100 justify-content-between">
                    <div class="row">

                        <div class="input-field col s6  k-input-text ">
                            <label for="payment_id">
                                {{trans('message.payment_id')}}  <span>*</span>
                            </label>
                            <input id="payment_id" name="payment_id" type="text" class="validate k-txt-box" value="{{$user->payment_id}}" placeholder="{{ trans('message.payment_id') }}">
                            <span class="error k-error" id="payment_id_error">
                            </span>
                        </div>

                        @if($user->role_id != "4")
                        <div class="input-field col s6 k-input-text ">
                            <label for="payment_amount">
                                {{trans('message.payment_amount')}}
                            </label>
                            <input id="payment_amount" name="payment_amount" type="text" class="validate k-txt-box" value="{{$user->payment_amount}}" maxlength="5" placeholder="{{ trans('message.payment') }} {{ trans('message.amount') }}">
                            <span class="error k-error" id="payment_amount_error">
                            </span>
                        </div>
                        @endif

                        <div class="input-field col s12 k-dropdown ">
                            <label class="active" for="payment_day">
                                {{trans('message.payment_day')}} <span>*</span>
                            </label>
                            <select id="payment_day" name="payment_day" class="js-select2 paymentDay" multiple="multiple">
                                @foreach(getPaymentDays() as $dayId => $day)
                                <option value="{{$dayId}}" @if(in_array($dayId,explode(",",$user->payment_day))) selected='selected' @endif >{{$day}}</option>
                                @endforeach
                            </select>
                            <span class="error k-error" id="payment_day_error"></span>
                        </div>

                        <div id="paymentDay">
                            @if(isset($user->payment_percentage) && $user->payment_percentage != "")
                                @php
                                    $total = 0;
                                @endphp
                                @foreach(explode(",",$user->payment_day) as $dayId => $day)
                                    @php
                                        $total += (isset($perceVal["$day"]) ? $perceVal["$day"] : "");
                                    @endphp
                                    <div class="input-field col s3 k-input-text paymentDay{{$day}}">
                                        <label for="day_{{$day}}">
                                            @if($dayId != 0)
                                            <span class="input-appendicons">+</span>
                                            @endif
                                            {{trans('message.day')}} {{$day}}(%) <span>*</span>
                                        </label>
                                        <div class="input-wrap">
                                            <input id="day_{{$day}}" name="day_{{$day}}" type="text" class="validate k-txt-box numeric percentageAmout" @if(isset($perceVal["$day"])) value='{{$perceVal["$day"]}}' @endif maxlength="3" placeholder="% {{trans('message.amount')}}">
                                        </div>
                                        <span class="error k-error" id="day_{{$day}}_error">
                                        </span>
                                    </div>
                                @endforeach

                                <div class="input-field col s3 k-input-text">
                                    <label for="day">
                                        <span class="input-appendicons">=</span>
                                        {{trans('message.total')}}(%)
                                    </label>

                                    <input id="total" name="total" type="text" class="validate k-txt-box numeric totalPercentage" maxlength="3" readonly="readonly" placeholder="{{trans('message.total')}}" value="{{$total}}">
                                    <span class="error k-error" id="total_error">
                                    </span>
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="action-btn  btn k-button-fill k-btn-normal k-btn-icon right btnFeedPaymentSave" name="action" type="submit" data-id="{{$secretId}}"><img src="{{asset('img/edit.png')}}" alt="">
                                {{trans('message.update')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
