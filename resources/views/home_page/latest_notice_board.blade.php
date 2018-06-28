@extend('latest_home_page_master')
@section('home_page_main_content')
                <div class="col-md-9">
<div class='main-content'>
    <marquee>
      <p class="group-info-wc">
        <span>"SSC 2001 and HSC 2003 Bangladesh" গ্রুপে স্বাগতম।</span>
        <span>  This site is still under development.</span></p>
    </marquee>
  <div class='main-content-wrap'>

    <style type="text/css">
  
  .notice_board_item {
    margin-bottom: 20px;
    background-color: #f7f7f7;
    border: 1px solid #0000000d;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    padding: 1em;
    margin: 1.5em 0px;
}
.notice_title{
  font-size: 30px;
  font-weight: 600;
  font-family: DauphinPlain;
  text-align: ;
  color: #f25d0f;
}

.notice_content{
  font-size: 16px;
  font-weight: 500;
  font-family: ;
}
.notice_date{
  font-size: 15px;
  color: #de1114;
  font-style: italic;
  font-weight: 500;
  padding: 5px;
  font-family: monospace;
}
.notice_details_btn, .notice_link {
  color: #fff;
  background-color: #f25d0f;
  display: inline-table;
  padding: 5px 10px;
  cursor: pointer;
  border: 1px solid #f25d0f;
  text-transform: capitalize;
  transition: .3s;
}
/*.notice_details_btn:hover, .notice_link:hover {
  background-color: transparent;
  color: #f25d0f;
}
*/
a.notice_link:focus, a.notice_link:hover {
    text-decoration: none;
    color: #fff;
}

/*notice modal*/

.notice_board_item_modal {
    display: none;
    position: fixed; 
    z-index: 1; 
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0, 0, 0, 0.75);
    animation-name: animatetop;
    animation-duration: 0.4s
}


.notice_board_item_details {
    background-color: #fefefe;
    margin: auto;
    padding: 3em 2em;
    border: 1px solid #888;
    width: 80%;
}

.close_modal {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    opacity: .6;
}

.close_modal:hover,
.close_modal:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

@keyframes animatetop {
    0% {
      top: -300px; 
      opacity: 0
    }
    100% {
      top: 0; 
      opacity: 1
    }
}

</style>


    <h1 class="content-header">Notice Board</h1>
    <?php
      foreach ($all_notice_info as $v_notice) {
       $full_description = $v_notice->notice_description;
       $short_descrition = substr($full_description, 0, 300);
    ?>
    <div class="notice_board_content">
      <div class="notice_board_item">
        <p class="notice_title">{{$v_notice->notice_title}} |<span class="notice_date">{{$v_notice->created_at}}</span></p>
        <p class="notice_content">{{$short_descrition}} </p>
        <p id="noticeDetailsBtn" class="notice_details_btn">View details</p>
      </div>

      <div id="noticeBoardDetails" class="notice_board_item_modal">
        <div class="notice_board_item_details">
          <span class="close_modal">&times;</span>
          <div class="">
              <p class="notice_title">{{$v_notice->notice_title}} |<span class="notice_date">{{$v_notice->created_at}}</span></p>
              <p class="notice_content">{{$v_notice->notice_description}}</p>
              <a id="noticeLink" class="notice_link" href="{{$v_notice->link}}" target="_blank">Go to this event</a>
            </div>
        </div>      
      </div>
    </div>
    <?php
      }
    ?>

    

  </div>
</div><!-- main-content -->
</div>
<!-- notice_board_item_modal -->
    <script>
    var modal = document.getElementById('noticeBoardDetails');

    var btn = document.getElementById("noticeDetailsBtn");

    var span = document.getElementsByClassName("close_modal")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
@endsection