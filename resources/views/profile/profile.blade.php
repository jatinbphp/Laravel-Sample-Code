<div class="card-panel card-with-header p-0 border-radius-6 pt-2 mt-0">
    <div class="row ml-0 mr-0 display-flex flex-wrap">
        <div class="col s6 mb-2">
            <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100">
                <div class="card-header">
                    <h4 class="k-h4"> {{trans('message.profile')}}</h4>
                </div>
                <div class="card-inner-continer">
                    <form id="form-profile" name="form-profile">
                        <div class="row">
                            <div class="input-field col s6 k-input-text">
                                <!--  <i class="material-icons prefix">
                                account_circle
                                </i> -->
                                <label for="name3">
                                    {{trans('message.name')}} <span>*</span>
                                </label>
                                <input id="name" name="name" type="text" class="validate k-txt-box" value="{{$user->name}}" pattern="[A-Za-z -]">
                                <span class="error k-error" id="name_error">
                                </span>
                            </div>
                            <div class="input-field col s6 k-input-text">
                                <!--  <i class="material-icons prefix">
                                email
                                </i> -->
                                <label for="email3">
                                    {{trans('message.email')}}<span>*</span>
                                </label>
                                <input id="email" name="email" type="email" class="validate k-txt-box " value="{{$user->email}}">
                                <span class="error k-error" id="email_error">
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 k-input-text">
                                <!--   <i class="material-icons prefix">
                                account_circle
                                </i> -->
                                <label for="real_name">
                                    {{trans('message.real_name')}} <span>*</span>
                                </label>
                                <input id="real_name" name="real_name" type="text" class="validate k-txt-box" value="{{$user->real_name}}" pattern="[A-Za-z -]">
                                <span class="error k-error" id="real_name_error">
                                </span>
                            </div>
                            <div class="input-field col s6 k-input-text">
                                <!--  <i class="material-icons prefix">
                                account_circle
                                </i> -->
                                <label for="phone">
                                    {{trans('message.telephone')}} <span>*</span>
                                </label>
                                <input id="phone" name="phone" type="text" class="validate numeric k-txt-box" value="{{$user->phone}}" maxlength="15">
                                <span class="error k-error" id="phone_error">
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6  k-input-text">
                                <label for="birthday">
                                    {{trans('message.birth_date')}} <span>*</span>
                                </label>
                                <input id="pastDatePicker" name="birthday" type="text" class="birthdate-picker birthDatePicker k-txt-box" value="{{ $user->birth_date}}" placeholder="{{ trans('message.pick_a_birthday') }}">
                                </input>
                                <span class="error k-error" id="birthday_error">
                                </span>
                            </div>
                            <div class="input-field col s6 k-input-text">
                                <label for="name3">
                                    {{trans('message.company')}} {{trans('message.name')}} <span>*</span>
                                </label>
                                <input id="company_name" name="company_name" type="text" class="validate k-txt-box" value="{{$user->company_name}}" pattern="[A-Za-z -]">
                                <span class="error k-error" id="company_name_error">
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 k-input-text">
                                <label for="name3">
                                    {{trans('message.company')}} Register No <span>*</span>
                                </label>
                                <input id="company_register_no" name="company_register_no" type="text" class="validate k-txt-box" value="{{$user->company_register_no}}" pattern="[A-Za-z -]">
                                <span class="error k-error" id="company_register_no_error">
                                </span>
                            </div>
                            <div class="input-field col s6 k-input-text">
                                <label for="name3">
                                    {{trans('message.company')}} {{trans('message.address')}}
                                </label>
                                <input id="company_address" name="company_address" type="text" class="validate k-txt-box" value="{{$user->company_address}}" pattern="[A-Za-z -]">
                                <span class="error k-error" id="company_address_error">
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 k-input-text">
                                <label for="name3">
                                    {{trans('message.company')}} {{trans('message.city')}} <span>*</span>
                                </label>
                                <input id="company_city" name="company_city" type="text" class="validate k-txt-box" value="{{$user->company_city}}" pattern="[A-Za-z -]">
                                <span class="error k-error" id="company_city_error">
                                </span>
                            </div>
                            <div class="input-field col s6 k-input-text">
                                <label for="name3">
                                    {{trans('message.company')}} {{trans('message.state')}} <span>*</span>
                                </label>
                                <input id="company_state" name="company_state" type="text" class="validate k-txt-box" value="{{$user->company_state}}" pattern="[A-Za-z -]">
                                <span class="error k-error" id="company_state_error">
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 k-input-text">
                                <label for="name3">
                                    {{trans('message.company')}} {{trans('message.country')}} <span>*</span>
                                </label>
                                <input id="company_country" name="company_country" type="text" class="validate k-txt-box" value="{{$user->company_country}}" pattern="[A-Za-z -]">
                                <span class="error k-error" id="company_country_error">
                                </span>
                            </div>
                            <div class="input-field col s6 k-input-text">
                                <label for="name3">
                                    {{trans('message.company')}} {{trans('message.email')}}
                                </label>
                                <input id="company_email" name="company_email" type="email" class="validate k-txt-box" value="{{$user->company_email}}">
                                <span class="error k-error" id="company_email_error">
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 k-input-text">
                                <label for="name3">
                                    {{trans('message.company')}} {{trans('message.phone')}}
                                </label>
                                <input id="company_phone" name="company_phone" type="text" class="validate k-txt-box" value="{{$user->company_phone}}" pattern="[A-Za-z -]">
                                <span class="error k-error" id="company_phone_error">
                                </span>
                            </div>
                            <div class="input-field col s6 k-input-text">
                                <label for="name3">
                                    {{trans('message.bank')}} {{trans('message.account_no')}}
                                </label>
                                <input id="bank_account_no" name="bank_account_no" type="email" class="validate k-txt-box" value="{{$user->bank_account_no}}">
                                <span class="error k-error" id="bank_account_no_error">
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 k-input-text">
                                <label for="name3">
                                    {{trans('message.bank')}} {{trans('message.name')}}
                                </label>
                                <input id="bank_name" name="bank_name" type="text" class="validate k-txt-box" value="{{$user->bank_name}}" pattern="[A-Za-z -]">
                                <span class="error k-error" id="bank_name_error">
                                </span>
                            </div>
                            <div class="input-field col s12">
                                <button class="action-btn  btn k-button-fill k-btn-normal k-btn-icon right btnProfileSave" name="action" type="submit"><img src="{{asset('img/edit.png')}}" alt="">  {{trans('message.update')}} </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col s6 mb-2">
            <div class="card-panel card-with-header p-0 border-radius-6 mt-0 display-flex flex-column">
                <div class="card-header">
                    <h4 class="k-h4"> {{trans('message.profile_photo')}}</h4>
                </div>
                <div class="card-inner-continer flex-grow-1">
                    <form id="form-profile-photo" name="form-profile-photo" enctype="multipart/form-data" method="post" class="display-flex flex-column h-100 justify-content-between">
                        <input type="file" id="input-file-photo" class="dropify-event userPhoto center"
                        data-default-file='{{$user->avatar}}' data-allowed-file-extensions="png jpg jpeg" data-max-file-size-preview="1M" />
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btnPhotoSave action-btn  btn k-button-fill k-btn-normal k-btn-icon right" name="action" type="submit"> <img src="{{asset('img/edit.png')}}" alt="">  {{trans('message.update')}}  </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-panel card-with-header p-0 border-radius-6 mt-0">
                <div class="card-header">
                    <h4 class="k-h4"> {{trans('message.change_your_password')}}</h4>
                </div>
                <div class="card-inner-continer">
                    <form id="form-password" name="form-password">
                        @csrf
                        <div class="row">
                            <div class="input-field col s6 k-input-text">
                                <!-- <i class="material-icons prefix">
                                lock_outline
                                </i> -->
                                <label for="old_password">
                                    {{trans('message.old_password')}} <span>*</span>
                                </label>
                                <input class="validate k-txt-box" id="old_password" name="old_password" type="password"/>
                                <span class="error k-error" id="old_password_error">
                                </span>
                            </div>
                            <div class="input-field col s6 k-input-text">
                                <!--  <i class="material-icons prefix">
                                lock_outline
                                </i> -->
                                <label for="password">
                                    {{trans('message.new_password')}} <span>*</span>
                                </label>
                                <input class="validate k-txt-box" id="password" name="password" type="password">
                                <span class="error k-error" id="password_error">
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6  k-input-text">
                                <!--   <i class="material-icons prefix">
                                lock_outline
                                </i> -->
                                <label for="password_confirmation">
                                    {{trans('message.confirm_your_password')}} <span>*</span>
                                </label>
                                <input class="validate k-txt-box" id="password_confirmation" name="password_confirmation" type="password">
                                <span class="error k-error" id="password_confirmation_error">
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btnPasswordSave action-btn  btn k-button-fill k-btn-normal k-btn-icon right" name="action" type="submit"><img src="{{asset('img/edit.png')}}" alt="">  {{trans('message.update')}} </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if($userRoleName != "Super Admin")
                <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0">
                    <div class="card-header">
                        <h4 class="k-h4"> {{trans('message.payment_info')}}</h4>
                    </div>
                    <div class="card-inner-continer">
                        <div class="row">
                            <div class="input-field col s6 k-input-text">
                                <!--  <i class="material-icons prefix">
                                lock_outline
                                </i> -->
                                <label for="payment_day">
                                    {{trans('message.payment_day')}} <span>*</span>
                                </label>
                                <input class="validate k-txt-box" id="payment_day" name="payment_day" type="text" value="{{$user->payment_day}}" readonly="readonly">
                            </div>
                            <div class="input-field col s6 k-input-text">
                                <!--   <i class="material-icons prefix">
                                lock_outline
                                </i> -->
                                <label for="payment_id">
                                    {{trans('message.payment_id')}} <span>*</span>
                                </label>
                                <input class="validate k-txt-box" id="payment_id" name="payment_id" type="text" value="{{$user->payment_id}}" readonly="readonly">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 k-input-text">
                                <!--   <i class="material-icons prefix">
                                lock_outline
                                </i> -->
                                <label for="payment_id">
                                    {{trans('message.payment_amount')}} <span>*</span>
                                </label>
                                <input class="validate k-txt-box" id="payment_amount" name="payment_amount" type="text" value="{{$user->payment_amount}}" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="row ml-0 mr-0">
        <div class="col s6 mb-2">
            <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100 display-flex flex-column">
                <div class="card-header">
                    <h4 class="k-h4"> {{trans('message.identity_card')}}</h4>
                </div>
                <div class="card-inner-continer flex-grow-1">
                    <form id="form-card-photo" name="form-card-photo" enctype="multipart/form-data" method="post" class="display-flex flex-column h-100 justify-content-between">
                        <input type="file" name="card" id="input-file-photo" class="dropify-event userCard center"/>
                        <span class="error k-error" id="card_error">
                                </span>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btnCardSave action-btn  btn k-button-fill k-btn-normal k-btn-icon right" name="action" type="submit"> <img src="{{asset('img/edit.png')}}" alt="">  {{trans('message.update')}}  </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(in_array($userRoleName,['Super Admin','Agency Admin','Training Admin','Spaces Admin']))
            <div class="col s6 mb-2">
                <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100 display-flex flex-column">
                    <div class="card-header">
                        <h4 class="k-h4"> {{trans('message.signature')}}</h4>
                    </div>
                    <div class="card-inner-continer flex-grow-1">
                        <form id="form-signature-photo" name="form-signature-photo" enctype="multipart/form-data" method="post" class="display-flex flex-column h-100 justify-content-between">
                            <div class="input-field col s12 k-input-text">
                                <canvas id="signature-pad" class="signature-pad" width="450" height="200">
                                    {{$user->signature}}
                                </canvas>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <button class=" action-btn  btn k-button-fill k-btn-normal k-btn-icon right" name="action" type="submit" id="btnUserSignature"> <img src="{{asset('img/edit.png')}}" alt="">  {{trans('message.update')}}  </button>
                                </div>
                                <div class="input-field col s6">
                                    <button class="action-btn  btn k-button-fill k-icon" id="clearSignature" type="button">
                                      {{trans('message.clear')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        @if(in_array($userRoleName,['Super Admin','Spaces Admin','Training Admin']))
            <div class="col s6 mb-2">
                <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100">
                    <div class="card-header">
                        <h4 class="k-h4"> {{trans('message.setting')}}</h4>
                    </div>
                    <div class="card-inner-continer">
                        <form id="form-global-setting" name="form-global-setting">
                            <div class="row">
                                <div class="input-field col s6 k-input-text">
                                    <span>{{trans('message.auto')}} {{trans('message.service')}} {{trans('message.request')}} </span>
                                    <div class="switch k-switch k-switch-green">
                                        <label>
                                          <input type="checkbox" name="auto_service_request" id="auto_service_request" value="1" @if($user->auto_service_request == '1') checked="checked" @endif>
                                          <span class="lever"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btnSaveGlobalSetting action-btn  btn k-button-fill k-btn-normal k-btn-icon right" name="action" type="submit"><img src="{{asset('img/edit.png')}}" alt="">  {{trans('message.update')}} </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
