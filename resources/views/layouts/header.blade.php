<div class="container-fluid header inner_head">
	<div class="fixed_w">
		<div class="row">
			<div class="col-md-12">
				<a href="/" class="logo" style="color: #FFFFFF;font-size:24px;">&nbsp; CITIZEN MAP</a>

				@if (Auth::guest())
					<a href="/register" class="green_btn_header" >Register</a>
					<a href="/login" class="green_btn_header" id="ad">Login </a>	
						
                @else
 <h5 style=" color:white;float:right;margin-top:16px"> {{ Auth::user()->name }}</h5>
                    
                        
                           

                        
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="green_btn_header">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                 
                    @include('front.modalRegister')
                
                @endif
			</div>
		</div>
	</div>
</div>
