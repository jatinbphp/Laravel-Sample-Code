<div class="col s6 mb-2">
    <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100 display-flex flex-column">
        <div class="card-header">
            <h4 class="k-h4"> {{trans('message.model_data')}}</h4>
        </div>
        <div class="card-inner-continer flex-grow-1">
            <table class="striped">
                <tbody>
                    <tr>
                        <th>
                            {{trans('message.model_name')}}:
                        </th>
                        <td>
                            @if(isset($interviewInfo))
                            {{$interviewInfo->user_real_name}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('message.phone')}}:
                        </th>
                        <td>
                            @if(isset($interviewInfo))
                            {{$interviewInfo->user_real_phone}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('message.email')}}:
                        </th>
                        <td>
                            @if(isset($interviewInfo))
                            {{$interviewInfo->user_real_email}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('message.status')}}:
                        </th>
                        <td>
                            @if(isset($interviewInfo) && $interviewInfo->status == "2")
                                <span class=" users-view-status chip green lighten-5 green-text">
                                    {{trans('message.accepted')}}
                                </span>
                            @endif

                            @if(isset($interviewInfo) && $interviewInfo->status == "6")
                                <span class=" users-view-status chip orange lighten-5 orange-text">
                                    {{trans('message.undecided')}}
                                </span>
                            @endif

                            @if(isset($interviewInfo) && $interviewInfo->status == "3")
                                <span class=" users-view-status chip red lighten-5 red-text">
                                    {{trans('message.rejected')}}
                                </span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col s6 mb-2">
    <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100 display-flex flex-column">
        <div class="card-header">
            <h4 class="k-h4"> {{trans('message.personalized_questions')}}</h4>
        </div>
        <div class="card-inner-continer flex-grow-1">
            <table class="striped">
                <tbody>

                    @foreach(getInterviewQuestion() as $questionId => $question)
                        <tr>
                            <td>
                                {{$question}}:
                            </td>
                            <td>
                                @if(isset($answers[$questionId]))
                                    {{$answers[$questionId]}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col s6 mb-2">
    <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100 display-flex flex-column">
        <div class="card-header">
            <h4 class="k-h4"> {{trans('message.general_questions')}}</h4>
        </div>
        <div class="card-inner-continer flex-grow-1">
            <table class="striped">
                <tbody>
                    <tr>
                        <th>
                            {{trans('message.where_else_did_he_work')}}:
                        </th>
                        <td>
                            @if(isset($anotherAnswer['0']))
                                {{$anotherAnswer[0]}}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{trans('message.details_old_studio')}}:
                        </th>
                        <td>
                            @if(isset($anotherAnswer[1]))
                                {{$anotherAnswer[1]}}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{trans('message.interview_notes')}}:
                        </th>
                        <td>
                            @if(isset($interviewInfo))
                                {{$interviewInfo->notice}}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col s6 mb-2">
    <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100 display-flex flex-column">
        <div class="card-header">
            <h4 class="k-h4"> {{trans('message.user')}} {{trans('message.info')}}</h4>
        </div>
        <div class="card-inner-continer flex-grow-1">
            <table class="striped">
                <tbody>
                    <tr>
                        <th>
                            {{trans('message.username')}}:
                        </th>
                        <td>
                            @if(isset($interviewInfo))
                                {{$interviewInfo->user->name}}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{trans('message.password')}}:
                        </th>
                        <td>
                            -
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{trans('message.email')}}:
                        </th>
                        <td>
                            @if(isset($interviewInfo))
                                {{$interviewInfo->user->email}}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col s6 mb-2">
    <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100 display-flex flex-column">
        <div class="card-header">
            <h4 class="k-h4"> {{trans('message.sms')}} {{trans('message.info')}}</h4>
        </div>
        <div class="card-inner-continer flex-grow-1">
            <table class="striped">
                <tbody>
                    @if(isset($interviewInfo))
                        @php
                            $sendSms = getSendSmsByUserId($interviewInfo->user_id);
                        @endphp
                    @endif
                    <tr>
                        <td colspan="2">
                            {{trans('message.content')}}:
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            @if(isset($sendSms))
                                {!! $sendSms->description !!}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>
                            {{trans('message.phone')}}:
                        </td>
                        <td>
                            @if(isset($sendSms))
                                {{ $sendSms->phone }}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col s6 mb-2">
    <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100 display-flex flex-column">
        <div class="card-header">
            <h4 class="k-h4"> {{trans('message.email')}} {{trans('message.info')}}</h4>
        </div>
        <div class="card-inner-continer flex-grow-1">
            <table class="striped">
                <tbody>
                    @if(isset($interviewInfo))
                        @php
                            $sendEmail = getSendEmailByUserId($interviewInfo->user_id);
                        @endphp
                    @endif
                    <tr>
                        <td colspan="2">
                            {{trans('message.content')}}:
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            @if(isset($sendEmail))
                                {!! $sendEmail->description !!}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>
                            {{trans('message.email')}}:
                        </td>
                        <td>
                            @if(isset($sendEmail))
                                {{ $sendEmail->email }}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
