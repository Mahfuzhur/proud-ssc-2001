<table id="datatable" class="table table-bordered">
    <!-- <script type="text/javascript">
        $("form.wpcf7-form").submit(function(e){
            e.preventDefault();
            var token = $("input[name=_token]").val(); // The CSRF token
            var id = $("input[name=id]").val();
            var email = $("input[name=email]").val();
            

            $.ajax({
               type:'POST',
               url:'/send',
               dataType: 'json',
               data:{id:id, email:email},
               success:function(data){
                  alert(data.success);
               }
            });
        });
    </script> -->
    <thead>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Registration Card</th>
        <th>Details</th>
        <th>Action</th>

    </tr>
    </thead>


    <tbody>
        @foreach($requested_user_info as $v_info)

    <tr>
        <?php
            $image_path = 'user_images/'.$v_info->user_image;
            $reg_card_image_path = 'user_images/'.$v_info->reg_card_image;
        ?>
        <td><a href="{{asset($image_path)}}" target="_blank"><img src="{{asset($image_path)}}" class="rounded-circle thumb-md" alt="profile-image"></a></td>
        <td>{{$v_info->name}}</td>
        <td>{{$v_info->email}}</td>
        <td><a href="{{asset($reg_card_image_path)}}" target="_blank"><img src="{{asset($reg_card_image_path)}}" class="rounded-circle thumb-md" alt="profile-image"></a></td>
        <td><a href="{{URL::to('/admin-single-user-info/'.$v_info->id)}}">View Details</a></td>
        <td>
            <!-- <form action="{{URL::to('/send')}}" method="post"> -->
                {{csrf_field()}}
                <input type="hidden" value="{{$v_info->id}}" name="id" id="pending_user_id">
                <input type="hidden" value="{{$v_info->email}}" name="email" id="pending_user_email">
                <button type="submit" value="send" class="btn btn-success btn-sm" onclick="accept_user('{{$v_info->id}}','{{$v_info->email}}');">Accept</button>
                <!-- <input type="submit" name="" id="accept_pending_user" value="Accept"> -->
                
           <!--  </form> -->
           <a href="{{URL::to('/admin-delete-user/'.$v_info->id)}}"><button id="notice_dlt" class="btn btn-danger btn-sm action-btn" onclick="return check_delete()">Delete</button></a>
        </td>
    </tr>

    @endforeach
    </tbody>
</table>