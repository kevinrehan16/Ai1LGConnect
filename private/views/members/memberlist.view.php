<!-- MAIN -->
<main>
  <div class='row'>
    <div class='col-md-3'>
      <h1 class="title">ALL MEMBERS</h1>
      <ul class="breadcrumbs">
        <li><a href="javascript::void(0)">Home</a></li>
        <li class="divider">/</li>
        <li><a href="javascript::void(0)" class="active">Members</a></li>
        <li class="divider">/</li>
        <li><a href="javascript::void(0)" class="active">All Members</a></li>
      </ul>
    </div>
    <div class="col-md-9">
      <div class="d-flex justify-content-end">
        <label class="pt-1" style="font-weight: 600;">Growth-Group Status:&nbsp;</label>
        <label id="ggLeader" for="chkbxggLeader" class="pt-1 custom-tooltip-bottom ggstatus" style="display: flex; align-items: center; justify-content: flex-start; cursor: pointer;"><i class='bx bxs-user-pin text-info'></i> <span class="label-text">Leader</span> <span class="tooltip-text-bottom">Filter by Leader</span></label>&nbsp;
        <!-- <label id="ggTimothy" for="chkbxggTimothy" class="pt-1 custom-tooltip-bottom ggstatus" style="display: flex; align-items: center; justify-content: flex-start; cursor: pointer;">|&nbsp;<i class='bx bxs-user-pin text-success'></i><span class="label-text">Timothy</span> <span class="tooltip-text-bottom">Filter by Timothy</span></label>&nbsp; -->
        <label id="ggMember" for="chkbxggMember" class="pt-1 custom-tooltip-bottom ggstatus" style="display: flex; align-items: center; justify-content: flex-start; cursor: pointer;">|&nbsp;<i class='bx bxs-user-pin text-warning' ></i><span class="label-text">Member</span> <span class="tooltip-text-bottom">Filter by Member</span></label>&nbsp;
        <label id="ggNoGg" for="chkbxggNoGg" class="pt-1 custom-tooltip-bottom ggstatus" style="display: flex; align-items: center; justify-content: flex-start; cursor: pointer; text-decoration: underlined !important;">|&nbsp;<i class='bx bxs-user-pin text-danger' ></i><span class="label-text">No Growth-Group</span> <span class="tooltip-text-bottom">Filter by No Growth-Group</span></label>
      </div>
    </div>
  </div>
  <div class="info-data mt-0">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body card-form mt-1">
            <div class="row">
              <div class="col-md-3">
                <div class="input-wrapper">
                  <input type="text" id="txtSearchInformation" class="form-control input-sm search-info txt-search" placeholder="Search information here...">
                  <i class="bx bx-search"></i> <!-- You can replace this with any icon (e.g., Font Awesome or an SVG) -->
                </div>
              </div>
              <div class="col-md-2">
                <select class="form-select input-sm txt-search" id="sltGender" onchange="getAllmembers();">
                  <option value="">-- Gender --</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-select input-sm txt-search" id="sltLifeStage" onchange="getAllmembers();">
                  <option value="">-- Life-Stage --</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="LiveIn">Live-In</option>
                  <option value="Separated">Separated</option>
                  <option value="Widow">Widow</option>
                  <option value="Divorced">Divorced</option>
                </select>
              </div>
              <div class="col-md-3">
                <div class="d-flex align-items-center justify-content-center btn-group" role="group" aria-label="Basic example">
                  <label for="chkbxNewMember" class="pt-1 custom-tooltip d-flex align-items-center justify-content-center" style="cursor: pointer;"><input type="checkbox" value="Yes" name="chkbxNewMember" id="chkbxNewMember" style="width: 20px; height: 20px;" checked>&nbsp;New Member <span class="tooltip-text">Added 2 years ago</span></label> &nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="button" class="btn btn-secondary" onclick="moreFilter();"><span class="bx bx-filter-alt"></span> Filter...</button>
                  <button type="button" class="btn btn-danger btn-md custom-tooltip" onclick="clearsearchinformations();"><span class="bx bx-reset"></span><span class="tooltip-text">Reset filters</span></button>
                </div>
              </div>
              <div class="col-md-2 text-end">
                <button type="button" class="btn btn-primary btn-md d-flex align-items-center justify-content-center gap-1 w-100" onclick="addnewmember();"><i class='bx bxs-user-plus'></i> Add Member</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Members List
          </div>
          <div class="card-body">
            <div class="table-parent">
              <table class="table table-bordered table-striped table-hover fixTable">
                <thead>
                  <th style="width: 5%;">Status</th>
                  <th>Member ID <span class='bx bxs-sort-alt mt-1' style='float: right; font-size: 15px;'></span></th>
                  <th>Full Name <span class='bx bxs-sort-alt mt-1' style='float: right; font-size: 15px;'></span></th>
                  <th>Nickname <span class='bx bxs-sort-alt mt-1' style='float: right; font-size: 15px;'></span></th>
                  <th>Gender</th>
                  <th>Life-Stage</th>
                  <th>Birthday</th>
                  <th>Email Address</th>
                  <th>Actions</th>
                </thead>
                <tbody id="tblAllMembers">
                  <!-- <?php
                    //$countNum = 0;
                    //foreach($members as $member){
                      //$countNum++;
                      //echo"
                        // <tr>
                        //   <td>".$member->memberid."</td>
                        //   <td>".$member->firstname." ".$member->lastname."</td>
                        //   <td>".$member->nickname."</td>
                        //   <td>".$member->gender."</td>
                        //   <td>".$member->lifestage."</td>
                        //   <td>".date('Y-m-d', strtotime($member->birthday))."</td>
                        //   <td>".$member->emailaddress."</td>
                        // </tr>
                      //";
                    //}
                  ?> -->
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            Number of Records: <span style="font-weight: 700;" id="cntTblAllMembers"></span>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php 
  include("modalmemberinformation.view.php");
  include("/modals/modalmorefilter.view.php");
  include("/modals/modalaudittrail.view.php");
  include("modalsatelliteslist.view.php");
  include("/scripts/members.script.php"); 
?>