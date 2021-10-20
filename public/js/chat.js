let updateUserInterval = 90000, // 60 secunde
    updateChatInterval = 5000; // 5 secunde
$(document).ready(function() {
    getChat(); // initializeaza chatul
    setInterval(function() {
        getChatUsers(); // update users list
    }, updateUserInterval);
    setInterval(function() {
        updateChatWindows(); //updates chat in all open windows
    }, updateChatInterval);
    // sends message by click
    $('body').on('click', '.upload', function(e) {
        e.preventDefault();
        let textWindow = $(this).closest('.raspuns-chat').find('.file-chat');
        if (textWindow.html() === '') {
            textWindow.html('<input type="file" name="chat_file" class="dropify file_upload" data-default-file="" /><a href="#" class="closeFileUpload"><i class="material-icons">close</i></a>');
            $('.dropify').dropify();
        }
    });
    // cancel file upload
    $('body').on('click', '.closeFileUpload', function(e) {
        e.preventDefault();
        $(this).parent().html('');
    });
    // sends message by click
    $('body').on('click', '.pabs', function(e) {
        e.preventDefault();
        let form = $(this).closest('.chatFrom'),
            textWindow = $(this).closest('.raspuns-chat').find('.mesaje-chat');
        sendMessage(form, textWindow);
    });
    // sends message with ENTER key
    $('body').on('keypress', '.chatFrom .message', function(e) {
        if (e.which === 13) {
            let form = $(e.currentTarget).closest('.chatFrom'),
                textWindow = $(e.currentTarget).closest('.raspuns-chat').find('.mesaje-chat');
            sendMessage(form, textWindow);
        }
    });
    // cauta utilizator
    $('body').on('keyup', '#searchUser', function(e) {
        let search = $(this).val().toLowerCase(),
            users = $('.chat-user');
        $.each(users, function(key, user) {
            let name = $(user).find('p').html().toLowerCase();
            if (name.search(search) !== -1) {
                $(user).fadeIn();
            } else {
                $(user).fadeOut();
            }
        });
    });
    $('body').on('click', '.openChat', function(e) {
        e.preventDefault();
        $('.openChat a').hide();
        $('.openChat').removeClass('pulse');
        $('.persoane-online').toggleClass('open');
        updateChatWindows();
    });
    $('body').on('click', '.closeChatWindow', function(e) {
        e.preventDefault();
        $(this).closest('.chat-deschis').remove();
    });
    $('body').on('click', '.chat-user', function(e) {
        e.preventDefault();
        $(this).find('.pulse').removeClass('pulse');
        openChat($(this).data('user'));
    });
});

function sendMessage(form, textWindow) {
    let receiver = form.find('.receiver_id').val(),
        text = form.find('.text'),
        file = form.parent().parent().find('.file_upload'),
        postData = new FormData();
    postData.append('receiver_id', receiver);
    postData.append('text', text.val());
    if (file.length) {
        postData.append('file', file.get(0).files[0]);
    }
    if (text.length || file.length) {
        $.ajax({
            url: form.data('action'),
            type: 'POST',
            data: postData,
            dataType: 'json',
            mimeType: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
        }).done(function(response) {
            textWindow.html(response.chat);
            text.val('');
            textWindow.animate({
                scrollTop: 2000
            }, 2000);
            textWindow.parent().find('.file-chat').html('');
        });
    }
}

function getChatUsers() {
    let url = $("#astroChat").data('users');
    $.ajax({
        url: url
    }).done(function(response) {
        $("#onlineUsers").html(response.online);
        let userListItem = '';
        if (response.new) {
            $('.openChat a').show();
            $('.openChat').addClass('pulse');
        } else {
            $('.openChat a').hide();
            $('.openChat').removeClass('pulse');
        }
        var user_list = response.users;
        user_list.sort(function(x, y) {
            return (x.online === y.online) ? 0 : x.online ? -1 : 1;
        });
        $.each(user_list, function(key, user) {
            let status = user.online ? 'on' : 'off',
                hasMessagesClass = user.new_messages ? 'pulse' : '';
            userListItem += '<div class="chat-user" data-status="' + status + '" data-user="' + user.id + '"><div class="user-section">' + '<div class="row valign-wrapper">' + '<div class="col s2 media-image online pr-0"><a href="#" class="btn btn-floating ' + hasMessagesClass + '">' +
                // '<img src="' + user.image_avatar + '" alt="" class="circle z-depth-2 responsive-img"></a></div>' +
                '<img src="' + user.avatar + '" alt="" class="circle z-depth-2 responsive-img"></a></div>' + '<div class="col s8">' + '<p class="m-0 blue-grey-text text-darken-4 font-weight-700">' + user.name + '</p></div>' + '<div class="col s2"><span title="' + user.name + ' este ' + status + 'line" class="status ' + status + ' "></span>' + '</div></div></div></div>';
        });
        $('.chat-list').html(userListItem);
    });
}

function getChat() {
    $.ajax({
        url: $('#main').data('chat')
    }).done(function(response) {
        $('#main').append(response.chat);
        getChatUsers();
    });
}

function openChat(id) {
    let url = $("#astroChat").data('window');
    if (!$('#chatWindow_' + id).length) {
        let nextRight = maxWindowAllowed();
        if (!nextRight) {
            $.notify('Nu poti deschide mai multe ferestere. Mai taie din ele da-le dracu..', 'error');
        } else {
            $.ajax({
                url: url + '?id=' + id + '&right=' + nextRight
            }).done(function(response) {
                $('#main').append(response.window);
                $("#chatWindow_" + id).find('.mesaje-chat').animate({
                    scrollTop: 2000
                }, 2000);
            });
        }
    }
}

function updateChatWindows() {
    let windows = $('.chat-deschis');
    $.each(windows, function(key, obj) {
        let url = $(obj).data('update');
        $.ajax({
            url: url
        }).done(function(response) {
            $('.openChat').removeClass('pulse');
            $(obj).find('.mesaje-chat').html(response.chat).animate({
                scrollTop: 2000
            }, 2000);
        });
    });
}

function maxWindowAllowed() {
    let windows = $('.chat-deschis').length + 1, //+1 lista useri
        scr = screen.width - 280,
        windowWidth = (350 + 10), //+10px margin
        maxWindows = Math.trunc(scr / windowWidth);
    if (maxWindows >= windows) {
        return (windowWidth * (windows - 1)) + 280;
    }
    return false;
}