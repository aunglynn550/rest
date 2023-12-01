function scrollToBottom(){
    let chatContent = $('.chat-content');
    chatContent.scrollTop(chatContent.prop("scrollHeight"));
}

window.Echo.private('chat.'+loggedInUserId)
.listen('ChatEvent', (e)=>{
     
    let  html = `
      <div class="chat-item chat-left" style=""><img src="${e.avatar}">
          <div class="chat-details">
              <div class="chat-text">${e.message}</div>
              <div class="chat-time">Sending...</div>
          </div>
      </div>`
  $('.chat-content').append(html)
  scrollToBottom();
    });