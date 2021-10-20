<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
	<div class="row">
		<div class="col s12">
			<div class="container">
				<section class="tabs-vertical mt-0 section email-section-block">
					<div class="row">
						<div class="col left-content-panel ">
							<!-- tabs  -->

							<div class="card-panel custom-panel">
								<!-- <ul class="email-list display-grid">
									<li class="sidebar-title">
										<i class="material-icons mr-2"> mail_outline </i>
										<span>{{trans('message.folders')}}</span>
									</li>
								</ul> -->
								<div class="composs-btn">
									<button class="k-button-fill k-icon  k-btn-normal composeMail">
										<i class="material-icons mr-2"> send </i>
										Compose
									</a>
								</div>

								<ul class="tabs email-tab">
									<h5>Folders</h5>
									<li class="tab">
										<a href="#inbox" class="active emailTab" data-type='inbox'>
											<span>
											<i class="material-icons mr-2"> mail_outline </i>
											{{trans('message.inbox')}}</span>
											<span class="new badge">4</span>
										</a>
									</li>

									<li class="tab">
										<a href="#sent" class="emailTab" data-type='sent'>
											<span><i class="material-icons mr-2"> send </i>
											{{trans('message.sent')}}</span>
										</a>
									</li>
									<li class="tab">
										<a href="#drafts" class="emailTab" data-type='drafts'>
											<span><i class="material-icons mr-2"> description </i>
											{{trans('message.drafts')}}</span>
										</a>
									</li>
									<li class="tab">
										<a href="#trash" class="emailTab" data-type='trash'>
											<span><i class="material-icons mr-2"> delete </i>
											{{trans('message.trash')}}</span>
										</a>
									</li>
									<li class="indicator" style="left: 0px; right: 0px;"></li>
									<h5>Filters</h5>
									<li class="tab">
										<a href="#starred" class="emailTab" data-type='starred'>
											<span><i class="material-icons mr-2"> star_border </i>
											{{trans('message.starred')}}</span>
										</a>
									</li>
									<li class="tab">
										<a href="#important" class="emailTab" data-type='important'>
											<span><i class="material-icons">chat</i>
											{{trans('message.important')}}</span>
										</a>
									</li>
									<h5>Labels</h5>

								</ul>
							</div>
						</div>
						<div class="col right-content-block p-0">
							<div id="inbox" >
								<div class="content emailHtmlTab p-0">
								</div>
							</div>
							<div id="starred" style="display: none;">
								<div class="content emailHtmlTab">
								</div>
							</div>
							<div id="important" style="display: none;">
								<div class="content emailHtmlTab">
								</div>
							</div>
							<div id="sent" style="display: none;">
								<div class="content emailHtmlTab">
								</div>
							</div>
							<div id="drafts" style="display: none;">
								<div class="content emailHtmlTab">
								</div>
							</div>
							<div id="trash" style="display: none;">
								<div class="content emailHtmlTab">
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
