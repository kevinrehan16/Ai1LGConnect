<!-- MAIN -->
<main>
  <h1 class="title">PASTORAL STAFF</h1>
  <ul class="breadcrumbs">
    <li><a href="javascript::void(0)">Home</a></li>
    <li class="divider">/</li>
    <li><a href="javascript::void(0)" class="active">Pastoral Staff</a></li>
  </ul>
  <div class="info-data">
    <div class="row">
      <div class="col-md-12">
        <div class="card pt-2 px-2 text-end">
          <!-- <div class="card-body"> -->
            <div class="row">
              <div class="col-md-3">
                <div class="input-group">
                  <input type="text" id="txtsearchpastorinfo" class="form-control search-info" placeholder="Search information..." aria-label="Search information..." aria-describedby="basic-search">
                  <span class="input-group-text" id="basic-search"><i class="bx bx-search"></i></span>
                </div>
              </div>
              <div class="col-md-9">
                <button type="button" class="btn btn-primary btn-sm mt-1" onclick="addnewpastor();"><i class='bx bxs-user-plus'></i> Add Pastor</button>
              </div>
            </div>
          <!-- </div> -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Pastors List
          </div>
          <div class="card-body">
            <div class="table-parent">
              <table class="table table-bordered table-striped table-hover fixTable">
                <thead>
                  <th style="width: 4%;">Status</th>
                  <th>Member ID</th>
                  <th>Title</th>
                  <th>Nickname</th>
                  <th>Full Name</th>
                  <th>Life-Stage</th>
                  <th>Birthday</th>
                  <th>Email Address</th>
                  <th>Actions</th>
                </thead>
                <tbody id="tblpastorslist">
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php 
  include("/modals/modalpastorsinformation.view.php");
  include("/modals/modalmemberslist.view.php");
  include("/modals/modalsatelliteslist.view.php");
  // include("modalsatelliteslist.view.php");
  include("/scripts/pastors.script.php"); 
?>