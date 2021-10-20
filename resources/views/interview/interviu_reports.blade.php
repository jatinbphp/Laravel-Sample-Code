<!-- Content Area Starts -->
<div class="content-area content-right">
    <div class="app-wrapper">
        <div class="datatable-search">
            <i class="material-icons mr-2 search-icon">search</i>
            <input type="text" placeholder="{{trans('message.look_for_a_model')}}" class="app-filter" id="global_filter">
        </div>
        <div id="button-trigger" class="card card card-default scrollspy border-radius-6 fixed-width">
            <div class="card-content p-0">
                <table id="data-table-contact" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th class="background-image-none center-align">
                                <label>
                                    <input type="checkbox" onClick="toggle(this)" />
                                    <span></span>
                                </label>
                            </th>
                            <th>{{trans('message.name')}}</th>
                            <th>{{trans('message.phone')}}</th>
                            <th>{{trans('message.email')}}</th>
                            <th>{{trans('message.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report )
                        <tr>
                            <td class="center-align contact-checkbox">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="foo" />
                                    <span></span>
                                </label>
                            </td>
                            <td>{{$report->user_real_name}}</td>
                            <td>{{$report->user_real_phone}}</td>
                            <td>{{$report->user_real_email}}</td>
                            <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
                            <td><a class=" btn modal-trigger blue-btn"   href="{{route('interview.report',$report->id)}}">{{trans('message.complete')}}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Content Area Ends -->
