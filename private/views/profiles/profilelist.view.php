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
              <p class="text-black-50 mb-1" id="lbloccupation">Full Stack Developer</p>
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
                <li class="list-group-item d-flex justify-content-between align-items-center p-3 active">
                  <a class="text-black-50">Profile Information</a>
                  <i class='bx bxs-chevron-right text-black-50'></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <a class="text-black-50">Growth-Group Information</a>
                  <i class='bx bxs-chevron-right text-black-50'></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <a class="text-black-50">GGLI Class Information</a>
                  <i class='bx bxs-chevron-right text-black-50'></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="card">
          <div class="card-header">
            <i class="fas fa-users text-success"></i>Personal Information
          </div>
          <div class="card-body shadow-sm shadow-sm">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <label for="" class="col-md-4 fw-bold text-black-50">Nickname:</label>
                  <div class="col-md-8">
                    <span class="mb-0" id="lblnickname"></span>
                  </div>
                </div>
                <div class="row">
                  <label for="" class="col-md-4 fw-bold text-black-50">Gender:</label>
                  <div class="col-md-8">
                    <span class="mb-0" id="lblgender"></span>
                  </div>
                </div>
                <div class="row">
                  <label for="" class="col-md-4 fw-bold text-black-50">Life-Stage:</label>
                  <div class="col-md-8">
                    <span class="mb-0" id="lbllifestage"></span>
                  </div>
                </div>
                <div class="row">
                  <label for="" class="col-md-4 fw-bold text-black-50">Birthday:</label>
                  <div class="col-md-8">
                    <span class="mb-0" id="lblbirthday"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label for="" class="col-md-4 fw-bold text-black-50">Email:</label>
                  <div class="col-md-8">
                    <span class="mb-0" id="lblemail"></span>
                  </div>
                </div>
                <div class="row">
                  <label for="" class="col-md-4 fw-bold text-black-50">Facebook:</label>
                  <div class="col-md-8">
                    <span class="mb-0" id="lblfacebook"></span>
                  </div>
                </div>
                <div class="row">
                  <label for="" class="col-md-4 fw-bold text-black-50">Mobile:</label>
                  <div class="col-md-8">
                    <span class="mb-0" id="lblmobile"></span>
                  </div>
                </div>
                <div class="row">
                  <label for="" class="col-md-4 fw-bold text-black-50">Age:</label>
                  <div class="col-md-8">
                    <span class="mb-0" id="lblage"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <br>
        
        <div class="card">
          <div class="card-header">
            <i class="fas fa-users text-success"></i>Family Information
          </div>
          <div class="card-body shadow-sm">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <label class="text-black-50 fw-bold">Father's Name:</label>
                  </div>
                  <div class="col-md-7 text-left">
                    <p class="mb-1" id="lblfathername">Johny Smith</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <label class="text-black-50 fw-bold">Mother's Name:</label>
                  </div>
                  <div class="col-md-7 text-left">
                    <p class="mb-0" id="lblmothername">Susan Smith</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-4">
                    <label class="text-black-50 fw-bold">Spouse's Name:</label>
                  </div>
                  <div class="col-md-8 text-left">
                    <p class="mb-1" id="lblspousename">Andrea Smith</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label class="text-black-50 fw-bold">Children Name:</label>
                  </div>
                  <div class="col-md-8">
                    <ul class="mb-0 p-0" id="lblchildrenname">
                      <li><i class='bx bx-child text-success'></i> Child 1</li>
                      <li><i class='bx bx-child text-success'></i> Child 2</li>
                      <li><i class='bx bx-child text-success'></i> Child 3</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <br>

        <div class="card">
          <div class="card-header">
            <i class="fas fa-users text-success"></i>Address Information
          </div>
          <div class="card-body shadow-sm">
            <div class="row mb-2">
              <div class="col-md-12">
                <label class="text-black-50 fw-bold mb-2">Home Address:</label>
                <p class="mb-0" id="lblhomeaddress">#343 Zone 2 Sitio Pagkakaisa</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <label class="text-black-50 fw-bold mb-2">Barangay:</label>
                <p class="mb-0" id="lblbarangay">Sucat</p>
              </div>
              <div class="col-md-3">
                <label class="text-black-50 fw-bold mb-2">City:</label>
                <p class="mb-0" id="lblcity">Muntinlupa City</p>
              </div>
              <div class="col-md-3">
                <label class="text-black-50 fw-bold mb-2">Region:</label>
                <p class="mb-0" id="lblregion">National Capital Region</p>
              </div>
              <div class="col-md-3">
                <label class="text-black-50 fw-bold mb-2">Country:</label>
                <p class="mb-0" id="lblcountry">Philippines</p>
              </div>
            </div>
          </div>
        </div>

        <br>

        <div class="card">
          <div class="card-header">
            <i class="fas fa-users text-success"></i>School & Work Information
          </div>
          <div class="card-body shadow-sm">
            <div class="row">
              <div class="col-md-4">
                <label class="text-black-50 fw-bold mb-2">College School Name:</label>
                <p class="mb-0" id="lblcollegeschoolname">ABC University</p>
              </div>
              <div class="col-md-4">
                <label class="text-black-50 fw-bold mb-2">Degree:</label>
                <p class="mb-0" id="lbldegree">Bachelor of Science in Information Technology</p>
              </div>
              <div class="col-md-4">
                <label class="text-black-50 fw-bold mb-2">High School Name:</label>
                <p class="mb-0" id="lblhighschool">Pedro E Diaz</p>
              </div>
            </div>
            <hr>
            <div class="row mt-2">
              <div class="col-md-6">
                <label class="text-black-50 fw-bold mb-2">Occupation:</label>
                <p class="mb-0" id="lbloccupation">Software Engineer</p>
              </div>
              <div class="col-md-6">
                <label class="text-black-50 fw-bold mb-2">Industry:</label>
                <p class="mb-0" id="lblindustry">Information Technology</p>
              </div>
            </div>
          </div>
        </div>

        <br>

        <div class="card">
          <div class="card-header">
            <i class="fas fa-users text-success"></i>Christian Experience
          </div>
          <div class="card-body shadow-sm">
            <div class="row">
              <div class="col-md-4">
                <label class="text-black-50 fw-bold mb-2">When did you receive Jesus Christ as Lord and Savior?</label>
                <p class="mb-0" id="lblwhenreceive">January 1, 2020</p>
              </div>
              <div class="col-md-4">
                <label class="text-black-50 fw-bold mb-2">Have you been baptized by immersion? When?</label>
                <p class="mb-0"><span class="badge bg-success fw-light" id="lblbaptized">Yes</span> | <span id="lblwhenbaptized"> January 1, 2020 </span></p>
              </div>
              <div class="col-md-4">
                <label class="text-black-50 fw-bold mb-2">What are your Spiritual Gifts?:</label>
                <div class="mb-0" id="lblspiritualgifts">
                  <span class="badge bg-success fw-light">Teaching</span> <span class="badge bg-danger fw-light">Encouragement</span> <span class="badge bg-warning fw-light">Leadership</span>
                </div>
              </div>
            </div>
            <hr>
            <div class="row mt-2">
              <div class="col-md-12 mb-3">
                <label class="text-black-50 fw-bold mb-2">Purpose of Registration</label>
                <p class="mb-0" id="lblpurposereg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 
              </div>
              <div class="col-md-6">
                <label class="text-black-50 fw-bold mb-2">Previous Church:</label>
                <p class="mb-0" id="lblpreviouschurch">ABC Church</p>
              </div>
              <div class="col-md-6">
                <label class="text-black-50 fw-bold mb-2">Church Affiliation:</label>
                <p class="mb-0" id="lblchurchaffiliation">Be Baptist</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</main>

<?php 
  include("profile.script.php");
?>