function scrollToBottom(){
    let chatContent = $('.fp__chat_body');
    chatContent.scrollTop(chatContent.prop("scrollHeight"));
}
window.Echo.private('chat.'+loggedInUserId)
.listen('ChatEvent', (e)=>{
      console.log(e);
      let html = `<div class="fp__chating">
                        <div class="fp__chating_img">
                            <img src="${e.avatar}" alt="person" style="border-radius: 50%;"
                                class="img-fluid w-100">
                        </div>
                        <div class="fp__chating_text">
                            <p>${e.message}</p>
                            <span></span>
                        </div>
                    </div>`
        $('.fp__chat_body').append(html)
        $('.unseen-message-count').text(1)
        scrollToBottom()
    });