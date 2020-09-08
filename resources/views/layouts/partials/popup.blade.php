@php
    $get_popup_dont_show_session = \Session::get('dont_show_popup');
@endphp


@if(!$get_popup_dont_show_session)

    @php
        $current_ = \Carbon\Carbon::now();
        $today_ =$current_->format('Y-m-d');

        $get_popups_data = (\App\Popup::whereDate('start_time', '<=', $today_)
                        ->whereDate('end_time', '>=', $today_)
                        ->get()
                    );

        $current_active_url = Request::url();
        $popupID = NULL;
        foreach($get_popups_data as $content){
        $url_array = (array_map('trim',array_filter(explode("##,", $content->url_list))));
            if(in_array($current_active_url , $url_array)){
                $popupID = $content->id;
                break;
            }
        }
        
        
        
       
    @endphp




    @if($popupID != NULL)
        @foreach($get_popups_data as $key=>$content)
            @if($content->id == $popupID)
            <div style="position: relative;">
                <div class="modal fade show" id="dynamicPOPUP" tabindex="-1" aria-labelledby="dynamicPOPUPLabel" aria-hidden="true" style="padding-right: 17px; display: block;">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content" style="
                        background: transparent; 
                        background-image: url({{ $content->popup_background_image }});
                        background-size: cover;
                    " >
                      <div class="modal-header" style="background: transparent">
                        <h5 class="modal-title" id="dynamicPOPUPLabel"></h5>
                        <button onclick="hidePOPUPBox()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" style="padding: 3rem">
                        <h4 class="text-white">{{ $content->title }}</h4>
                        <p class="text-white">{{ $content->description }}</p>

                        @if($content->button_text != NULL)
                        <div class="form-group">
                            <a href="@if($content->button_link != NULL){{$content->button_link}} @else # @endif" class="btn" style="background: {{$content->button_background}};color: {{$content->button_text_color}}">{{ $content->button_text }}</a>
                        </div>
                        @endif

                        <div class="form-group">
                            <input type="checkbox" name="" id="dontShowPopUp">
                            <label class="text-white" for="dontShowPopUp">Don't show this popup again</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            @push('scritps')
            <script type="text/javascript">
                $('<div class="modal-backdrop"></div>').appendTo(document.body);
                $(".modal-backdrop").css('background-color', '#212121')
                $(".modal-backdrop").css('opacity', '.8')

                function hidePOPUPBox(){
                    $("#dynamicPOPUP").remove()
                    $('.modal-backdrop').remove();
                }


                $("#dontShowPopUp").on("click", function(){
                    let token = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        url:"{{route('popUpDontShow.post')}}",
                        method:'POST',
                        data:{_token:token},
                        dataType:'JSON',
                        success:function(response){
                            if (response.success === true) {
                                console.log(response.msg)
                                $("#dynamicPOPUP").remove()
                                $('.modal-backdrop').remove();
                            }else{
                                console.log(response.msg)
                                alert('SORRY - Someting Went Wrong.')
                                window.location.reload(true)
                            }
                            
                        }
                    })
                })
            </script>
            @endpush

            @endif
        @endforeach
    @endif


@endif