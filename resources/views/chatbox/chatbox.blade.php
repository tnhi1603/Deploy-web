<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="{{asset('css/chatbox.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
            <button class="chatbot-toggler" style="z-index: 1;">
                <img src="https://d3tnn7lar6ozas.cloudfront.net/48f101c0-0f8c-401a-93a8-e1a3e477fa57.svg">
            </button>
            <div class="chatbot">
                <header>
                  <div class="child-flex">
                    <img class="img" src="https://d3tnn7lar6ozas.cloudfront.net/bb5088fa-4a6f-4af2-b43e-259e0db1086c.svg">
                    <p class="text">Cartier Virtual Concierge</p>
                  </div>
                  <div><span class="close-btn material-symbols-outlined">&#215;</span></div>
                </header>
                <ul class="chatbox">
                  <li class="chat incoming">
                    <span class="material-symbols-outlined"></span>
                    <p><strong>By continuing with and using this chatbot, you agree that the chat may be recorded and saved. For information about our privacy practices, please see our <a style="text-decoration: underline; color: blue;" href="">Privacy Policy</a></strong><br>Hello, I am your Cartier Virtual Concierge. How may I help you today? </p>
                  </li>
                  <li class="suggest">
                    Request a boutique appointment
                  </li>
                  <li class="suggest">
                    Request a boutique appointment
                  </li>
                </ul>
                <div class="chat-input">
                  <textarea placeholder="Type here" spellcheck="false" required></textarea>
                </div>
            </div>
        
</body>
    <script src="{{asset('js/chatbox.js')}}"></script>
</html>