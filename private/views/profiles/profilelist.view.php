<!-- MAIN -->
<main>
  <h1 class="title">PROFILE</h1>
  <ul class="breadcrumbs">
    <li><a href="javascript::void(0)">Home</a></li>
    <li class="divider"><i class='bx bx-chevron-right'></i></li>
    <li><a href="javascript::void(0)" class="active">Profile</a></li>
  </ul>
  <div class="info-data mb-5">
    <div class="row">
      <div class="col-lg-3">
        <div class="sticky-top" style="z-index:0;">
          <div class="card mb-4">
            <div class="card-body shadow-sm text-center">
              <img src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif" alt="avatar" loading="lazy" class="img-thumbnail rounded-circle img-fluid mb-2" style="width: 195px; height: 195px;" id="srcpicture">
              <h5 class="my-1" id="lblfullname">John Smith</h5>
              <p class="text-black-50 mb-1" id="lbltitle">Full Stack Developer</p>
              <!-- <p class="text-black-50 mb-4" id="lbladdress">Bay Area, San Francisco, CA</p>
              <div class="d-flex justify-content-center mb-2">
                <button type="button" data-mdb-button-init="" data-mdb-ripple-init="" class="btn btn-primary" data-mdb-button-initialized="true">Follow</button>
                <button type="button" data-mdb-button-init="" data-mdb-ripple-init="" class="btn btn-outline-primary ms-1" data-mdb-button-initialized="true">Message</button>
              </div> -->
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body shadow-sm p-0">
              <ul class="list-group list-group-flush rounded-3" id="group-list-info">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3 active" data-bs-toggle="tab" data-bs-target="#nav-profile-information" type="button" role="tab" aria-controls="nav-profile-information" aria-selected="true">
                  <a class="text-black-50">Profile Information</a>
                  <i class='bx bxs-chevron-right text-black-50'></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3" data-bs-toggle="tab" data-bs-target="#nav-growthgroup-information" type="button" role="tab" aria-controls="nav-growthgroup-information" aria-selected="false">
                  <a class="text-black-50">Growth-Group Information</a>
                  <i class='bx bxs-chevron-right text-black-50'></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3" data-bs-toggle="tab" data-bs-target="#nav-mentoring-information" type="button" role="tab" aria-controls="nav-mentoring-information" aria-selected="false">
                  <a class="text-black-50">Mentoring Information</a>
                  <i class='bx bxs-chevron-right text-black-50'></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3" data-bs-toggle="tab" data-bs-target="#nav-ggli-class" type="button" role="tab" aria-controls="nav-ggli-class" aria-selected="false">
                  <a class="text-black-50">GGLI Class Information</a>
                  <i class='bx bxs-chevron-right text-black-50'></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-profile-information" role="tabpanel" aria-labelledby="nav-profile-information-tab">
            <?php include("profileInformation.php"); ?>
          </div>
          <div class="tab-pane fade" id="nav-growthgroup-information" role="tabpanel" aria-labelledby="nav-growthgroup-information-tab">
            <?php include("growthGroupInformation.php"); ?>
          </div>
          <div class="tab-pane fade" id="nav-mentoring-information" role="tabpanel" aria-labelledby="nav-mentoring-information-tab">
            <?php include("mentoringInformation.php"); ?>
          </div>
          <div class="tab-pane fade" id="nav-ggli-class" role="tabpanel" aria-labelledby="nav-ggli-class-tab">Under Maintenance</div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php 
  include("profile.script.php");
?>