@extend('latest_home_page_master')
@section('home_page_main_content')
<div class="col-md-9">
  <div class='main-content'>
    <div class="col-md-12">
        

<table class="table table-hover mails m-0 table table-actions-bar">


    <tbody>
      <?php

        $counter=1;
        if(isset($search_info)){

        ?>
        <h4>Search results</h4>
        <?php
        foreach ($search_info as $value) {
      ?>
    <tr class="active">
        <?php
          $image_path = 'user_images/'.$value->user_image;
          $id = Crypt::encrypt($value->id);
          // echo $encrypted;
          // exit();
        ?>
       <td>
            <a href="{{URL::to('/user-details-info/'.$id)}}"><img src="{{asset($image_path)}}" alt="public_figure_image" title="public_figure_image" class="rounded-circle thumb-md" style="width: 50px; height: 50px; border-radius: 50%;" /></a>
            <!-- <input type="hidden" name="user_details_info" value="{{$value->id}}"> -->
        </td> 

        <td>
            <a href="{{URL::to('user-details-info/'.$id)}}">{{$value->name}}</a>
        </td>
        <td>
            <a href="{{URL::to('user-details-info/'.$id)}}">{{$value->school_name}}</a>
        </td>
        <td>
            <a href="{{URL::to('user-details-info/'.$id)}}">{{$value->present_district}}</a>
        </td>
    </tr>
    

    <?php
      }
  }else{
    echo '<h4 class="text-center">'.$no_data.'</h4>';
  }
    ?>

    </tbody>
</table>


<!-- <style type="text/css">
@media screen and (max-width: 1580px) {
    .cuztomize_css {
        margin-left: 28%;
        margin-top: auto;
    }
}
  @media screen and (max-width: 990px) {
    .cuztomize_css {
        margin-top: 75px;
    }
}

@media screen and (max-width: 480px) {
    .cuztomize_css {
        margin-top: 106px;
        margin-left: 44px;
    }
}
</style> -->
    </div>

  </div>
</div>
@endsection