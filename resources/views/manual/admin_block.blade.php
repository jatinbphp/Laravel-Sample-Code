<div class="col s12 m4">
    <div class="card card-hover z-depth-0 card-border-gray custome-border-block-border">
        <a class="modal-trigger" href="#arangeChapters">
            <div class="card-content center-align">
                <h5><b>{{trans('message.manage')}} </b></h5>
                <i class="material-icons md-48 red-text">favorite_border</i>
                <p class="mb-2 black-text">{{trans('message.edit_or_move_chapters_and_subchapters')}}</p>
            </div>
        </a>
    </div>
</div>
<div class="col s12 m4">
    <div class="card card-hover z-depth-0 card-border-gray custome-border-block-border">
        <a class="modal-trigger" href="#addManual">
            <div class="card-content center-align">
                <h5><b>{{trans('message.manual')}} </b></h5>
                <i class="material-icons md-48 amber-text">filter_none</i>
                <p class="mb-2 black-text">{{trans('message.see_the_manual_list_or_add_new_textbooks')}} </p>
            </div>
        </a>
    </div>
</div>
<div class="col s12 m4">
    <div class="card card-hover z-depth-0 card-border-gray custome-border-block-border">
        <a class="modal-trigger" href="#allowChapters">
            <div class="card-content center-align">
                <h5><b>{{trans('message.visibility')}}</b></h5>
                <i class="material-icons md-48 blue-text">aspect_ratio</i>
                <p class="mb-2 black-text">{{trans('message.sets_visibility_for_users')}}.</p>
            </div>
        </a>
    </div>
</div>

{{--start modale--}}

{{--seteaza vizibilitate--}}
<div id="allowChapters" class="modal modal-fixed-footer" data-url="{{route('manual.permisions')}}" style="max-width: 500px">
    <div class="modal-content">
        <h5>{{trans('message.set_visibility')}} </h5>
        <p>{{trans('message.sets_the_visibility_of_the_pages_for_each_type_of_user')}}!</p>
        <div class="row">
            <div class="col s12 m12 l12">
                <input type="hidden" id="role_id"/>
                <select name="role" id="role" class="select2 browser-default">
                    <option value="" disabled selected>{{trans('message.select_the_role')}}...</option>
                    @foreach($roles as $role)
                        @if (!in_array($role->id,[1,5]))
                            <option value="{{route('manual.get_permisions',['id'=>$role->id])}}" data-id="{{$role->id}}">{{$role->name}}</option>
                        @endif
                    @endforeach
                </select>
                <div class="roles"></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <small>{{trans('message.it_saves_automatically')}}</small>
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">{{trans('message.hang_up')}}</a>
    </div>
</div>

