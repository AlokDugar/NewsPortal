@extends('layouts.dashboard')
@section('content')

<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-sm-6">
            <h3>Project</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-index">
      <div class="row">
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-lg-4 col-md-6 box-col-4">
              <div class="card profit-card">
                <div class="card-header pb-0">
                  <div class="d-flex justify-content-between">
                    <div class="flex-grow-1">
                      <p class="square-after f-w-600 header-text-primary">Out Total Project<i class="fa fa-circle"> </i></p>
                      <h4>18</h4>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <div class="flex-grow-1">
                      <div class="profit-wrapper header-text-primary icon-bg-primary">
                        <i class="fa fa-arrow-up"></i>
                      </div>
                      <h6 class="header-text-primary">2</h6>
                      <p class="mb-0">Completed</p>
                    </div>
                  </div>
                  <div class="right-side icon-right-primary"><i class="far fa-briefcase"></i>
                    <div class="shap-block">
                      <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 box-col-4">
              <div class="card visitor-card">
                <div class="card-header pb-0">
                  <div class="d-flex justify-content-between">
                    <div class="flex-grow-1">
                      <p class="square-after f-w-600 header-text-info">Our Teams<i class="fa fa-circle"> </i></p>
                      <h4>12</h4>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <div class="flex-grow-1">
                      <div class="profit-wrapper header-text-info icon-bg-info"><i class="fa fa-arrow-up"></i></div>
                      <h6 class="header-text-info">1</h6>
                      <p class="mb-0">Completed</p>
                    </div>
                  </div>
                  <div class="right-side icon-right-info"><i class="far fa-user"></i>
                    <div class="shap-block">
                      <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 box-col-4">
              <div class="card sell-card">
                <div class="card-header pb-0">
                  <div class="d-flex justify-content-between">
                    <div class="flex-grow-1">
                      <p class="square-after f-w-600 header-text-success">Our Productivity<i class="fa fa-circle"> </i></p>
                      <h4>76%</h4>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <div class="flex-grow-1">
                      <div class="profit-wrapper header-text-success icon-bg-success"><i class="fa fa-arrow-up"></i></div>
                      <h6 class="header-text-success">5.40%</h6>
                      <p class="mb-0">Look Pretty Good</p>
                    </div>
                  </div>
                  <div class="right-side icon-right-success"><i class="far fa-bullseye"></i>
                    <div class="shap-block">
                      <div class="rounded-shap animate-bg-secondary"><i></i><i></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-6 box-col-38 xl-38">
              <div class="card goal-view">
                <div class="card-header pb-0">
                  <div class="d-flex justify-content-between">
                    <div class="flex-grow-1">
                      <p class="square-after f-w-600">Our Goal Overview<i class="fa fa-circle"> </i></p>
                      <h4>Goal Overview</h4>
                    </div>
                    <div class="setting-list">
                      <ul class="list-unstyled setting-option">
                        <li>
                          <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                        </li>
                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="goal-chart">
                    <div class="shap-block">
                      <div class="rounded-shap animate-bg-secondary"><i></i><i></i><i></i></div>
                    </div>
                    <div id="goal"></div>
                  </div>
                </div>
                <div class="card-footer">
                  <ul>
                    <li>
                      <h4 class="f-w-700">$8,54,159</h4><span class="f-w-500">Completed</span>
                    </li>
                    <li>
                      <h4 class="f-w-700">$9,85,000</h4><span class="f-w-500">Our Goal</span>
                    </li>
                    <li>
                      <h4 class="f-w-700">$66,264</h4><span class="f-w-500">In Progress</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="card our-earning">
                <div class="card-header pb-0">
                  <div class="d-flex justify-content-between">
                    <div class="flex-grow-1">
                      <p class="square-after f-w-600 header-text-primary">Our Total Earning<i class="fa fa-circle"> </i></p>
                      <h4>96.564%</h4>
                      <div class="setting-list">
                        <ul class="list-unstyled setting-option">
                          <li>
                            <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                          </li>
                          <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                          <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                          <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                          <li><i class="icofont icofont-error close-card font-white"> </i></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="earning-chart">
                    <div id="earning-chart"></div>
                  </div>
                </div>
                <div class="card-footer">
                  <ul class="d-sm-flex d-block">
                    <li>
                      <p class="f-w-600 font-primary f-12">Daily Earning</p><span class="f-w-600">96.564%</span>
                    </li>
                    <li>
                      <p class="f-w-600 font-primary f-12">Monthly Earning </p><span class="f-w-600">96.564%</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-12 col-md-12">
          <div class="card order-card">
            <div class="card-header pb-0">
              <div class="d-flex justify-content-between">
                <div class="flex-grow-1">
                  <p class="square-after f-w-600">Our Total Sold<i class="fa fa-circle"></i></p>
                </div>
                <div class="setting-list">
                  <ul class="list-unstyled setting-option">
                    <li>
                      <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                    </li>
                    <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                    <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                    <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                    <li><i class="icofont icofont-error close-card font-white"> </i></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="table-responsive theme-scrollbar">
                <table class="table table-bordernone">
                  <thead>
                    <tr>
                      <th class="f-26">Order List</th>
                      <th>Status</th>
                      <th>Operator</th>
                      <th>Delivery Date</th>
                      <th>Delivery Address</th>
                      <th> </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex">
                          <div class="number-dot"><span class="f-w-700">1</span></div>
                          <div class="flex-grow-1"><span class="f-14 f-w-600">#456861</span></div>
                        </div>
                      </td>
                      <td> <span>Moving</span></td>
                      <td>Ossim Keter</td>
                      <td>16 August</td>
                      <td>Green Bay, Wisconsin, London</td>
                      <td>$450.00</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex">
                          <div class="number-dot"><span class="f-w-700">2</span></div>
                          <div class="flex-grow-1"><span class="f-14 f-w-600">#846953</span></div>
                        </div>
                      </td>
                      <td> <span>Moving</span></td>
                      <td>Venter Loren</td>
                      <td>21 September</td>
                      <td>Summerlin, Nevada, United kingdom</td>
                      <td>$136.00</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex">
                          <div class="number-dot"><span class="f-w-700">3</span></div>
                          <div class="flex-grow-1"><span class="f-14 f-w-600">#197568</span></div>
                        </div>
                      </td>
                      <td> <span>Cancel</span></td>
                      <td>Fran Loain</td>
                      <td>06 March</td>
                      <td>Atlantic City, New Jersey, UK</td>
                      <td>$624.00</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex">
                          <div class="number-dot"><span class="f-w-700">4</span></div>
                          <div class="flex-grow-1"><span class="f-14 f-w-600">#647953</span></div>
                        </div>
                      </td>
                      <td> <span>Pending</span></td>
                      <td>Loften Horen</td>
                      <td>12 February</td>
                      <td>Fort Worth, Soun Di, Texas, USA</td>
                      <td>$48.00</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex">
                          <div class="number-dot"><span class="f-w-700">5</span></div>
                          <div class="flex-grow-1"><span class="f-14 f-w-600">#447495</span></div>
                        </div>
                      </td>
                      <td> <span>Moving</span></td>
                      <td>Loie Fenter</td>
                      <td>12 February</td>
                      <td>Green Bay, Wisconsin, London</td>
                      <td>$258.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

@endsection
