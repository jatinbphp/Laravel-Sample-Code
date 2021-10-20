<div id="feed-comment">
  <div class="groups-container">
      <div class="card-header">
          <h4 class="k-h4">{{trans('message.reports')}}</h4>
      </div>

      <div class="card-inner-continer">
          <div id="feed" class="adminReport newsFeedResult adminReportResult">
              @include("admin.report.filter",['finalData' => $finalData])
          </div>
      </div>
  </div>
</div>