{{--editeaza cap/subcap si ordoneaza--}}
<div id="arangeChapters" class="modal modal-fixed-footer" data-url="{{route('manual.sorting')}}" style="width: auto; max-width: 1024px;">
    <div class="modal-content">
        <div class="col s12 m12 l12">
            <h5>{{trans('message.edit_or_arrange_chapters_subchapters')}}</h5>
        </div>
        <div class="col s12 m12 l12">
            <p>{{trans('message.arrange_the_order')}} </p>
            <div class="dd" id="nestable3" style="max-width: 100%">
                <ol class="dd-list">
                    @foreach($manuals as $manual)
                        <li class="dd-item dd3-item" data-id="{{$manual->id}}">
                            <div class="dd3-content">
                                <div class="float-left" style="text-transform: uppercase; font-weight: bold;">{{$manual->title}}</div>
                                <div class="float-right actionButtons">
                                    <a class="open-addChapter light-blue darken-4 white-text" href="#" data-h="Adauga capitol" data-id="{{$manual->id}}" data-type="capitol"> {{trans('message.add_chapter')}}</a>
                                </div>
                            </div>
                            @if (count($manual->chapters))
                                <ol class="dd-list">
                                    @foreach($manual->chapters as $chapter)
                                        <li class="dd-item dd3-item" data-id="{{$chapter->id}}">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">
                                                <div class="float-left">{{$chapter->title}}</div>
                                                <div class="float-right actionButtons">
                                                    <a class="open-addChapter light-blue darken-2 white-text" href="#" data-action="add" data-h="Adauga subcapitol" data-id="{{$chapter->id}}"
                                                       data-type="subcapitol"> {{trans('message.search')}}</a>
                                                    <a href="{{route('manual.get',['id'=>$chapter->id])}}" class="open-addChapter green darken-3 white-text"
                                                       data-id="{{$chapter->id}}" data-action="edit" data-h="Editeaza: {{$chapter->title}}">  {{trans('message.edit')}}</a>
                                                    <a href="{{route('manual.delete',['id'=>$chapter->id])}}" class="btn-delete-chapter red darken-2 white-text"
                                                       data-type="subcapitol"> {{trans('message.remove')}}</a>
                                                </div>
                                            </div>
                                            @if (count($chapter->subchapters))
                                                <ol class="dd-list">
                                                    @foreach($chapter->subchapters as $subchapter)
                                                        <li class="dd-item dd3-item" data-id="{{$subchapter->id}}">
                                                            <div class="dd-handle dd3-handle"></div>
                                                            <div class="dd3-content">
                                                                <div class="float-left">{{$subchapter->title}}</div>
                                                                <div class="float-right actionButtons">
                                                                    <a href="{{route('manual.get',['id'=>$subchapter->id])}}" class="open-addChapter green darken-3 white-text"
                                                                       data-id="{{$subchapter->id}}" data-action="edit" data-h="Editeaza: {{$subchapter->title}}"> {{trans('message.edit')}}</a>
                                                                    <a href="{{route('manual.delete',['id'=>$subchapter->id])}}"
                                                                       class="btn-delete-chapter red darken-2 white-text" data-type="subcapitol"> {{trans('message.remove')}}</a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </li>
                                    @endforeach
                                </ol>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
            <input type="hidden" id="nestable-output"/>
        </div>
    </div>
    <div class="modal-footer">
        <small>{{trans('message.it_saves_automatically')}}</small>
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">{{trans('message.hang_up')}}</a>
    </div>
</div>

{{--adauga capitol/subcapitol--}}
<div id="addChapter" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h5>*</h5>
        <div class="row">
            <form class="col s12" id="addChapterForm" action="{{route('manual.save_chapter')}}">
                <div class="input-field col s12">
                    <input id="chapter_title" name="title" type="text" class="validate" placeholder="{{trans('message.title')}}">
                    <input type="hidden" name="id" id="chapter_id"/>
                    <input type="hidden" name="parent_id" id="parent_id"/>
                    <input type="hidden" name="manual_id" id="manual_id"/>
                </div>
                <div class="col s12 " id="snow-container" style="margin-top: 15px">
                    <label>{{trans('message.content')}}</label>
                    <textarea id="editorText"></textarea>
                    <textarea name="text" id="textValue" style="display: none"></textarea>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="modal-action waves-effect waves-green btn-flat btn-add-chapter">{{trans('message.save')}}</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">{{trans('message.hang_up')}}</a>
    </div>
</div>

{{--adauga manual nou / vezi lista / editeaza --}}
<div id="addManual" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h5>{{trans('message.add_chapter_subchapter')}}</h5>
        <div class="row">

            <div class="col s12">
                <p><a class=" btn-large gradient-45deg-green-teal btn-add-manual">{{trans('message.add_new_manual')}}</a></p>
                <div class="row" id="addManualContainer">
                    <form id="addManualForm" action="{{route('manual.save_manual')}}">
                        <div class="input-field col s9">
                            <input id="title" name="title" type="text" class="validate" placeholder="{{trans('message.manual_name')}}">
                            <input type="hidden" name="id" id="current_id"/>
                        </div>
                        <div class="input-field col s3">
                            <a href="#" class="waves-effect waves-green btn-flat btn-save-manual">{{trans('message.save')}}</a>
                        </div>
                    </form>
                </div>
                <table class="striped highlight">
                    <thead>
                    <tr>
                        <th>{{trans('message.manual_name')}}</th>
                        <th class="right-align"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($manuals as $manual)
                        <tr>
                            <td>{{$manual->title}}</td>
                            <td class="right-align">
                                <a class=" btn gradient-45deg-amber-amber btn-edit-manual" href="#"
                                   data-id="{{$manual->id}}" data-title="{{$manual->title}}">{{trans('message.edit')}}</a>
                                <a class=" btn gradient-45deg-red-pink btn-delete-manual"
                                   href="{{route('manual.delete_manual',['id'=>$manual->id])}}">{{trans('message.remove')}}</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">{{trans('message.hang_up')}}</a>
    </div>
</div>
