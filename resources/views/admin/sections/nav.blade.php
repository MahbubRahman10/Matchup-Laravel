<div class="sidebar" id="sidebar">
  @if(isset($id))
  @php
  $id = $id;
  @endphp
  @else
  @php
  $id =0;
  @endphp
  @endif

    <style type="text/css">
      #dropdown-menu[style] {
        position: relative !important;
        overflow: visible !important;
        transform: translate3d(0px, 0px, 0px) !important;
        will-change: transform !important;
        margin-bottom: 10px;
      }
    </style>

  <h4 class="logo"><a href="" style=" font-weight: 700">MATCHup<span style="color: #9D070C; font-weight: 700"></span></a></h4>
  <ul id="nav">

    <li><a  @if(Request::url() == 'http://localhost:8000/matchup/dashboard') style="background-color: #F5F4F4;color: #4c4c4c;text-decoration: none;" @else href="/matchup/dashboard" @endif  ><i class="fa fa-tachometer-alt" aria-hidden="true"></i> Dashboard  </a></li>

    <li><a @if(Request::url() == 'http://localhost:8000/matchup/message') style="background-color: #F5F4F4;color: #4c4c4c;text-decoration: none;" @else href="/matchup/message" @endif  ><i class="fa fa-envelope" aria-hidden="true"></i> Messages @if($messagestatus>0) <span  class="status">{{ $messagestatus }}</span> @endif </a></li>

    <li class="dropdown">
      <a href="cs" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fas fa-users" ></i> Custom <i class="fas fa-angle-right subarrow" style="float: right;"></i> </a>
      <ul class="dropdown-menu @if(Request::url() == 'http://localhost:8000/matchup/guestmessage') show @elseif(Request::url() == 'http://localhost:8000/matchup/success-story') show @endif" id="dropdown-menu">
        <li>              
          <a href="/matchup/guestmessage" @if(Request::url() == 'http://localhost:8000/matchup/guestmessage') style="background-color: #F5F4F4;color: #4c4c4c;text-decoration: none;" @endif><i class="fas fa-caret-right"></i>Guest Message</a>
        </li>
        <li>
          <a href="/matchup/success-story" @if(Request::url() == 'http://localhost:8000/matchup/success-story') style="background-color: #F5F4F4;color: #4c4c4c;text-decoration: none;" @endif><i class="fas fa-caret-right"></i> Success Story </a>
        </li>
      </ul>
    </li>

    <li><a @if(Request::url() == 'http://localhost:8000/matchup/membership') style="background-color: #F5F4F4;color: #4c4c4c;text-decoration: none;" @else href="/matchup/membership" @endif   ><i class="fas fa-handshake" aria-hidden="true"></i> Membership @if($membershipstatus>0) <span  class="status">{{ $membershipstatus }}</span> @endif </a></li>

    <li><a @if(Request::url() == 'http://localhost:8000/matchup/membershiplevel') style="background-color: #F5F4F4;color: #4c4c4c;text-decoration: none;" @else href="/matchup/membershiplevel" @endif   ><i class="fas fa-arrows-alt" aria-hidden="true"></i> Membership Level  </a></li>

    <li><a @if(Request::url() == 'http://localhost:8000/matchup/meeting') style="background-color: #F5F4F4;color: #4c4c4c;text-decoration: none;" @else href="/matchup/meeting" @endif   ><i class="fab fa-meetup" aria-hidden="true"></i> Meeting  @if($meetingstatus>0) <span  class="status">{{ $meetingstatus }}</span> @endif </a></li>

    <li><a @if(Request::url() == 'http://localhost:8000/matchup/subscriber') style="background-color: #F5F4F4;color: #4c4c4c;text-decoration: none;" @else href="/matchup/subscriber" @endif   ><i class="fab fa-avianex" aria-hidden="true"></i> Subscriber  </a></li>

    <li><a @if(Request::url() == 'http://localhost:8000/matchup/user') style="background-color: #F5F4F4;color: #4c4c4c;text-decoration: none;" @else href="/matchup/user" @endif   ><i class="fas fa-users" aria-hidden="true"></i> User @if($userstatus>0) <span  class="status">{{ $userstatus }}</span> @endif  </a></li>
    
    <li><a @if(Request::url() == 'http://localhost:8000/matchup/admin') style="background-color: #F5F4F4;color: #4c4c4c;text-decoration: none;" @else href="/matchup/admin" @endif   ><i class="fas fa-user-secret" aria-hidden="true"></i> Admin  </a></li>
    
    <li><a href="/logout" ><i class="fas fa-sign-out-alt"></i> Logout </a></li>

  </ul>
</div>


