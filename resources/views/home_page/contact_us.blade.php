@extent('latest_home_page_master')
@section('home_page_main_content')
<div class="col-md-9">
<div class='main-content'>
    <marquee>
      <p class="group-info-wc">
        <span>"SSC 2001 and HSC 2003 Bangladesh" গ্রুপে স্বাগতম।</span>
        <span>  This site is still under development.</span></p>
    </marquee>
  <div class='main-content-wrap'>
    <h1 class="content-header">Contact Us:</h1>

        <h4 style="text-align: center; color: green;">
          <?php
            $contact_us_message_info = Session::get('contact_us_message_info');
            if($contact_us_message_info){
              echo $contact_us_message_info;
              Session::put('contact_us_message_info','');
            }
          ?>
        </h4>
        <div id="contact-area" class="col-md-6 col-md-offset-2">
          <form method="post" action="{{URL::to('/save-contact-us-info')}}">
            {{csrf_field()}}
            <label for="Name">Name:</label>
            <input type="text" name="Name" id="Name" class="form-control" required="" />           
      
            <label for="Email">Email:</label>
            <input type="email" name="Email" id="Email" class="form-control" required="" />
            
            <label for="Message">Message:</label><br />
            <textarea name="Message" rows="5" cols="4" id="Message" class="form-control" required=""></textarea>
            <br>
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
          </form>
          <br>
        
        <div style="clear: both;"></div>
      
      </div>
  </div>
</div><!-- main-content -->
</div>
@endsection