@extends('admin.layouts.master')

@section('content')

<section class="section">
                        <div class="section-header">
                            <h1>Chat Box</h1>
                            <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item"><a href="#">Components</a></div>
                            <div class="breadcrumb-item">Chat Box</div>
                            </div>
                        </div>

                        <div class="section-body">
                            <h2 class="section-title">Chat Boxes</h2>
                            <p class="section-lead">The chat component and is equipped with a JavaScript API, making it easy for you to integrate with Back-end.</p>

                            <div class="row align-items-center justify-content-center">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card" style="height: 70vh;">
                                    <div class="card-header">
                                        <h4>Who's Online?</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled list-unstyled-border">
                                            @foreach($chatUsers as $chatUser)
                                            <li class="media fp_chat_user" data-name="{{ $chatUser->name }}" data-user="{{ $chatUser->id }}" style="cursor:pointer;">
                                                <img alt="image" class="mr-3 " src="{{ asset($chatUser->avatar) }}"
                                                   style="border-radius: 50%;
                                                            width: 55px;
                                                            height: 55px;
                                                            object-fit: cover;">
                                                    <div class="media-body">
                                                        <div class="mt-0 mb-1 font-weight-bold">{{ $chatUser->name }}</div>
                                                        <div class="text-warning text-small font-600-bold got_new_message">
                                                            </div>
                                                    </div>
                                                </li>                    
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-9">
                                <div class="card chat-box" id="mychatbox" data-inbox="" style="height: 70vh;">
                                <div class="card-header">
                                    <h4 id="chat_header"></h4>
                                </div>
                                <div class="card-body chat-content">
                                                                      
                                </div>
                                <div class="card-footer chat-form">
                                    <form id="chat-form">
                                        @csrf
                                        <input type="text" class="form-control fp_send_message" placeholder="Type a message" name="message">
                                        <input type="hidden" class="form-control" name="receiver_id" id="receiver_id" value="">
                                        <button class="btn btn-primary">
                                            <i class="far fa-paper-plane"></i>
                                        </button>
                                    </form>
                                </div>
                                </div>
                            </div>
                           
                            </div>
                        </div>
                        </section>
                  

@endsection

@push('scripts')
<script>
    $(document).ready(function(){

        var userId = "{{ auth()->user()->id }}"

        $('#receiver_id').val("")

        function scrollToBottom(){
            let chatContent = $('.chat-content');
            chatContent.scrollTop(chatContent.prop("scrollHeight"));
        }

        //Fetch conversation
        $('.fp_chat_user').on('click', function(){

            let senderId = $(this).data('user');
            let senderName = $(this).data('name');

            $('#mychatbox').attr('data-inbox',senderId)
            $('#receiver_id').val(senderId)

            $.ajax({
                method: 'GET',
                url: '{{ route("admin.chat.get-conversation", ":senderId") }}'.replace(":senderId",senderId),
                beforeSend: function(){
                    $('#chat_header').text(senderName);
                },
                success:function(response){
                    $('.chat-content').empty()
                    $.each(response, function(index, message){
                        let avatar = "{{ asset(':avatar') }}".replace(':avatar', message.sender.avatar);
                        $html = `
                        <div class="chat-item ${message.sender_id == userId ? "chat-right" : "chat-left"}" "><img style="width:50px; aspect-ratio:1/1; object-fit:cover;" src="${avatar}">
                            <div class="chat-details">
                                <div class="chat-text">${message.message}</div>                               
                            </div>
                        </div>`
                        $('.chat-content').append($html)
                    })
                    scrollToBottom()
                },
                error:function(xhr,status,error){

                }
            })
        })//end function

        //Send Message
        $('#chat-form').on('submit', function(e){
            e.preventDefault();
            let formData = $(this).serialize();
               $.ajax({
                method: 'POST',
                url: "{{ route('admin.chat.send-message') }}",
                data: formData,
                beforeSend:function(){
                let message = $('.fp_send_message').val()
               
                let html = `
                    <div class="chat-item chat-right" style=""><img style="width:50px; aspect-ratio:1/1; object-fit:cover;"
                     src="{{ asset(auth()->user()->avatar) }}">
                        <div class="chat-details">
                            <div class="chat-text">${message}</div>
                            <div class="chat-time">Sending...</div>
                        </div>
                    </div>`
                $('.chat-content').append(html)
                $('.fp_send_message').val("")
                scrollToBottom()
                },
                success: function(response){

                },
                error: function(xhr, status ,error){                    
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key,value){
                        toastr.error(value);
                    })
                }
               })
        })//end function
    })
</script>
@endpush
