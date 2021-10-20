<div class="container">
    <div class="content-area content-right white">
        <div class="app-wrapper">
            <div id="button-trigger" class="card card card-default scrollspy-coustome fixed-width z-depth-0">
                <div class="card-content p-0">
                    <table id="data-table-contact" class="display bordered schedule-intervie-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{trans('message.name')}}</th>
                                <th>{{trans('message.phone')}}</th>
                                <th>{{trans('message.date')}}</th>
                                <th>{{trans('message.status')}}</th>
                                <th>{{trans('message.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody class="filterInterviewData">
                            @include("interview.filter",['interviews' => $interviews])
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
