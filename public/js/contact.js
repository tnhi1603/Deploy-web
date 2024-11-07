const sendBtn = document.querySelector('.js-send-email');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');

        function showSendEmail() {
            modal.classList.add('open')
        }

        function hideSendEmail() {
            modal.classList.remove('open')
        }


        sendBtn.addEventListener('click', showSendEmail)

        modalClose.addEventListener('click', hideSendEmail)

        modal.addEventListener('click',  hideSendEmail)

        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation()
        })