@if(isset($customFields))
        @foreach($customFields as $index => $customField)

                @foreach(json_decode($customField->options) as $key =>$field)
                        @if ($field->type == 'text')
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mb-xs-2 strong">
                                                        {{ $field->label }} 
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="{{ $field->type }}" class="form-control mb-3" placeholder="{{ $field->label }}" name="element_{{ $key }}" required>
                                            </div>
                                        </div><br>
                            @elseif($field->type == 'file')
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mb-xs-2 strong">
                                                        {{ $field->label }} 
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="{{ $field->type }}" name="element_{{ $key }}" id="file-2" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" required/>
                                                <label for="file-2" class="mw-100 mb-3">
                                                    <span></span>
                                                    <strong>
                                                        <i class="fa fa-upload"></i>
                                                        {{__('Choose file')}}
                                                    </strong>
                                                </label>
                                            </div>
                                        </div>
                        @elseif ($field->type == 'select' && is_array(json_decode($field->options)))
                                
                                <div class="row">
                                        <div class="col-lg-3">
                                                <div class="mb-xs-2 strong">
                                                        {{ $field->label }} 
                                                </div>
                                        </div>
                                        <div class="col-lg-4">
                                               
                                               <select class="form-control" data-minimum-results-for-search="Infinity" name="element_{{ $key }}" required>
                                                        @foreach (json_decode($field->options) as $value)
                                                                <option value="{{ $value }}">{{ $value }}</option>
                                                        @endforeach
                                                </select>
                                        </div>
                                </div><br/>
                        {{-- @elseif ($field->type == 'multi_select' && is_array(json_decode($field->options))) --}}
                                {{-- <div class="row">
                                        <div class="col-lg-3">
                                                <div class="mb-xs-2 strong">
                                                        {{ $field->label }} 
                                                </div>
                                        </div>
                                    <div class="col-lg-4">
                                            <select class="form-control select2" name="element_{{ $key }}[]" multiple="multiple" required>
                                                @foreach (json_decode($field->options) as $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>  --}}       
                        @elseif ($field->type == 'radio')
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-xs-2 strong">
                                                {{ $field->label }} 
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                            @foreach (json_decode($field->options) as $value)
                                                <div class="radio radio-inline">
                                                    <input type="radio" name="element_{{ $key }}" value="{{ $value }}" id="{{ $value }}">
                                                    <label for="{{ $value }}">{{ $value }}</label>
                                                </div>
                                            @endforeach
                                    </div>
                                </div>        
                        @endif            
                @endforeach    
        @endforeach    
@endif