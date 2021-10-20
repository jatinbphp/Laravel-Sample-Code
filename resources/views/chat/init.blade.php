<div id="astroChat" class="chat-astro gradient-45deg-indigo-purple" data-users="{{route('chat.users')}}" data-window="{{route('chat.window')}}">
    <div class="openChat pulse">
     <p>
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 373.232 373.232" fill="#fff" style="enable-background:new 0 0 373.232 373.232;" xml:space="preserve">
            <g><g><path d="M187.466,0c-0.1,0.1-0.3,0.1-0.6,0.1c-101.2,0-183.5,82.3-183.5,183.5c0,41.3,14.1,81.4,39.9,113.7l-26.7,62
            c-2.2,5.1,0.2,11,5.2,13.1c1.8,0.8,3.8,1,5.7,0.7l97.9-17.2c19.6,7.1,40.2,10.7,61,10.6c101.2,0,183.5-82.3,183.5-183.5
            C370.066,82.1,288.366,0.1,187.466,0z M186.466,346.6c-19.3,0-38.4-3.5-56.5-10.3c-1.7-0.7-3.5-0.8-5.3-0.5l-82.4,14.4l21.8-50.7
            c1.5-3.5,0.9-7.6-1.6-10.5c-11.8-13.7-21.2-29.3-27.8-46.2c-7.4-18.9-11.2-39-11.2-59.3c0-90.2,73.4-163.5,163.5-163.5
            c89.9-0.2,162.9,72.5,163,162.4c0,0.2,0,0.4,0,0.6C349.966,273.3,276.566,346.6,186.466,346.6z"/></g></g><g><g><path d="M178.666,146.7h-54c-5.5,0-10,4.5-10,10s4.5,10,10,10h54c5.5,0,10-4.5,10-10S184.166,146.7,178.666,146.7z"/></g></g><g><g><path d="M248.666,196.7h-124c-5.5,0-10,4.5-10,10s4.5,10,10,10h124c5.5,0,10-4.5,10-10S254.166,196.7,248.666,196.7z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
        </svg>
        {{trans('message.chatting')}}</p>
        <a href="#" class="btn btn-floating pulse">{{trans('message.new')}}</a>
        <!-- <span class="new badge" data-badge-caption="custom caption" style="position: relative;top: 10px;">
            <span id="onlineUsers">*</span> online
        </span> -->
    </div>
    <div class="open-chat-link">
        <a href="{{url('chat/today')}}" target="_blank">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><g>
            <path d="M128,32V0H16C7.163,0,0,7.163,0,16v112h32V54.56L180.64,203.2l22.56-22.56L54.56,32H128z"/>
            <path d="M496,0H384v32h73.44L308.8,180.64l22.56,22.56L480,54.56V128h32V16C512,7.163,504.837,0,496,0z"/>
            <path d="M480,457.44L331.36,308.8l-22.56,22.56L457.44,480H384v32h112c8.837,0,16-7.163,16-16V384h-32V457.44z"/>
            <path d="M180.64,308.64L32,457.44V384H0v112c0,8.837,7.163,16,16,16h112v-32H54.56L203.2,331.36L180.64,308.64z"/>
        </g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>

        </a>
    </div>
    <div class="persoane-online k-input-text">
        <div class="search-block-chat">
            <input type="text" class="k-txt-box" placeholder="{{trans('message.search')}} {{trans('message.user')}}..." id="searchUser"/>
        </div>
        <div class="chat-list">
            {{--here comes the users list--}}
        </div>
    </div>
</div>
