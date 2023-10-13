<button data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_chat" class="btn btn-sm bg-body btn-color-gray-700 btn-active-primary shadow-sm position-fixed px-5 fw-bolder zindex-2 top-50 mt-10 end-0 transform-90 " data-bs-placement="right" data-bs-trigger="hover">
    <span id="kt_drawer_chat_label">Group Chat <span class="notification_count badge rounded-pill badge-success ms-2">include everyone</span></span>
</button>
<div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
    <div class="card w-100 rounded-0" id="kt_drawer_chat_messenger">
        <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
            <div class="card-title">
                <div class="d-flex justify-content-center flex-column me-3">
                    <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1"><?php echo $_SESSION['admin_name']; ?></a>
                    <div class="mb-0 lh-1">
                        <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                        <span class="fs-7 fw-bold text-muted">Active</span>
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        <div class="card-body" id="kt_drawer_chat_messenger_body">
            <div id="chat-window" class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer" data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
            </div>
        </div>
        <div class="card-footer px-1 py-1" id="kt_drawer_chat_messenger_footer">
            <div class="input-group d-flex flex-stack">
                <input type="search" id="message-input" maxlength="40" class="form-control form-control-flush" placeholder="Type a message" style="border: 0 !important" autofocus>
            </div>
        </div>
    </div>
</div>
<script>
      $(document).ready(function() {
        scrolltobottom();
        fetchMessages();
        setInterval(fetchMessages, 1500);

        $('#message-input').keypress(function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                sendMessage();
            }
        });

        function sendMessage() {
            var message = $('#message-input').val();
            $.post('save_message.php', {
                message: message
            }, function(response) {
                $('#message-input').val('');
                fetchMessages();
                scrolltobottom();
            });
        }

        function fetchMessages() {
            $.get('fetch_messages.php', function(response) {
                $('#chat-window').html(response);
                scrolltobottom();
            });
        }

        function scrolltobottom() {
            var divElement = document.getElementById("chat-window");
            divElement.scrollTo({
                top: divElement.scrollHeight,
                behavior: "smooth"
            });
        }
    });
</script>