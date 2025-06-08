  <header class="pc-header">
      <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
          <div class="me-auto pc-mob-drp">
              <ul class="list-unstyled">
                  <!-- ======= Menu collapse Icon ===== -->
                  <li class="pc-h-item pc-sidebar-collapse">
                      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                          <i class="ti ti-menu-2"></i>
                      </a>
                  </li>
                  <li class="pc-h-item pc-sidebar-popup">
                      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                          <i class="ti ti-menu-2"></i>
                      </a>
                  </li>
                  <li class="dropdown pc-h-item d-inline-flex d-md-none">
                      <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
                          role="button" aria-haspopup="false" aria-expanded="false">
                          <i class="ti ti-search"></i>
                      </a>
                      <div class="dropdown-menu pc-h-dropdown drp-search">
                          <form class="px-3">
                              <div class="form-group mb-0 d-flex align-items-center">
                                  <i data-feather="search"></i>
                                  <input type="search" class="form-control border-0 shadow-none"
                                      placeholder="Search here. . .">
                              </div>
                          </form>
                      </div>
                  </li>
                  <li class="pc-h-item d-none d-md-inline-flex">
                      <form class="header-search">
                          <i data-feather="search" class="icon-search"></i>
                          <input type="search" class="form-control" placeholder="Search here. . .">
                      </form>
                  </li>
              </ul>
          </div>
          <!-- [Mobile Media Block end] -->
          <div class="ms-auto">
              <ul class="list-unstyled">

                  <li class="dropdown pc-h-item header-user-profile">
                      <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                          role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                          {{-- <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar"> --}}
                          <span>{{ auth()->check() ? auth()->user()->name : 'Profile' }}</span>

                      </a>
                      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                          <div class="dropdown-header">
                              <div class="d-flex mb-1">
                                  <div class="flex-shrink-0">
                                      <img src="../assets/images/user/avatar-2.jpg" alt="user-image"
                                          class="user-avtar wid-35">
                                  </div>
                                  <div class="flex-grow-1 ms-3">
                                      <h6 class="mb-1">{{ auth()->user()->name ?? '' }}</h6>
                                      <span>UI/UX Designer</span>
                                  </div>
                                  <a href="#!" class="pc-head-link bg-transparent"><i
                                          class="ti ti-power text-danger"></i></a>
                              </div>
                          </div>
                          <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
                              <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="drp-t1" data-bs-toggle="tab"
                                      data-bs-target="#drp-tab-1" type="button" role="tab"
                                      aria-controls="drp-tab-1" aria-selected="true"><i class="ti ti-user"></i>
                                      Profile</button>
                              </li>

                          </ul>
                          @include('dashboard.layouts.partials.accounts')
                      </div>
                  </li>
              </ul>
          </div>
      </div>
  </header>
