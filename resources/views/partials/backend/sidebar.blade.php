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
        @admin
        <a href="{{route('admin.settings')}}" class="sl-menu-link {{linkActive('admin.settings')}}">
            <div class="sl-menu-item"> <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i> <span class="menu-item-label">Settings</span></div>
        </a>
 
        <a href="{{route('admin.doctors')}}" class="sl-menu-link {{linkActive('admin.doctors')}}">
            <div class="sl-menu-item"> <i class="menu-item-icon icon ion-ios-circle-outline tx-24"></i> <span class="menu-item-label">Doctors</span></div>
        </a>

        <a href="{{route('admin.patients')}}" class="sl-menu-link {{linkActive('admin.patients')}}">
            <div class="sl-menu-item"> <i class="menu-item-icon icon ion-ios-circle-outline tx-24"></i> <span class="menu-item-label">Patients</span></div>
        </a>
        <a href="{{route('admin.medias')}}" class="sl-menu-link {{linkActive('admin.medias')}}">
            <div class="sl-menu-item"> <i class="menu-item-icon icon ion-ios-circle-outline tx-24"></i> <span class="menu-item-label">Medias</span></div>
        </a>
        @endadmin

        @doctor
            <a href="{{route('doctor.appointments')}}" class="sl-menu-link {{linkActive('doctor.appointments')}}">
                <div class="sl-menu-item"> <i class="menu-item-icon icon ion-ios-circle-outline tx-24"></i> <span class="menu-item-label">Appointments</span></div>
            </a>

            <a href="{{route('doctor.prescriptions')}}" class="sl-menu-link {{linkActive('doctor.prescriptions')}}">
                <div class="sl-menu-item"> <i class="menu-item-icon icon ion-ios-circle-outline tx-24"></i> <span class="menu-item-label">Prescriptions</span></div>
            </a>
        @enddoctor

        @patient 
            <a href="{{route('patient.prescriptions')}}" class="sl-menu-link {{linkActive('patient.prescriptions')}}">
                <div class="sl-menu-item"> <i class="menu-item-icon icon ion-ios-circle-outline tx-24"></i> <span class="menu-item-label">Prescriptions</span></div>
            </a>
            <a href="{{route('patient.appointments')}}" class="sl-menu-link {{linkActive('patient.appointments')}}">
                <div class="sl-menu-item"> <i class="menu-item-icon icon ion-ios-circle-outline tx-24"></i> <span class="menu-item-label">Appointments</span></div>
            </a>
        @endpatient
        <!-- sl-menu-link -->
    </div>
    <!-- sl-sideleft-menu -->
    <br> 
</div>