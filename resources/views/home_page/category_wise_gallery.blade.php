@extent('home_page_master')
@section('home_page_main_content')
<div class="col-md-9">
                  <div class='main-content'>
                    <div class='main-content-wrap'>
                      <h1 class="content-header">Gallery</h1>

                     <!--  Gallery isotope start -->

                        <section id="works" class="section">
                          <div class="mtcon">       
                            <div class="section-container">

                              <!-- Portfolio -->
                              <div class="row">
                                <!-- #options -->
                                        <div id="options" class="clearfix">
                                            <ul>
                                              <li><a href="{{URL::to('/gallery')}}" data-option-value=".webdesign" class="selected">All</a></li>
                                             <?php
                                                foreach ($all_category_info as $v_category) {
                                                 $id = Crypt::encrypt($v_category->category_id);
                                              ?>
                                                <li><a href="{{URL::to('/gallery/'.$id)}}" data-option-value="*" class="selected">{{$v_category->category_name}}</a></li>
                                                <!-- <li><a href="#filter" data-option-value=".webdesign">Iftar Mahfil</a></li>
                                                <li><a href="#filter" data-option-value=".uidesign">Event2 iftar party</a></li>
                                                <li><a href="#filter" data-option-value=".branding">Event3</a></li> -->
                                                <?php
                                                  }
                                                ?>
                                            </ul>
                                        </div> 
                                        <!-- #options end-->


                              <!-- heading -->
                              <div class="row clearfix">
                                <h2 class="mtcon-title">Works</h2>
                                <div class="short-dec">
                                  <p>The Sky People have sent us a message... that they can take whatever they want. That no one can stop them. Well, we will send them a messa that they can take whatever they want. That no one can stop them. Well, we w! </p>
                                </div>
                              </div>  
                              <!-- /heading -->

                                <!-- portfolio items -->  
                                <div id="portfolio" class="clearfix"> 
                                 <?php
                                    foreach ($category_wise_gallery as $v_image) {
                                     $image_path = 'gallery_images/'.$v_image->file_name;
                                 ?>
                                  <div class="block webdesign">
                                    <div class="view view-first">
                                      <div class="tringle"></div>
                                      <img class="img-responsive" src="{{asset($image_path)}}" alt="" style="height: 50%;width: 100%">
                                      <a href="{{asset($image_path)}}" class="mask">
                                      </a>
                                    </div>
                                    <div class="des">
                                      <?php
                                          if($v_image->image_title){
                                        ?>
                                        <h5>{{$v_image->image_title}}</h5>
                                        <?php
                                          }else{
                                        ?>
                                        <h5>&nbsp;</h5>
                                        <?php
                                          }
                                        ?>
                                      <!-- <p>Lorem Ipsum is simply dummy text of threm Ipsum is simply dummy tex.</p> -->
                                    </div>
                                  </div>
                                  <?php
                                    }
                                  ?>
                                  
                                  

                                </div>
                                <!-- /portfolio items end-->
                              </div>
                              <!-- /Portfolio end -->
                              
                            </div>
                          </div>
                        </section>

                    <!--  Gallery isotope end -->

                    </div>
                  </div>
                </div><!-- main-content -->
@endsection