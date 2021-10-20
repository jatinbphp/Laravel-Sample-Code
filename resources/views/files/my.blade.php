<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
	<div class="card-header">
		<h4 class="k-h4">{{trans('message.my_files')}}</h4>
	</div>
	<div class="row">
        <div class="col s12">
            <div class="container">
                <div class="section app-file-manager-wrapper" id="fileManger" data-url="{{route('file.browse')}}">
                    <!-- File Manager app overlay -->
                    <div class="app-file-overlay"></div>
                    <!-- /File Manager app overlay -->
                    <!-- sidebar left start -->
                    @include('files.leftbar')
                    <!--/ sidebar left end -->
                    <!-- content-right start -->
                    <div class="content-right">
                        <!-- file manager main content start -->
                        <div class="app-file-area">
                            <!-- File App Content Area -->
                            <!-- App File Header Starts -->
                            <div class="app-file-header">
                                <!-- Header search bar starts -->
                                <div class="sidebar-toggle show-on-medium-and-down mr-1 ml-1">
                                    <i class="material-icons">menu</i>
                                </div>
                                <div class="app-file-header-search ">
                                    <div class="input-field k-input-text k-input-text-icon">
                                        <i class="material-icons prefix search-icon">search</i>
                                        <input type="search" id="file-search" placeholder="{{trans('message.search_for_folders_and_files_by_name')}}..." class=" k-txt-box">
                                    </div>
                                </div>
                                <!-- Header search bar Ends -->
                                <!-- Header Icons Starts -->
                                <div class="app-file-header-icons display-flex align-items-center upLvlRoot" title="Reseteaza cautarea">
                                    <div class="fonticon-wrap display-inline">
                                        <i class="material-icons">delete</i>
                                    </div>
                                </div>
                                <!-- Header Icons Ends -->
                            </div>
                            <!-- App File Header Ends -->
                            <!-- App File Content Starts -->
                            <div class="app-file-content" id="fileContainer" style="min-height: 65vh;">
                                {{--files come here--}}
                                <div class="loaderContainer" style="text-align: center; padding-top: 10vh">
                                    <img src="{{asset('img/loader.gif')}}" class="img-fluid" style="max-width: 400px;">
                                </div>
                            </div>
                        </div>
                        <!-- file manager main content end  -->
                    </div>
                    <!-- content-right end -->
                    <!-- App File sidebar - Right section Starts -->
                    <div class="app-file-sidebar-info" style="word-break: break-all" data-download="{{route('file.download')}}">
                        @include('files.rightbar')
                    </div>
                </div>
                <!-- App File sidebar - Right section Ends -->
            </div>
        </div>
        <div class="content-overlay"></div>
    </div>
</div>
