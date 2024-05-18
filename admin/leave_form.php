<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/admin_bar.php';?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Leave Application Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Leave Application Form</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card card-gray-dark card-tabs">
            <div class="card-header p-0 border-bottom-0">
              <ul class="nav nav-tabs" id="leave-forms-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="leave-forms-1-tab" data-toggle="pill" href="#leave-forms-1" role="tab" aria-controls="leave-forms-1" aria-selected="true">Pending & Recent Leave Forms History</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="leave-forms-2-tab" data-toggle="pill" href="#leave-forms-2" role="tab" aria-controls="leave-forms-2" aria-selected="false">Leave Forms History</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="leave-forms-tabContent">
                <div class="tab-pane fade show active" id="leave-forms-1" role="tabpanel" aria-labelledby="leave-forms-1-tab">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                          <h3 class="card-title"><i class="fas fa-door-open"></i> Pending Leave Forms Table</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                              <i class="fas fa-expand"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div id="accordion_pending_leave_forms_legend">
                            <div class="card shadow">
                              <div class="card-header">
                                <h4 class="card-title w-100">
                                  <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseOnePendingLeaveFormsLegend">
                                    Pending Leave Forms Legend
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseOnePendingLeaveFormsLegend" class="collapse" data-parent="#accordion_pending_leave_forms_legend">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-6 col-lg-6 p-1 bg-orange"><center>Pending on Clinic</center></div>
                                    <div class="col-sm-6 col-lg-6 p-1 bg-warning"><center>Pending</center></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col-sm-2">
                              <span id="count_view"></span>
                            </div>
                          </div>
                          <div class="table-responsive" style="max-height: 500px; overflow: auto; display:inline-block;">
                            <table id="pendingLeaveFormsTable" class="table table-sm table-head-fixed text-nowrap table-hover">
                              <thead style="text-align: center;">
                                <tr>
                                  <th>#</th>
                                  <th>Date Filed</th>
                                  <th>Leave Form ID</th>
                                  <th>Leave Type</th>
                                  <th>Leave Date From</th>
                                  <th>Leave Date To</th>
                                </tr>
                              </thead>
                              <tbody id="pendingLeaveFormsData" style="text-align: center;">
                                <tr>
                                  <td colspan="6" style="text-align:center;">
                                    <div class="spinner-border text-dark" role="status">
                                      <span class="sr-only">Loading...</span>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                          <h3 class="card-title"><i class="fas fa-history"></i> Recent Leave Forms History Table</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                              <i class="fas fa-expand"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div id="accordion_leave_forms_history_legend">
                            <div class="card shadow">
                              <div class="card-header">
                                <h4 class="card-title w-100">
                                  <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseOneLeaveFormsHistoryLegend">
                                    Leave Forms History Legend
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseOneLeaveFormsHistoryLegend" class="collapse" data-parent="#accordion_leave_forms_history_legend">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-6 col-lg-6 p-1 bg-success"><center>Approved</center></div>
                                    <div class="col-sm-6 col-lg-6 p-1 bg-danger"><center>Disapproved</center></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col-sm-2">
                              <span id="count_view2"></span>
                            </div>
                          </div>
                          <div class="table-responsive" style="max-height: 500px; overflow: auto; display:inline-block;">
                            <table id="recentLeaveFormsHistoryTable" class="table table-sm table-head-fixed text-nowrap table-hover">
                              <thead style="text-align: center;">
                                <tr>
                                  <th>#</th>
                                  <th>Date Filed</th>
                                  <th>Leave Form ID</th>
                                  <th>Leave Type</th>
                                  <th>Leave Date From</th>
                                  <th>Leave Date To</th>
                                </tr>
                              </thead>
                              <tbody id="recentLeaveFormsHistoryData" style="text-align: center;">
                                <tr>
                                  <td colspan="6" style="text-align:center;">
                                    <div class="spinner-border text-dark" role="status">
                                      <span class="sr-only">Loading...</span>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <div class="tab-pane fade" id="leave-forms-2" role="tabpanel" aria-labelledby="leave-forms-2-tab">
                  <div class="row mb-2">
                    <div class="col-sm-3">
                      <label>Date Filed From</label>
                      <input type="date" class="form-control" id="date_filed_from_search">
                    </div>
                    <div class="col-sm-3">
                      <label>Date Filed To</label>
                      <input type="date" class="form-control" id="date_filed_to_search">
                    </div>
                    <div class="col-sm-3">
                      <label>Leave Type</label>
                      <select class="form-control" id="leave_type_search" style="width: 100%;" required>
                        <option selected value="">ALL</option>
                        <option value="VL">VL</option>
                        <option value="SL">SL</option>
                        <option value="LWOP">LWOP</option>
                        <option value="RD">RD</option>
                        <option value="Paternity">Paternity</option>
                        <option value="SSS Benefits">SSS Benefits</option>
                        <option value="Maternity">Maternity</option>
                        <option value="Sickness">Sickness</option>
                        <option value="Others">Others</option>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <label>Status</label>
                      <select class="form-control" id="leave_form_status_search" style="width: 100%;" required>
                        <option selected value="">ALL</option>
                        <option value="approved">Approved</option>
                        <option value="disapproved">Disapproved</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-sm-3 offset-sm-9">
                      <button type="button" class="btn bg-gray-dark btn-block" onclick="get_leave_forms_history()"><i class="fas fa-search"></i> Search</button>
                    </div>
                  </div>
                  <div id="accordion_leave_forms_history2_legend">
                    <div class="card shadow">
                      <div class="card-header">
                        <h4 class="card-title w-100">
                          <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseOneLeaveFormsHistory2Legend">
                            Leave Forms History Legend
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOneLeaveFormsHistory2Legend" class="collapse" data-parent="#accordion_leave_forms_history2_legend">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-6 col-lg-6 p-1 bg-success"><center>Approved</center></div>
                            <div class="col-sm-6 col-lg-6 p-1 bg-danger"><center>Disapproved</center></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-sm-2">
                      <span id="count_view3"></span>
                    </div>
                  </div>
                  <div class="table-responsive" style="max-height: 500px; overflow: auto; display:inline-block;">
                    <table id="leaveFormsHistoryTable" class="table table-sm table-head-fixed text-nowrap table-hover">
                      <thead style="text-align: center;">
                        <tr>
                          <th>#</th>
                          <th>Date Filed</th>
                          <th>Leave Form ID</th>
                          <th>Leave Type</th>
                          <th>Leave Date From</th>
                          <th>Leave Date To</th>
                        </tr>
                      </thead>
                      <tbody id="leaveFormsHistoryData" style="text-align: center;"></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'plugins/footer.php';?>
<?php include 'plugins/js/leave_form_script.php';?>