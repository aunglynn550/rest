@extends('admin.layouts.master')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-cart-plus"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Today's Order</h4>
                  </div>
                  <div class="card-body">
                    {{ $todaysOrders }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Today's Earnings</h4>
                  </div>
                  <div class="card-body">
                    {{ currencyPosition($todaysEarnings) }}
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-cart-plus"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>This Month's Order </h4>
                  </div>
                  <div class="card-body">
                    {{ $thisMonthsOrders }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>This Month's Earnings</h4>
                  </div>
                  <div class="card-body">
                    {{ currencyPosition($thisMonthsEarnings) }}
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-cart-plus"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>This Year's Order</h4>
                  </div>
                  <div class="card-body">
                    {{ $thisYearsOrders }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>This Year's Earnings</h4>
                  </div>
                  <div class="card-body">
                    {{ currencyPosition($thisYearsEarnings) }}
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-cart-plus"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Order</h4>
                  </div>
                  <div class="card-body">
                    {{ $totalOrders }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Earnings</h4>
                  </div>
                  <div class="card-body">
                    {{$totalEarnings }}
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Users</h4>
                  </div>
                  <div class="card-body">
                    {{ $totalUsers }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-user-shield"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Admins</h4>
                  </div>
                  <div class="card-body">
                    {{$totalAdmins }}
                  </div>
                </div>
              </div>
            </div>

              
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-th"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Products</h4>
                  </div>
                  <div class="card-body">
                    {{ $totalProducts }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-rss"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Blogs</h4>
                  </div>
                  <div class="card-body">
                    {{$totalBlogs }}
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Reports</h4>
                  </div>
                  <div class="card-body">
                    1,201
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Online Users</h4>
                  </div>
                  <div class="card-body">
                    47
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistics</h4>
                  <div class="card-header-action">
                    <div class="btn-group">
                      <a href="#" class="btn btn-primary">Week</a>
                      <a href="#" class="btn">Month</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="182"></canvas>
                  <div class="statistic-details mt-sm-4">
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                      <div class="detail-value">$243</div>
                      <div class="detail-name">Today's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                      <div class="detail-value">$2,902</div>
                      <div class="detail-name">This Week's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                      <div class="detail-value">$12,821</div>
                      <div class="detail-name">This Month's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                      <div class="detail-value">$92,142</div>
                      <div class="detail-name">This Year's Sales</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Recent Activities</h4>
                </div>
                <div class="card-body">             
                  <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                      <img class="mr-3 rounded-circle" width="50" src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" alt="avatar">
                      <div class="media-body">
                        <div class="float-right text-primary">Now</div>
                        <div class="media-title">Farhan A Mujib</div>
                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded-circle" width="50" src="{{ asset('admin/assets/img/avatar/avatar-2.png') }}" alt="avatar">
                      <div class="media-body">
                        <div class="float-right">12m</div>
                        <div class="media-title">Ujang Maman</div>
                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded-circle" width="50" src="{{ asset('admin/assets/img/avatar/avatar-3.png') }}" alt="avatar">
                      <div class="media-body">
                        <div class="float-right">17m</div>
                        <div class="media-title">Rizal Fakhri</div>
                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded-circle" width="50" src="{{ asset('admin/assets/img/avatar/avatar-4.png') }}" alt="avatar">
                      <div class="media-body">
                        <div class="float-right">21m</div>
                        <div class="media-title">Alfa Zulkarnain</div>
                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                      </div>
                    </li>
                  </ul>
                  <div class="text-center pt-1 pb-1">
                    <a href="#" class="btn btn-primary btn-lg btn-round">
                      View All
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-body pt-2 pb-2">
                  <div id="myWeather">Please wait</div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Authors</h4>
                </div>
                <div class="card-body">
                  <div class="row pb-2">
                    <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
                      <div class="avatar-item mb-0">
                        <img alt="image" src="{{ asset('admin/assets/img/avatar/avatar-5.png') }}" class="img-fluid" data-toggle="tooltip" title="Alfa Zulkarnain">
                        <div class="avatar-badge" title="Editor" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
                      </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
                      <div class="avatar-item mb-0">
                        <img alt="image" src="{{ asset('admin/assets/img/avatar/avatar-4.png') }}" class="img-fluid" data-toggle="tooltip" title="Egi Ferdian">
                        <div class="avatar-badge" title="Admin" data-toggle="tooltip"><i class="fas fa-cog"></i></div>
                      </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
                      <div class="avatar-item mb-0">
                        <img alt="image" src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" class="img-fluid" data-toggle="tooltip" title="Jaka Ramadhan">
                        <div class="avatar-badge" title="Author" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></div>
                      </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
                      <div class="avatar-item mb-0">
                        <img alt="image" src="{{ asset('admin/assets/img/avatar/avatar-2.png') }}" class="img-fluid" data-toggle="tooltip" title="Ryan">
                        <div class="avatar-badge" title="Admin" data-toggle="tooltip"><i class="fas fa-cog"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Referral URL</h4>
                </div>
                <div class="card-body">
                  <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">2,100</div>
                    <div class="font-weight-bold mb-1">Google</div>
                    <div class="progress" data-height="3">
                      <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>                          
                  </div>

                  <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">1,880</div>
                    <div class="font-weight-bold mb-1">Facebook</div>
                    <div class="progress" data-height="3">
                      <div class="progress-bar" role="progressbar" data-width="67%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>

                  <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">1,521</div>
                    <div class="font-weight-bold mb-1">Bing</div>
                    <div class="progress" data-height="3">
                      <div class="progress-bar" role="progressbar" data-width="58%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>

                  <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">884</div>
                    <div class="font-weight-bold mb-1">Yahoo</div>
                    <div class="progress" data-height="3">
                      <div class="progress-bar" role="progressbar" data-width="36%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>

                  <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">473</div>
                    <div class="font-weight-bold mb-1">Kodinger</div>
                    <div class="progress" data-height="3">
                      <div class="progress-bar" role="progressbar" data-width="28%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>

                  <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted">418</div>
                    <div class="font-weight-bold mb-1">Multinity</div>
                    <div class="progress" data-height="3">
                      <div class="progress-bar" role="progressbar" data-width="20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h4>Popular Browser</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col text-center">
                      <div class="browser browser-chrome"></div>
                      <div class="mt-2 font-weight-bold">Chrome</div>
                      <div class="text-muted text-small"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 48%</div>
                    </div>
                    <div class="col text-center">
                      <div class="browser browser-firefox"></div>
                      <div class="mt-2 font-weight-bold">Firefox</div>
                      <div class="text-muted text-small"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 26%</div>
                    </div>
                    <div class="col text-center">
                      <div class="browser browser-safari"></div>
                      <div class="mt-2 font-weight-bold">Safari</div>
                      <div class="text-muted text-small"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 14%</div>
                    </div>
                    <div class="col text-center">
                      <div class="browser browser-opera"></div>
                      <div class="mt-2 font-weight-bold">Opera</div>
                      <div class="text-muted text-small">7%</div>
                    </div>
                    <div class="col text-center">
                      <div class="browser browser-internet-explorer"></div>
                      <div class="mt-2 font-weight-bold">IE</div>
                      <div class="text-muted text-small"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 5%</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-sm-5 mt-md-0">
                <div class="card-header">
                  <h4>Visitors</h4>
                </div>
                <div class="card-body">
                  <div id="visitorMap"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4>This Week Stats</h4>
                  <div class="card-header-action">
                    <div class="dropdown">
                      <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">Filter</a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item has-icon"><i class="far fa-circle"></i> Electronic</a>
                        <a href="#" class="dropdown-item has-icon"><i class="far fa-circle"></i> T-shirt</a>
                        <a href="#" class="dropdown-item has-icon"><i class="far fa-circle"></i> Hat</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">View All</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="summary">
                    <div class="summary-info">
                      <h4>$1,053</h4>
                      <div class="text-muted">Sold 3 items on 2 customers</div>
                      <div class="d-block mt-2">                              
                        <a href="#">View All</a>
                      </div>
                    </div>
                    <div class="summary-item">
                      <h6>Item List <span class="text-muted">(3 Items)</span></h6>
                      <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="{{ asset('admin/assets/img/products/product-1-50.png') }}" alt="product">
                          </a>
                          <div class="media-body">
                            <div class="media-right">$405</div>
                            <div class="media-title"><a href="#">PlayStation 9</a></div>
                            <div class="text-muted text-small">by <a href="#">Hasan Basri</a> <div class="bullet"></div> Sunday</div>
                          </div>
                        </li>
                        <li class="media">
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="{{ asset('admin/assets/img/products/product-2-50.png') }}" alt="product">
                          </a>
                          <div class="media-body">
                            <div class="media-right">$499</div>
                            <div class="media-title"><a href="#">RocketZ</a></div>
                            <div class="text-muted text-small">by <a href="#">Hasan Basri</a> <div class="bullet"></div> Sunday
                            </div>
                          </div>
                        </li>
                        <li class="media">
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="{{ asset('admin/assets/img/products/product-3-50.png') }}" alt="product">
                          </a>
                          <div class="media-body">
                            <div class="media-right">$149</div>
                            <div class="media-title"><a href="#">Xiaomay Readme 4.0</a></div>
                            <div class="text-muted text-small">by <a href="#">Kusnaedi</a> <div class="bullet"></div> Tuesday
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h4 class="d-inline">Tasks</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-primary">View All</a>
                  </div>
                </div>
                <div class="card-body">             
                  <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cbx-1">
                        <label class="custom-control-label" for="cbx-1"></label>
                      </div>
                      <img class="mr-3 rounded-circle" width="50" src="{{ asset('admin/assets/img/avatar/avatar-4.png') }}" alt="avatar">
                      <div class="media-body">
                        <div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
                        <h6 class="media-title"><a href="#">Redesign header</a></h6>
                        <div class="text-small text-muted">Alfa Zulkarnain <div class="bullet"></div> <span class="text-primary">Now</span></div>
                      </div>
                    </li>
                    <li class="media">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cbx-2" checked="">
                        <label class="custom-control-label" for="cbx-2"></label>
                      </div>
                      <img class="mr-3 rounded-circle" width="50" src="{{ asset('admin/assets/img/avatar/avatar-5.png') }}" alt="avatar">
                      <div class="media-body">
                        <div class="badge badge-pill badge-primary mb-1 float-right">Completed</div>
                        <h6 class="media-title"><a href="#">Add a new component</a></h6>
                        <div class="text-small text-muted">Serj Tankian <div class="bullet"></div> 4 Min</div>
                      </div>
                    </li>
                    <li class="media">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cbx-3" >
                        <label class="custom-control-label" for="cbx-3"></label>
                      </div>
                      <img class="mr-3 rounded-circle" width="50" src="{{ asset('admin/assets/img/avatar/avatar-2.png') }}" alt="avatar">
                      <div class="media-body">
                        <div class="badge badge-pill badge-warning mb-1 float-right">Progress</div>
                        <h6 class="media-title"><a href="#">Fix modal window</a></h6>
                        <div class="text-small text-muted">Ujang Maman <div class="bullet"></div> 8 Min</div>
                      </div>
                    </li>
                    <li class="media">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cbx-4">
                        <label class="custom-control-label" for="cbx-4"></label>
                      </div>
                      <img class="mr-3 rounded-circle" width="50" src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" alt="avatar">
                      <div class="media-body">
                        <div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
                        <h6 class="media-title"><a href="#">Remove unwanted classes</a></h6>
                        <div class="text-small text-muted">Farhan A Mujib <div class="bullet"></div> 21 Min</div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-md-12 col-12 col-sm-12">
              <form method="post" class="needs-validation" novalidate="">
                <div class="card">
                  <div class="card-header">
                    <h4>Quick Draft</h4>
                  </div>
                  <div class="card-body pb-0">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" name="title" class="form-control" required>
                      <div class="invalid-feedback">
                        Please fill in the title
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Content</label>
                      <textarea class="summernote-simple"></textarea>
                    </div>
                  </div>
                  <div class="card-footer pt-0">
                    <button class="btn btn-primary">Save Draft</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-7 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Latest Posts</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-primary">View All</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Author</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>                         
                        <tr>
                          <td>
                            Introduction Laravel 5
                            <div class="table-links">
                              in <a href="#">Web Development</a>
                              <div class="bullet"></div>
                              <a href="#">View</a>
                            </div>
                          </td>
                          <td>
                            <a href="#" class="font-weight-600"><img src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                          </td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Laravel 5 Tutorial - Installation
                            <div class="table-links">
                              in <a href="#">Web Development</a>
                              <div class="bullet"></div>
                              <a href="#">View</a>
                            </div>
                          </td>
                          <td>
                            <a href="#" class="font-weight-600"><img src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                          </td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Laravel 5 Tutorial - MVC
                            <div class="table-links">
                              in <a href="#">Web Development</a>
                              <div class="bullet"></div>
                              <a href="#">View</a>
                            </div>
                          </td>
                          <td>
                            <a href="#" class="font-weight-600"><img src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                          </td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Laravel 5 Tutorial - Migration
                            <div class="table-links">
                              in <a href="#">Web Development</a>
                              <div class="bullet"></div>
                              <a href="#">View</a>
                            </div>
                          </td>
                          <td>
                            <a href="#" class="font-weight-600"><img src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                          </td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Laravel 5 Tutorial - Deploy
                            <div class="table-links">
                              in <a href="#">Web Development</a>
                              <div class="bullet"></div>
                              <a href="#">View</a>
                            </div>
                          </td>
                          <td>
                            <a href="#" class="font-weight-600"><img src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                          </td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Laravel 5 Tutorial - Closing
                            <div class="table-links">
                              in <a href="#">Web Development</a>
                              <div class="bullet"></div>
                              <a href="#">View</a>
                            </div>
                          </td>
                          <td>
                            <a href="#" class="font-weight-600"><img src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                          </td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="section">
          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Todays Orders </h4>
                    <div class="card-header-action">
                      <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">
                        Create New
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                   {{ $dataTable->table() }}
                  </div>
            </div>
            <!-- end card-primary -->
                    
        </section>
            <!-- Modal -->
            <div class="modal fade" id="order_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" class="order_status_form">
                            @csrf
                            @method('PUT')
                                <div class="form-group">
                                    <label for="">Payment Status</label>
                                    <select class="form-control payment_status" name="payment_status" id="">
                                        <option value="pending">Pending</option>
                                        <option value="completed">Completed</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Order Status</label>
                                    <select class="form-control order_status" name="order_status" id="">
                                        <option  value="pending">Pending</option>
                                        <option  value="in_process">In Process</option>
                                        <option value="delivered">Delivered</option>
                                        <option  value="declined">Declined</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary submit_btn">Save Change</button>
                                </div>
                            </form>
                    </div>
                  
                    </div>
                </div>
              </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes:['type'=>'module']) }}

    <script>
        $(document).ready(function(){
            var orderId = ';'

            $(document).on('click', '.order_status_btn',function(){

                let id= $(this).data('id');

                orderId = id;
                let payment_status= $('.payment_status option');
                let order_status = $('.order_status option');
                $.ajax({
                    method: 'GET',
                    url: '{{ route("admin.orders.status", ":id") }}'.replace(":id",id),
                    beforeSend: function(){
                        $('.submit_btn').prop('disable',true);
                    },
                    success:function(response){
                        payment_status.each(function(){
                            if($(this).val() == response.payment_status){
                                $(this).attr('selected','selected');
                            }
                        })

                        order_status.each(function(){
                            if($(this).val() == response.order_status){
                                $(this).attr('selected','selected');
                            }
                        })
                        $('.submit_btn').prop('disable',false);
                    },
                    error:function(xhr,status,error){

                    }
                   
                })
            })

            $('.order_status_form').on('submit',function(e){
                e.preventDefault();
                let formContent = $(this).serialize();
                $.ajax({
                    method: 'post',
                    url: '{{ route("admin.orders.status-update", ":id") }}'.replace(":id",orderId),
                    data: formContent,
                    success:function(response){    
                        $('#order_modal').modal("hide");
                        $('#order-table').DataTable().draw();                   
                        toastr.success(response.message);
                    },
                    error:function(xhr,status,error){
                        toastr.error(shr.responseJSON.message);
                    }
                })

            })
        })
    </script>
@endpush