 <div class="row">

 <div class="input-group k-input-text col s4">
<input type="text" id="callDate" class="futureDatePicker k-txt-box" value="" />
</div>
</div>
<div id="show_models">
	<!-- Content Area Starts -->
	<div class="content-area content-right">
	    <div class="app-wrapper">
	        <div class="datatable-search">
	            <i class="material-icons mr-2 search-icon">search</i>
	            <input type="text" placeholder="{{trans('message.look_for_a_model')}}" class="app-filter" id="global_progra_filter">
	        </div>
	        <div id="button-trigger" class="card card card-default scrollspy border-radius-6 fixed-width">
	            <div class="card-content p-0">
	                <table id="data-table-contact" class="display" style="width:100%">
	                    <thead>
	                        <tr>
	                            <th>{{trans('message.name')}}</th>
	                            <th>{{trans('message.tour')}}</th>
	                            <th>{{trans('message.data')}}</th>
	                            <th>{{trans('message.camera')}}</th>
	                            <th>{{trans('message.add_receipts')}}</th>
	                            <th>{{trans('message.status')}}</th>
	                            <th>{{trans('message.associate_trainer')}}</th>
	                        </tr>
	                    </thead>
	                    <tbody id="programsModelFilter">
	                        @include("models_tour.filter",['programs' => $programs])
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Content Area Ends -->
</div>

<div id="show-model-modal" class="modalx bottom-sheet hidden  modal-custom">
	<div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.add_payment_request')}}</h4>
        <div class="buttons-group">
            <a href="#" class="" id="close-show-model-modal"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">
        <p id="show_manager_model_list">

        </p>
    </div>

</div>
<div id="model-modal" class=" modalx bottom-sheet hidden  modal-custom">
	<div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.add_payment_request')}}</h4>
        <div class="buttons-group">
            <a href="#" class="" id="close-model-modal"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">
        <div id="show_trainers">
        </div>
    </div>
    <div class="modalx-footer">
        <a class="action-btn  btn k-button-fill" id="close-model-modal">Close</a>
    </div>
</div>
