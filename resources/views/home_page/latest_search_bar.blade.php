@extend('latest_home_page_master')
@section('home_page_main_content')
<div class="col-md-9">
  <div class='main-content'>
    <div class="col-md-9">
        <div class="header-search">
            <div class='search-content' >
                <p>Search here...</p>
            </div>
            <div class="search-bar">
              <form role="search" action="{{URL::to('/search-friends')}}" name="ssc_search_form" id="ssc_search_form" class="" method="post">
                {{csrf_field()}}
                <div class="input-group stylish-input-group">
                  
                    <input type="text" name="ssc_search_name" id="ssc_search_name" class="form-control" oninput="changeFunc();"  placeholder="Search Friends..." >
                    
                    <span class="input-group-addon">
                      <button class="s-icon" type="submit">
                         <i class="fa fa-search"></i>
                      </button>  
                    </span>
                    
                </div>
              </form>
            </div>  
        </div>
    </div>

  </div>
</div>
@endsection