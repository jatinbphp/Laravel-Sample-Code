@extends('layouts.app')

@section('content')

<!-- BEGIN: Page Main-->
<div class="row">
	<div class="col s12">
	  <div class="container">
	    <!-- Basic Kanban App -->
	    <section id="kanban-wrapper" class="section ">
	      <div class="kanban-overlay"></div>
	      <div class="row">
	        <div class="col s12">
	          <div id="kanban-app" class="card-panel border-radius-6 card-inner-continer mt-0">

	          </div>
	        </div>
	      </div>
	      <!-- User new mail right area -->
	      <div class="kanban-sidebar">

	      </div>
	    </section>
	  </div>
	</div>
</div>
<!-- END: Page Main-->

@endsection

@push('js')
<script src="{{ asset('app-assets/vendors/jkanban/jkanban.min.js')}}"></script>
<script type="text/javascript" src="{{asset('app-assets/js/scripts/todo.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    kanbanLoad();
	});
	$(window).on('resize', function() {
	    // sidebar display none on screen resize
	    $(".kanban-sidebar").removeClass("show");
	    $(".kanban-overlay").removeClass("show");
	});

	function kanbanLoad() {
	    var kanban_curr_el, kanban_curr_item_id, kanban_item_title, kanban_data, kanban_item, kanban_users = null;
	    var kanban_board_data = [
	        @foreach(getAdminTask() as $roleId => $roles) {
	            id: "{{$roles['id']}}",
	            title: "{{$roles['title']}}",
	            headerBg: "{{$roles['headerBg']}}",
	            item: [
	                @foreach(getTaskByRole($roles['id']) as $taskId => $task) {
	                    id: "{{$task['id']}}",
	                    title: "{{$task['title']}}",
	                    border: "{{$task['border']}}",
	                    dueDate: "{{$task['dueDate']}}",
	                    @if(isset($task['name']) && $task['name'] != '')
	                    user_name: "{{$task['name']}}",
	                    @endif
	                    @if(isset($task['avatar']) && $task['avatar'] != '')
	                    avatar: ["{{$task['avatar']}}"]
	                    @endif
	                },
	                @endforeach
	            ]
	        },
	        @endforeach
	    ];
	    // Kanban Board
	    var KanbanExample = new jKanban({
	        element: "#kanban-app", // selector of the kanban container
	        buttonContent: "Add Task", // text or html content of the board button
	        widthBoard: '300px',
	        // click on current kanban-item
	        click: function(el) {
	            // kanban-overlay and sidebar display block on click of kanban-item
	            kanban_curr_item_id = $(el).attr("data-eid");
	            $.ajax({
	                url: public_path + "admin/task/edit/" + kanban_curr_item_id,
	                type: 'post',
	                dataType: 'json',
	                headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
	                beforeSend: function() {
	                    myShow();
	                },
	                complete: function() {
	                    myHide();
	                },
	                success: function(response) {
	                    if (response.success) {
	                        $(".kanban-overlay").addClass("show");
	                        $(".kanban-sidebar").html(response.html).addClass("show");
	                        get_date_picker();
	                    }
	                },
	            });
	        },
	        dragEl: function(el, boardId) {},
	        dragendEl: function(el) {
	            var id = $(el).attr("data-eid");
	            var role_id = $(el).parents(".kanban-board").data("id");
	            jQuery.ajax({
	                url: public_path + "admin/task/change/" + id,
	                type: 'post',
	                dataType: 'json',
	                data: {
	                    group_id: role_id
	                },
	                headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
	                beforeSend: function() {
	                    myShow();
	                },
	                complete: function() {
	                    myHide();
	                },
	                success: function(response) {
	                    if (response.success) {
	                        M.toast({
	                            html: response.message
	                        });
	                    }
	                },
	            });
	        },
	        buttonClick: function(el, boardId) {
	            // create a form to add add new element
	            var formItem = document.createElement("form");
	            formItem.setAttribute("class", "itemform");
	            $.ajax({
	                url: public_path + "admin/task/data",
	                type: 'post',
	                dataType: 'json',
	                headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
	                beforeSend: function() {
	                    myShow();
	                },
	                complete: function() {
	                    myHide();
	                },
	                success: function(response) {
	                    if (response.success) {
	                        formItem.innerHTML = response.html;
	                        get_date_picker();
	                    }
	                },
	            });
	            // add new item on submit click
	            KanbanExample.addForm(boardId, formItem);
	            formItem.addEventListener("submit", function(e) {
	                e.preventDefault();
	                var text = e.target[0].value;
	                var data = "group_id=" + boardId + "&title=" + text;
	                $.ajax({
	                    url: public_path + "admin/task/save",
	                    type: 'post',
	                    dataType: 'json',
	                    data: data,
	                    headers: {
	                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                    },
	                    beforeSend: function() {
	                        myShow();
	                    },
	                    complete: function() {
	                        myHide();
	                    },
	                    success: function(response) {
	                        if (response.success) {
	                            KanbanExample.addElement(boardId, {
	                                title: text,
	                                id: response.eid
	                            });
	                            formItem.parentNode.removeChild(formItem);
	                        }
	                    },
	                });
	            });
	            $(document).on("click", "#CancelBtn", function() {
	                $(this).closest(formItem).remove();
	            })
	        },
	        addItemButton: true, // add a button to board for easy item creation
	        boards: kanban_board_data // data passed from defined variable
	    });
	    // Add html for Custom Data-attribute to Kanban item
	    var board_item_id, board_item_el;
	    // Kanban board loop
	    for (kanban_data in kanban_board_data) {
	        // Kanban board items loop
	        for (kanban_item in kanban_board_data[kanban_data].item) {
	            var board_item_details = kanban_board_data[kanban_data].item[kanban_item]; // set item details
	            board_item_id = $(board_item_details).attr("id"); // set 'id' attribute of kanban-item
	            (board_item_el = KanbanExample.findElement(board_item_id)), // find element of kanban-item by ID
	            (board_item_users = board_item_dueDate = board_item_comment = board_item_attachment = board_item_image = board_item_badge = " ");
	            // check if users are defined or not and loop it for getting value from user's array
	            if (typeof $(board_item_el).attr("data-avatar") !== "undefined") {
	                for (kanban_users in kanban_board_data[kanban_data].item[kanban_item].avatar) {
	                    board_item_users += '<img class="circle" src=" ' + kanban_board_data[kanban_data].item[kanban_item].avatar[kanban_users] + '" alt="Avatar" height="30" width="30">';
	                }
	            }
	            // check if dueDate is defined or not
	            if (typeof $(board_item_el).attr("data-dueDate") !== "undefined") {
	                board_item_dueDate = '<div class="kanban-due-date center mb-5 lighten-5 ' + $(board_item_el).attr("data-border") + '"><span class="' + $(board_item_el).attr("data-border") + '-text center"> ' + $(board_item_el).attr("data-dueDate") + "</span>" + "</div>";
	            }
	            // check if comment is defined or not
	            if (typeof $(board_item_el).attr("data-user_name") !== "undefined") {
	                board_item_comment = '<div class="kanban-comment display-flex">' + '<i class="material-icons">account_circle </i>' + '<span class="font-size-small">' + $(board_item_el).attr("data-user_name") + "</span>" + "</div>";
	            }
	            // add custom 'kanban-footer'
	            if (typeof($(board_item_el).attr("data-dueDate") || $(board_item_el).attr("data-user_name") || $(board_item_el).attr("data-avatar")) !== "undefined") {
	                $(board_item_el).append('<div class="kanban-footer mt-3">' + board_item_dueDate + '<div class="kanban-footer-left left display-flex pt-1">' + board_item_comment + "</div>" + '<div class="kanban-footer-right right">' + '<div class="kanban-users">' + board_item_users + "</div>" + "</div>" + "</div>");
	            }
	        }
	    }
	    kanban_board_data.map(function(obj) {
	        $(".kanban-board[data-id='" + obj.id + "']").find(".kanban-board-header").addClass(obj.headerBg)
	    });
	    $(".kanban-sidebar .delete-kanban-item, .kanban-sidebar .close-icon, .kanban-sidebar .update-kanban-item, .kanban-overlay").on("click", function() {
	        $(".kanban-overlay").removeClass("show");
	        $(".kanban-sidebar").removeClass("show");
	    });
	    $(document).on("click", ".delete-kanban-item", function() {
	        $delete_item = kanban_curr_item_id;
	        // console.log($delete_item);
	        addEventListener("click", function() {
	            KanbanExample.removeElement($delete_item);
	        });
	    });
	    // Making Title of Board editable
	    // ------------------------------
	    $(document).on("mouseenter", ".kanban-title-board", function() {
	        $(this).attr("contenteditable", "true");
	        $(this).addClass("line-ellipsis");
	    });
	    // Perfect Scrollbar - card-content on kanban-sidebar
	    if ($(".kanban-sidebar").length > 0) {
	        var ps_sidebar = new PerfectScrollbar(".kanban-sidebar", {
	            theme: "dark",
	            wheelPropagation: false
	        });
	    }
	    // set unique id on all dropdown trigger
	    for (var i = 1; i <= $(".kanban-board").length; i++) {
	        $(".kanban-board[data-id='" + i + "']").find(".kanban-board-header .dropdown-trigger").attr("data-target", i);
	        $(".kanban-board[data-id='" + i + "']").find("ul").attr("id", i);
	    }
	    // materialise dropdown initialize
	    $('.dropdown-trigger').dropdown({
	        constrainWidth: false
	    });
	    // Kanban Quill Editor
	    // -------------------
	    var composeMailEditor = new Quill(".snow-container .compose-editor", {
	        modules: {
	            toolbar: ".compose-quill-toolbar"
	        },
	        placeholder: "Write a Comment... ",
	        theme: "snow"
	    });
	}
</script>
@endpush
