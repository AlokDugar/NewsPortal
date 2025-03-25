<div class="page-header">
    <div class="row m-0">
      <div class="header-wrapper">
        <div class="left-header col-lg-6 horizontal-wrapper ps-0">
          <div class="back-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-text-indent-left text-muted" viewBox="0 0 16 16">
              <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
            </svg>
          </div>
          <div class="toggle-sidebar sidebar-icon icon-box-sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-text-indent-left text-muted" viewBox="0 0 16 16">
              <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
            </svg>
          </div>
        </div>
        <div class="nav-right col-lg-6 right-header p-0">
          <ul class="nav-menus">
            <li>
              <div class="right-header ps-0">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text mobile-search"><i
                        class="fa fa-search"></i></span></div>
                  <input class="form-control" type="text" placeholder="Search Here........">
                </div>
              </div>
            </li>
            <li class="serchinput">
              <div class="serchbox"><i data-feather="search"></i></div>
              <div class="form-group search-form">
                <input type="text" placeholder="Search here...">
              </div>
            </li>
            <li class="drkthm">
              <div class="mode"><i class="fas fa-moon"></i></div>
            </li>
            <li class="onhover-dropdown dropdown">
                <div class="notification-box"><i data-feather="bell"></i><span class="badge badge-primary counter">14</span></div>
              <ul class="notification-dropdown show-div dropdown-menu">
                <li><i data-feather="bell"> </i>
                  <h6 class="f-18 mb-0">Notitications</h6>
                  <a href="javascript:void(0);" class="text-end text-dark">Mark all read</a>
                </li>
                <li>
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0"><i data-feather="truck"></i></div>
                    <div class="flex-grow-1">
                      <p><a href="order-history.html">Delivery processing </a><span class="pull-right">6 hr</span></p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0"><i data-feather="shopping-cart"></i></div>
                    <div class="flex-grow-1">
                      <p><a href="cart.html">Order Complete</a><span class="pull-right">3 hr</span></p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0"><i data-feather="file-text"></i></div>
                    <div class="flex-grow-1">
                      <p><a href="invoice-template.html">Tickets Generated</a><span class="pull-right">1 hr</span></p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0"><i data-feather="send"></i></div>
                    <div class="flex-grow-1">
                      <p><a href="email_inbox.html">Delivery Complete</a><span class="pull-right">45 min</span></p>
                    </div>
                  </div>
                </li>
                <li><a class="btn btn-primary" href="javascript:void(0)">Check all notification</a></li>
              </ul>
            </li>
            <li class="maximize"><a href="#!" onclick="javascript:toggleFullScreen()">
              <i data-feather="maximize-2"></i></a>
            </li>
            <li class="profile-nav onhover-dropdown dropdown">
              <div class="account-user">
                <img alt="" src="assets/images/avtar/11.jpg">
              </div>
              <ul class="profile-dropdown show-div dropdown-menu">
                <li>
                  <div class="main-header-profile header-img">
                    <div class="main-img-user">
                      <img alt="" src="assets/images/avtar/11.jpg">
                    </div>
                    <h6>{{Auth::guard('admin')->user()->name}}</h6><span>Admin</span>
                  </div>
                </li>
                <li><a href="{{route('profile')}}"><i data-feather="user"></i><span>Account</span></a></li>
                <li><a href="email_inbox.html"><i data-feather="mail"></i><span>Inbox</span></a></li>
                <li><a href="edit-profile.html"><i data-feather="settings"></i><span>Settings</span></a></li>
                <li><a href="{{route('auth.adminLogout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-in"> </i><span>Log Out</span></a></li>
                <form id="logout-form" action="{{ route('auth.adminLogout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
</div>
