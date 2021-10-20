@if(count($fields) > 0)
  @php
  $i = 1;
  @endphp
  <div class="row">
  @foreach($fields as $key => $field)
    @php
      $fieldData = explode(":",$field);
      $fieldName = $fieldData['0'];
      $fieldType = 'text';
      $needIf = true;

      if(isset($fieldData['1']) && $fieldData['1'] == "OP") {
        $needIf = false;
      } else if(isset($fieldData['1']) && $fieldData['1'] != "OP") {
        $fieldType = $fieldData['1'];
        if(isset($fieldData['2']) && $fieldData['2'] == "OP") {
          $needIf = false;
        }
      }
    @endphp
      <div class="input-field col s3 k-input-text">
        <label for="name3">
          {{$fieldName}}
          @if($needIf)
            <span>*</span>
          @endif
        </label>
        @if($fieldType == 'TEXTAREA')
          <textarea class="materialize-textarea k-textarea contractTag" name="{{$fieldName}}" rows="2" data-tag="{{$fieldName}}">
              @if(isset($fieldsData->$fieldName))
                {{trim($fieldsData->$fieldName)}}
              @endif
          </textarea>
        @else
          <input id="name" name="{{$fieldName}}" type="{{$fieldType}}" class="validate contractTag k-txt-box @if($fieldName == 'CNP') numeric @endif" data-tag="{{$field}}" @if(isset($fieldsData->$fieldName)) value="{{$fieldsData->$fieldName}}" @endif @if($fieldName == 'CNP') maxlength="13" @endif>
        @endif
        <span class="error k-error" id="{{$fieldName}}_error">
        </span>
      </div>
    @if($i==4)
      @php $i=0; @endphp
      </div>
      <div class="row">
    @endif
    @php $i++; @endphp
  @endforeach
@endif

<div class="row">
  <div class="input-field col s12 k-input-text">
    <label for="name3">
      {{trans('message.content')}} <span>*</span>
    </label>
    <textarea class="materialize-textarea k-textarea" name="userContractContent" rows="2" id="userContractContent" name="userContractContent">
      {!! $contractContent !!}
    </textarea>
    <textarea class="materialize-textarea k-textarea hidden" name="content" rows="2" id="bindContractContent">
      {!! $templateContent !!}
    </textarea>
    <span class="error k-error" id="content_error">
    </span>
  </div>
</div>
