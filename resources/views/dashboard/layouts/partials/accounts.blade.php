<div class="tab-content" id="mysrpTabContent">
    <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1" tabindex="0">
        <a href="#!" class="dropdown-item">
            <i class="ti ti-edit-circle"></i>
            <span>Edit Profile</span>
        </a>
        <a href="#!" class="dropdown-item">
            <i class="ti ti-user"></i>
            <span>View Profile</span>
        </a>

        <form action="{{ route('dashboard.logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="dropdown-item">
                <i class="ti ti-power"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>

</div>
