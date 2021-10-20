<div id="feed-comment">
  <div class="groups-container">
      <div class="card-header">
          <h4 class="k-h4">{{trans('message.chronology')}}</h4>
      </div>

      <div class="card-inner-continer">
          <div class="post-wrapper card card-border new-post-widget">
              <div class="post-comments">
                  <div class="post-comment comment">
                      <div class="avatar">
                          <a href="#">
                              <img class="responsive-img userProfilePhoto circle" src="{{$user->avatar}}" alt="">
                          </a>
                      </div>
                      <div class="comment-input">
                          <form id="form_new_post" name="form_new_post"
                              wtx-context="574EA22B-0BB2-43E3-82FC-88B7881722BC"
                              enctype="multipart/form-data">
                              @csrf

                              <div class="comment-input">
                                <div class="input-field">
                                  <div class="snow-container mt-1">
                                    <div class="compose-editor">
                                    </div>
                                    <div class="compose-quill-toolbar">
                                      <span class="ql-formats mr-0">
                                          <button class="ql-bold"></button>
                                          <button class="ql-italic"></button>
                                          <button class="ql-underline"></button>
                                          <div class="post-files">
                                              <div class="file-field">
                                                  <div class="btn">
                                                      <svg viewBox="0 0 18 18"> <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect> <circle class="ql-fill" cx="6" cy="7" r="1"></circle> <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline> </svg>
                                                      <input type="file" name="image" accept="image/*">
                                                  </div>
                                                  <div class="file-path-wrapper">
                                                      <input class="file-path validate" type="text" value="{{trans('message.photo')}}">
                                                  </div>
                                              </div>
                                              <div class="file-field">
                                                  <div class="btn">
                                                      <svg viewbox="0 0 18 18">
                                                        <rect class="ql-stroke" height="12" width="12" x="3" y="3"></rect>
                                                        <rect class="ql-fill" height="12" width="1" x="5" y="3"></rect>
                                                        <rect class="ql-fill" height="12" width="1" x="12" y="3"></rect>
                                                        <rect class="ql-fill" height="2" width="8" x="5" y="8"></rect>
                                                        <rect class="ql-fill" height="1" width="3" x="3" y="5"></rect>
                                                        <rect class="ql-fill" height="1" width="3" x="3" y="7"></rect>
                                                        <rect class="ql-fill" height="1" width="3" x="3" y="10"></rect>
                                                        <rect class="ql-fill" height="1" width="3" x="3" y="12"></rect>
                                                        <rect class="ql-fill" height="1" width="3" x="12" y="5"></rect>
                                                        <rect class="ql-fill" height="1" width="3" x="12" y="7"></rect>
                                                        <rect class="ql-fill" height="1" width="3" x="12" y="10"></rect>
                                                        <rect class="ql-fill" height="1" width="3" x="12" y="12"></rect>
                                                      </svg>
                                                      <input type="file" name="video" accept="video/*">
                                                  </div>
                                                  <div class="file-path-wrapper">
                                                      <input class="file-path validate" type="text" value="Video">
                                                  </div>
                                              </div>
                                              <div class="file-field">
                                                  <div class="btn">
                                                      <svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line> <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path> <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path> </svg>
                                                      <input type="file" name="files"
                                                      accept=".doc, .docx, .pdf, .xlsx, .xls, .csv">
                                                  </div>
                                                  <div class="file-path-wrapper">
                                                      <input class="file-path validate" type="text" value="{{trans('message.file')}}">
                                                  </div>
                                              </div>
                                               <a href="#" class="add-post btnPost">
                                                  <img src="{{ asset('img/send.png')}}" alt="">
                                              </a>
                                          </div>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <textarea class="comment-container hidden commentPostContainer" id="post_new" name="content"
                              placeholder="{{trans('message.added_a_new_post')}}">
                              </textarea>
                              <span class="error" id="content_error">
                              </span>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <div id="feed" class="postFeed postResult newsFeedResult">
              @include("profile.filter",['posts' => $posts])
          </div>
      </div>
  </div>
</div>
