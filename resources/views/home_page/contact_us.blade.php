@extent('home_page_master')
@section('home_page_main_content')
<div class='main-content'>
  <div class='main-content-wrap'>
    <h1 class="content-header">Contact Us:</h1>
        <div id="contact-area">
          <form method="post" action="">
            <label for="Name">Name:</label>
            <input type="text" name="Name" id="Name" />
            
            <label for="Mobile">Mobile:</label>
            <input type="text" name="Mobile" id="Mobile" />
      
            <label for="Email">Email:</label>
            <input type="text" name="Email" id="Email" />
            
            <label for="Message">Message:</label><br />
            <textarea name="Message" rows="20" cols="20" id="Message"></textarea>

            <input type="submit" name="submit" value="Submit" class="submit-button" />
          </form>
        
        <div style="clear: both;"></div>
      
      </div>
  </div>
  <footer id="site-footer">
    <div class="row">
      <div class="col-sm-6">
        <div class="copyright">&copy; 2018 :  All rights reserved.</div>
      </div>
      <div class="col-sm-6">
        <div class="designed-by pull-right">Designed & Developed By <a href="http://webvisiondigital.com/" target="_blank">@webvisiondigital</a></div>
      </div>
    </div>
  </footer> <!-- site-footer -->
</div><!-- main-content -->
@endsection