$(document).ready(function() {

    browse(); // la prima accesare

    $('body').on('click', '.app-file-header-search .prefix', function(e) {
        browse('root', '', $('#file-search').val());
    });

    $('body').on('keypress', '#file-search', function(e) {
        if (e.which === 13) { //Enter key pressed
            browse('root', '', $('#file-search').val());
        }
    });

    $('body').on('click', '.upLvL', function(e) {
        browse($(this).data('location'), $(this).data('name'));
    });

    $('body').on('click', '.upLvlRoot', function(e) {
        $('#file-search').val('');
        browse();
    });

    $('body').on('click', '.addFolder', function(e) {
        $('#addFolderForm').show();
    });

    $('body').on('click', '.addFile', function(e) {
        $('#addFileForm').show();
    });


    $('body').on('click', '.app-file-folder-details', function(e) {

        let name = $(this).data('name'),
            location = $(this).data('location');
        browse(location, name);
    });

    $('body').on('click', '.app-file-action-icons .delete', function(e) {
        e.preventDefault();
        let file = $('.app-file-sidebar-info').find('#infoName').html(),
            type = $('.app-file-sidebar-info').find('#infoType').html(),
            location = $('.app-file-sidebar-info').find('#infoLocation').html(),
            id = $(this).data('id'),
            url = $(this).data('url'),
            confirmMsg = 'Esti sigur ca vrei sa stergi fisierul:' + file + '?';

        if (type === 'Folder') {
            confirmMsg = 'Esti sigur ca vrei sa stergi folderul: ' + file + ' si tot continutul lui?';
        }
        swal({
            title: "Esti sigur?",
            text: confirmMsg,
            icon: 'warning',
            dangerMode: true,
            buttons: {
                cancel: 'Nu',
                delete: 'Da, sterge'
            }
        }).then(function(willDelete) {
            if (willDelete) {
                $.ajax({
                    url: url + '?file=' + file + '&type=' + type + '&location=' + location,
                    success: function(responseData, status, xhr) {
                        $('#' + id).fadeOut();
                        $(".app-file-overlay").removeClass('show');
                        $(".app-file-sidebar-info").removeClass('show');
                        swal({
                            title: type + "ul a fost sters cu succes",
                            icon: 'success'
                        });
                    },
                    error: function(xhr, statusText, errorThrown) {
                        swal({
                            title: xhr.responseJSON.content,
                            icon: 'error'
                        });
                        console.log('error', xhr);
                    }
                });
            }
        });
    });

    $('body').on('click', '#addFolderForm button', function(e) {
        e.preventDefault();

        let form = $('#addFolderForm');

        if (form.find('.name').val() === '') {
            swal({
                title: "Adaugati un nume pentru folder!",
                icon: 'error'
            });
            return;
        }
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(responseData, status, xhr) {
                $('#addFolderForm').hide();
                swal({
                    title: "Folderul a fost adaugat cu succes",
                    icon: 'success'
                });
                browse(responseData.path, responseData.name);
            },
            error: function(xhr, statusText, errorThrown) {
                swal({
                    title: xhr.responseJSON.content,
                    icon: 'error'
                });
            }
        });
    });

});

function browse(location, name, search) {
    let url = $('#fileManger').data('url') + '?';
    if (name) {
        url += '&file=' + name;
    }
    if (location) {
        url += '&location=' + location;
    }
    if (search) {
        url += '&search=' + search;
    }
    $.ajax({
        url: url,
        beforeSend: function() {
            $('.loaderContainer').show();
        },
        success: function(responseData, status, xhr) {
            $('.loaderContainer').hide()
            $('#fileContainer').html(responseData);
        },
    });
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});