<div class="sl-sideleft">
    <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search"> <span class="input-group-btn">
      <button class="btn"><i class="fa fa-search"></i></button>
    </span>
        <!-- input-group-btn -->
    </div>
    <!-- input-group -->

    <div class="sl-sideleft-menu">
        <a href="{{route('admin.dashboard')}}" class="sl-menu-link {{linkActive('admin.dashboard')}}">
            <div class="sl-menu-item"> <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i> <span class="menu-item-label">Dashboard</span> </div>
            <!-- menu-item -->
        </a>
        <a href="{{route('admin.settings')}}" class="sl-menu-link {{linkActive('admin.settings')}}">
            <div class="sl-menu-item"> <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i> <span class="menu-item-label">Settings</span></div>
        </a>
        <!-- sl-menu-link -->
    </div>
    <!-- sl-sideleft-menu -->
    <br> 
</div>