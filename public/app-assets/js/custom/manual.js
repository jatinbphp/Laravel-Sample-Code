$(document).ready(function() {
    // listeaza manuale pe roluri cu permisiuni
    $('body').on('change', '#role', function(e) {
        let url = $("#role option:selected").val();
        $('#role_id').val($("#role option:selected").data('id'));
        $.ajax({
            url: url,
            success: function(response, status, xhr) {
                $('.roles').html('');
                new Tree('.roles', {
                    data: response,
                    loaded: function() {
                        let values = [];
                        $.each(response, function(i, v) {
                            if (v.check) {
                                values.push(v.id);
                            }
                            if (v.hasOwnProperty('children')) {
                                $.each(v.children, function(i2, v2) {
                                    if (v2.check) {
                                        values.push(v2.id);
                                    }
                                });
                            }
                        });
                        this.values = values;
                    },
                    onChange: function() {
                        $.ajax({
                            url: $('#allowChapters').data('url'),
                            data: {
                                role: $('#role_id').val(),
                                manuals: this.values
                            },
                            type: 'post',
                            beforeSend: function() {
                                myShow();
                            },
                            complete: function() {
                                myHide();
                            },
                            success: function(response, status, xhr) {}
                        });
                    }
                });
            }
        });
    });
    // afisaza formular gol de adaugare
    $('body').on('click', '.btn-add-manual', function(e) {
        e.preventDefault();
        $('#addManualContainer').show();
        $('#addManualContainer').find("#current_id").val('');
        $('#addManualContainer').find("#title").val('');
    });
    // afisaza formular precompletat de adaugare
    $('body').on('click', '.btn-edit-manual', function(e) {
        e.preventDefault();
        $('#addManualContainer').show();
        $('#addManualContainer').find("#current_id").val($(this).data('id'));
        $('#addManualContainer').find("#title").val($(this).data('title'));
    });
    // adauga/editeaza manual
    $('body').on('click', '.btn-save-manual', function(e) {
        e.preventDefault();
        let form = $('#addManualForm'),
            formData = form.serialize(),
            url = $('#addManualForm').attr('action');
        $.ajax({
            url: url,
            type: 'post',
            data: formData,
            beforeSend: function() {
                myShow();
            },
            complete: function() {
                myHide();
            },
            success: function(response, status, xhr) {
                swal({
                    title: response.message,
                    icon: 'success'
                }).then(function() {
                    location.reload();
                });
            },
            error: function(xhr, statusText, errorThrown) {
                swal({
                    title: xhr.responseJSON.message,
                    icon: 'error'
                });
                console.log('error', xhr);
            }
        });
    });
    // update lista cuprins la schimbare manualului
    $('body').on('change', '#changeManual', function(e) {
        e.preventDefault();
        let url = $("#changeManual option:selected").val();
        $.ajax({
            url: url,
            beforeSend: function() {
                myShow();
            },
            complete: function() {
                myHide();
            },
            success: function(response, status, xhr) {
                $('.cuprinsContainer').html(response.view);
            },
            error: function(xhr, statusText, errorThrown) {
                swal({
                    title: "Eroare",
                    icon: 'error'
                });
                console.log('error', xhr);
            }
        });
    });
    // afiseaza continut subcapitol pentru citire
    $('body').on('click', '.btn-get-subchapter', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        $.ajax({
            url: url,
            beforeSend: function() {
                myShow();
            },
            complete: function() {
                myHide();
            },
            success: function(response, status, xhr) {
                $('.licenses .card-content').html(response.view);
            },
            error: function(xhr, statusText, errorThrown) {
                swal({
                    title: xhr.responseJSON.message,
                    icon: 'error'
                });
                console.log('error', xhr);
            }
        });
    });
    if ($('#editorText').length) {
        tinymce.init({
            selector: '#editorText',
            min_height: 350,
        });
    }
    // sterge capitol/subcapitol
    $('body').on('click', '.btn-delete-chapter', function(e) {
        e.preventDefault();
        let type = $(this).data('type'),
            url = $(this).attr('href'),
            msg = "Esti sigur ca vrei sa stergi acest subcapitol?";
        if (type === 'capitol') {
            msg = 'Prin stergerea capitolului, subcapitolele acestuia vor deveni capitole (le poti rearanja dupa)!'
        }
        swal({
            title: "Sterge " + type,
            text: msg,
            icon: 'warning',
            dangerMode: true,
            buttons: {
                cancel: 'Nu',
                delete: 'Da, sterge'
            }
        }).then(function(willDelete) {
            if (willDelete) {
                $.ajax({
                    url: url,
                    beforeSend: function() {
                        myShow();
                    },
                    complete: function() {
                        myHide();
                    },
                    success: function(responseData, status, xhr) {
                        swal({
                            title: type + "ul a fost sters cu succes",
                            icon: 'success'
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(xhr, statusText, errorThrown) {
                        swal({
                            title: xhr.responseJSON.message,
                            icon: 'error'
                        });
                        console.log('error', xhr);
                    }
                });
            }
        });
    });
    // stergere manual
    $('body').on('click', '.btn-delete-manual', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        swal({
            title: "Sterge manual",
            text: 'Esti sigur ca vrei sa stergi acest manual? Toata capitolele si subcaptitolele vor fi sterse!',
            icon: 'warning',
            dangerMode: true,
            buttons: {
                cancel: 'Nu',
                delete: 'Da, sterge'
            }
        }).then(function(yes) {
            if (yes) {
                $.ajax({
                    url: url,
                    beforeSend: function() {
                        myShow();
                    },
                    complete: function() {
                        myHide();
                    },
                    success: function(responseData, status, xhr) {
                        swal({
                            title: responseData.message,
                            icon: 'success'
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(xhr, statusText, errorThrown) {
                        swal({
                            title: xhr.responseJSON.message,
                            icon: 'error'
                        });
                        console.log('error', xhr);
                    }
                });
            }
        });
    });
    // deschide modal de adaugare sau editare chapter/subchapter
    $('body').on('click', '.open-addChapter', function(e) {
        e.preventDefault();
        $('#addChapterForm')[0].reset();
        $('#addChapter').modal('open');
        let self = $(this),
            modal = $('#addChapter');
        modal.find('h5').html(self.data('h'));
        if (self.data('type') === 'capitol') {
            $('#snow-container').hide();
            $('#manual_id').val(self.data('id'));
        } else {
            $('#snow-container').show();
            $('#parent_id').val(self.data('id'));
        }
        if (self.data('action') === 'edit') {
            let url = $(this).attr('href');
            $.ajax({
                url: url,
                beforeSend: function() {
                    myShow();
                },
                complete: function() {
                    myHide();
                },
                success: function(manual, status, xhr) {
                    modal.find('#chapter_id').val(manual.id);
                    modal.find('#chapter_title').val(manual.title);
                    if (!manual.text) {
                        console.log(1);
                        modal.find('#textValue').html('');
                        tinyMCE.get('editorText').setContent('')
                    } else {
                        console.log(2);
                        modal.find('#textValue').html(manual.text);
                        tinyMCE.get('editorText').setContent(manual.text)
                    }
                    if (manual.parent_id !== null) {
                        $("#parent_id").val(manual.parent_id);
                        $('#manual_id').val('');
                    } else {
                        $("#parent_id").val('');
                        $("#manual_id").val(manual.manual_id);
                    }
                },
                error: function(xhr, statusText, errorThrown) {
                    swal({
                        title: xhr.responseJSON.message,
                        icon: 'error'
                    });
                    console.log('error', xhr);
                }
            });
        }
    });
    // savelaza capitol/subcapitol
    $('body').on('click', '.btn-add-chapter', function(e) {
        e.preventDefault();
        let form = $('#addChapterForm');
        $('#textValue').val(tinyMCE.get('editorText').getContent());
        let formData = form.serialize();
        if (!form.find('#chapter_title').val().length) {
            swal({
                title: 'Titlul capitolului/subcapitolului este obligatoriu!',
                icon: 'error'
            });
        } else {
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                beforeSend: function() {
                    myShow();
                },
                complete: function() {
                    myHide();
                },
                data: formData,
                success: function(responseData, status, xhr) {
                    swal({
                        title: 'Succes!',
                        icon: 'success'
                    }).then(function(ok) {
                        location.reload();
                    });
                },
                error: function(xhr, statusText, errorThrown) {
                    swal({
                        title: xhr.responseJSON.message,
                        icon: 'error'
                    });
                }
            });
        }
    });
    $('#nestable3').nestable({
        group: 1,
        maxDepth: 3
    }).on('change', function(e) {
        let list = e.length ? e : $(e.target),
            value = list.nestable('serialize'),
            url = $('#arangeChapters').data('url');
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                data: value
            },
            beforeSend: function() {
                myShow();
            },
            complete: function() {
                myHide();
            },
            success: function(responseData, status, xhr) {
                console.log(responseData, status, xhr);
            }
        });
    });
    $('.modal').modal();
});