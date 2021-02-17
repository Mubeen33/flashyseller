@if(isset($customFields))
@php 
	$countBTN=0;
@endphp
        @foreach($customFields as $index => $customField)

                @foreach(json_decode($customField->options) as $key =>$field)
                        @if ($field->type == 'text')
                                        <div class="row mb-1">
                                            <div class="col-lg-3">
                                                <div class="mb-xs-2 strong">
                                                        {{ $field->label }} 
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="{{ $field->type }}" class="form-control " placeholder="{{ $field->label }}" name="element_{{ $key }}" required>
                                            </div>
                                        </div>
                                       @elseif($field->type == 'file')
                                        <div class="row mb-1">
                                            <div class="col-lg-3">
                                                <div class="mb-xs-2 strong">
                                                        {{ $field->label }} 
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                             <div class="row">
                                                <div class="imgicon" style="max-width: 20%; ">
                                                        <div class="imgdivtrash" id="imgicon-upload{{$countBTN}}">
                                                        <img src="{{ asset('images/upld.png') }}" style="max-width: 100%; " class="cardimg" id='img-upload{{$countBTN}}'/>
                                                    </div>
                                                        <a href="javascript:void(0)" style="display: none;" id="trashicon{{$countBTN}}" onclick="removeImgVer('img-upload{{$countBTN}}','file-2{{$countBTN}}','trashicon{{$countBTN}}','{{ asset('images/upld.png') }}')" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o imageTrashTag"></i></a>	
                                                
                                                </div>
                                                <div id="input-group{{$countBTN}}" style="margin-top: -38%;">
                                                        <span class="input-group-btn">
                                                                <span id="btn-file{{$countBTN}}" style="width: 0%;" class=" waves-effect waves-light btn-file">
                                                                        <input type="{{ $field->type }}" name="element_{{ $key }}" id="file-2{{$countBTN}}" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" style="border: 1px solid #D9D9D9; color: #5F5F5F;" required/>
                                                                        <label for="file-2" class="mw-100 mb-3 hidden" >
                                                                                <span></span>
                                                                                <strong >
                                                                                    <i class="fa fa-upload"></i>
                                                                                    {{__('Choose file')}}
                                                                                </strong>
                                                                            </label> 
                                                                </span>
                                                        </span>
                                                        <input type="text" class="form-control hidden"  readonly>
                                                </div>
                                             </div>
                                                
                                               
                                               

                                                <script type="text/javascript">
                                                        $("#imgicon-upload{{$countBTN}}").click(function(event) {
                                                        var previewImg = $(this).children("#img-upload{{$countBTN}}");
                                                        $('#file-2{{$countBTN}}').trigger("click");
                                                               $('#file-2{{$countBTN}}').change(function() {
                                                                        var reader = new FileReader();
                                                                        $('#trashicon{{$countBTN}}').css('display', 'flex');
                                                                        reader.onload = function(e) {
                                                                                var urll = e.target.result;
                                                                                $(previewImg).attr("src", urll);
                                                                                previewImg.parent().css("background", "transparent");
                                                                                previewImg.show();
                                                                                previewImg.siblings("p").hide();
                                                                        };
                                                                        reader.readAsDataURL(this.files[0]);
                                                                });
                                                              });
                                                </script>
                                                @php
                                                $countBTN++;
                                                @endphp	
                                            </div>
                                        </div>
                        @elseif ($field->type == 'select' && is_array(json_decode($field->options)))
                                
                                <div class="row mb-1">
                                        <div class="col-lg-3">
                                                <div class="mb-xs-2 strong">
                                                        {{ $field->label }} 
                                                </div>
                                        </div>
                                        <div class="col-lg-9">
                                               
                                               <select class="form-control" data-minimum-results-for-search="Infinity" name="element_{{ $key }}" required>
                                                        @foreach (json_decode($field->options) as $value)
                                                                <option value="{{ $value }}">{{ $value }}</option>
                                                        @endforeach
                                                </select>
                                        </div>
                                </div>
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
                                <div class="row mb-2 mt-2">
                                    <div class="col-lg-3">
                                        <div class="mb-xs-2 strong">
                                                {{ $field->label }} 
                                        </div>
                                    </div>
                                    <div class="col-lg-9" style="display: flex !important;">
                                            @foreach (json_decode($field->options) as $value)
                                                <div class="radio radio-inline" style="    margin-right: 3%;">
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
