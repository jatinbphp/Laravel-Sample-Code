<div id="modal-manager-pay" class=" modalx bottom-sheet hidden modal-custom">
    <div class="modal-header">
        <h4> {{trans('message.add')}} {{trans('message.amount')}}</h4>
        <div class="buttons-group">
            <a href="#" id="close-manager-pay">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">
        <div class="card-content content overflow-y-list">
            <form name="manager-price-pay" id="manager-price-pay" type="post">
                @csrf
                <input type="hidden" name="tour_id" value="{{$tour_id}}" />
                <div class="row">
                    <div class="input-field col s12 k-dropdown">
                        <label  for="site" >{{trans('message.choose_the_site')}} <span>*</span></label>
                        <select name="site"  id="site" class="browser-default">
                            @foreach($sites as $site)
                            <option value="{{$site->id}}">{{$site->name}}</option>
                            @endforeach
                        </select>
                        <span class="error  k-error" id="site_error"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field k-input-text col s12" >
                        <label>{{trans('message.amount_received')}} <span>*</span></label>
                        <input type="text" name="price" id="price" class="numeric validate k-txt-box" />
                        <span class="error p-0 k-error" id="price_error"> </span>
                    </div>
                </div>
                 <div class="modal_button_center">
                    <button type="submit" name="submitManagerPay" id="submitManagerPay" class="  action-btn   btn k-button-fill k-icon submitManagerPay"> <img src="{{asset('img/plus-bl.png')}}"> {{trans('message.add')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<button data-value="{{$tour_id}}"  class="show-manager-pay action-btn   btn k-button-fill k-icon">  <img src="{{asset('img/plus-bl.png')}}"> {{trans('message.add_payment')}}</button>
<div class="paymentRow">
    @include("manager.pays",['pays'=>$pays])
</div>
