<div class="form-group{{ $errors->has($fieldName) ? 'has-error' : ''}} mb-3">
    <div id="{{strtoupper($fieldName)}}_PREVIEW" class="d-flex flex-column justify-content-center align-items-center position-relative">
        <div style="max-width: 360px;background: #f3f3f3;padding: 6px;box-shadow: 0 1px 2px rgb(0 0 0 / 20%);">
            <input value="{{$old}}" type="hidden" id="{{strtoupper($fieldName)}}_INPUT" class="form-control" name="{{$fieldName}}" aria-label="Image" aria-describedby="{{strtoupper($fieldName)}}_BTN">
            <img src="{{$old}}" alt="" style="width: 100%;">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <button style="width: 100%;border: unset;outline: unset;"

                            @if(isset($uploadFunc))
                                onclick="{{$uploadFunc}}"
                            @endif
                            class="btn" type="button" id="{{strtoupper($fieldName)}}_BTN">
                        <span class="fal fa-select"></span>
                        {{$fieldTitle}}
                    </button>
                </div>
                <div>
                    <button
                        @if(isset($removeFunc))
                        onclick="{{$removeFunc}}"
                        @endif
                        type="button" class="btn btn-text text-danger" id="{{strtoupper($fieldName)}}_TRASH"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>
    {!! $errors->first($fieldName, '<p class="help-block">:message</p>') !!}
</div>
