<div class="sidebar" data-color="green" >
	<div class="sidebar-wrapper">
        <div class="logo">
            <a href="/admin" class="simple-text">
                Citizen Map
            </a>
        </div>
        <ul class="nav">
            <li @if((isset($current)) && ($current == 'dashboard')) class="active" @endif >
                <a href="/admin">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @if(Auth::user()->isSuperAdmin())
                <li @if((isset($current)) && ($current == 'users')) class="active" @endif>
                    <a href="/admin/users">
                        <i class="pe-7s-users"></i>
                        <p>Manage Users</p>
                    </a>
                </li>
                <li @if((isset($current)) && ($current == 'groups')) class="active" @endif>
                    <a href="/admin/groups">
                        <i class="pe-7s-keypad"></i>
                        <p>Manage Groups</p>
                    </a>
                </li>  
                <li @if((isset($current)) && ($current == 'scores')) class="active" @endif>
                    <a href="/admin/scores">
                        <i class="pe-7s-rocket"></i>
                        <p>Manage Scores</p>
                    </a>
                </li>            
             @endif

             @if(Auth::user()->isAdmin())
                <li @if((isset($current)) && ($current == 'groups')) class="active" @endif>
                    <a href="/admin/group/{{Auth::user()->getGroupID()}}">
                        <i class="pe-7s-keypad"></i>
                        <p>My group</p>
                    </a>
                </li>  
             @endif
            <li @if((isset($current)) && ($current == 'pending-aed')) class="active" @endif>
                <a href="/admin/pending-aeds">
                    <i class="pe-7s-note2"></i>
                    <p>Pending AEDS</p>
                </a>
            </li>

            <li @if((isset($current)) && ($current == 'aed')) class="active" @endif>
                <a href="/admin/aeds">
                    <i class="pe-7s-map"></i>
                    <p>Manage AEDS</p>
                </a>
            </li>
            <li style="text-align: center; margin-left:0px;border-top: 1px solid #9ed546;">
                <p><br>Copyright © 2017</p>
                <a href="https://misterfoxweb.be" data-toggle="tooltip" data-original-title="Mister Fox Web">
                  <img src="/img/logo/molengeek-white.png" alt="Mister Fox Web" width="105px">
                </a>
            </li>
        </ul>
	</div>
</div>
