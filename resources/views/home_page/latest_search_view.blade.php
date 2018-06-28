
<div id="result"  class="col-md-4 cuztomize_css" style="position: absolute; margin-top: 15%;">
<table class="table table-hover mails m-0 table table-actions-bar">


    <tbody>
      <?php

        $counter=1;
        if(!empty($search_info)){
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
    echo '<tr><td colspan="2"><h4>No Data Found</h4></td></tr>';
  }
    ?>

    </tbody>
</table>
</div>

<style type="text/css">

div#result {
    position: absolute;
    margin-top: 8%;
    margin-left: 30%;
}

@media screen and (max-width: 990px) {
    div#result {
    margin-top: 48%;
    margin-left: 5%;
    }
}

@media screen and (max-width: 970px) {
    div#result {
    margin-top: 52%;
    }
}

@media screen and (max-width: 900px) {
    div#result {
    margin-top: 55%;
    }
}

@media screen and (max-width: 850px) {
    div#result {
    margin-top: 60%;
    }
}

@media screen and (max-width: 800px) {
    div#result {
    margin-top: 65%;
    }
}

@media screen and (max-width: 730px) {
    div#result {
    margin-top: 72%;
    }
}

@media screen and (max-width: 650px) {
    div#result {
    margin-top: 80%;
    }
}

@media screen and (max-width: 575px) {
    div#result {
    margin-top: 95%;
    }
}

@media screen and (max-width: 500px) {
    div#result {
    margin-top: 100%;
    }
}

@media screen and (max-width: 450px) {
    div#result {
    margin-top: 118%;
    }
}
@media screen and (max-width: 385px) {
    div#result {
    margin-top: 130%;
    }
}
@media screen and (max-width: 335px) {
    div#result {
    margin-top: 147%;
    }
}


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
</style>