<div id="modalmemberinformation" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">ADD NEW MEMBER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <form action="MemberList/add" method="POST" enctype="multipart/form-data"> -->
        <form name="members-form" id="members-form">
          <input type="hidden" name="my_csrf_token" id="my_csrf_token" value="<?=$_SESSION['my_csrf_token']?>">

          <div class="container pt-3">
            <div class="row">
              <h5 class="text-primary mt-3">PERSONAL INFORMATION</h5>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="lastname" class="form-label">Last Name</label>
                      <input type="text" class="form-control form-control-md txt_firstCapital letteronly inputant" data-label="Last Name" id="lastname" name="lastname">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="firstname" class="form-label">First Name</label>
                      <input type="text" class="form-control form-control-md txt_firstCapital letteronly inputant" data-label="First Name" id="firstname" name="firstname">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="middlename" class="form-label">Middle Name</label>
                      <input type="text" class="form-control form-control-md txt_firstCapital letteronly" id="middlename" name="middlename">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="nickname" class="form-label">Nickname</label>
                      <input type="text" class="form-control form-control-md txt_firstCapital letteronly" id="nickname" name="nickname">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="mb-3">
                      <label for="gender" class="form-label">Gender</label>
                      <select class="form-select inputant" data-label="Gender" aria-label="Default select example" id="gender" name="gender">
                        <option value="">--Select--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="emailaddress" class="form-label">Email Address</label>
                      <input type="text" class="form-control form-control-md inputant" data-label="Email Address" id="emailaddress" name="emailaddress" placeholder="example@gmail.com">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="mb-3">
                          <label for="birthday" class="form-label">Birthday</label>
                          <input type="date" class="form-control form-control-md inputant" data-label="Birthday" id="birthday" name="birthday" onchange="getage('birthday', 'age');">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="mb-3">
                          <label for="age" class="form-label">Age</label>
                          <input type="text" class="form-control form-control-md numonly" id="age" name="age" maxlength="3" readonly="true">
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="mobilenumber" class="form-label">Mobile Number</label>
                      <input type="text" class="form-control form-control-md phone-format numonly" id="mobilenumber" name="mobilenumber" placeholder="(+63) 999-999-9999">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="lifestage" class="form-label">Life Stage</label>
                      <select class="form-select inputant" aria-label="Default select example" data-label="Life Stage" id="lifestage" name="lifestage">
                        <option value="">--Select--</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="LiveIn">Live-In</option>
                        <option value="Separated">Separated</option>
                        <option value="Widow">Widow</option>
                        <option value="Divorced">Divorced</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="mobilenumber" class="form-label">Facebook Name</label>
                      <input type="text" class="form-control form-control-md txt_firstCapital letteronly" id="txtfacebook" name="txtfacebook">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 text-center">
                <div class="row">
                  <div class="col-md-12">
                    <div class="circle">
                      <img id="imagefileInput" src="https://heatherchristenaschmidt.com/wp-content/uploads/2011/09/facebook_no_profile_pic2-jpg.gif" class="rounded-circle img-fluid img-thumbnail" alt="Member photo">
                    </div>
                    <div class="container mt-1">
                      <input type="file" id="fileInput" name="fileInput" onchange="showimg();" class="custom-file-input">
                      <label for="fileInput" class="custom-file-button"><i class='bx bx-paperclip'></i> Upload photo</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <hr>
            <div class="row">
              <h5 class="text-primary mt-3">FAMILY INFORMATION</h5>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="txtspousename" class="form-label">Spouse Name</label>
                      <input type="text" class="form-control form-control-md txt_firstCapital" id="txtspousename" name="txtspousename" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="txtfathername" class="form-label">Father's Name</label>
                      <input type="text" class="form-control form-control-md txt_firstCapital" id="txtfathername" name="txtfathername">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="txtmother" class="form-label">Mother's Name</label>
                      <input type="text" class="form-control form-control-md txt_firstCapital" id="txtmother" name="txtmother">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-parent">
                      <table class="table table-bordered table-hover table-stripped fixTable">
                        <thead>
                          <tr style="padding: 0px !important;">
                            <th width='80%' style="vertical-align: middle;">Children Name</th>
                            <th width='15%' style="vertical-align: middle;">Age</th>
                            <th width='5%'><button type="button" class="btn btn-md btn-info d-flex align-items-center justify-content-center gap-1" onclick="appendChildForm();"><i class="bx bx-plus"></i></button></th>
                          </tr>
                        </thead>
                        <tbody id="tblChildren">
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>

            <div class="row">
              <h5 class="text-primary mt-3">ADDRESS INFORMATION</h5>
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="homeaddress" class="form-label">Home Address</label>
                  <input type="text" class="form-control form-control-md" id="homeaddress" name="homeaddress">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="country" class="form-label">Country</label>
                  <input type="text" class="form-control form-control-md txt_firstCapital" id="country" name="country">
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="region" class="form-label">Region</label>
                  <input type="text" class="form-control form-control-md txt_firstCapital" id="region" name="region">
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control form-control-md txt_firstCapital" id="city" name="city">
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="barangay" class="form-label">Barangay</label>
                  <input type="text" class="form-control form-control-md txt_firstCapital" id="barangay" name="barangay">
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <h5 class="text-primary mt-3">SCHOOL/WORK INFORMATION</h5>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="collegeschool" class="form-label">College School Name</label>
                  <input type="text" class="form-control form-control-md txt_firstCapital" id="collegeschool" name="collegeschool">
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="txtdegree" class="form-label">Degree</label>
                  <input type="text" class="form-control form-control-md txt_firstCapital" id="txtdegree" name="txtdegree">
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="txthighschool" class="form-label">High School Name</label>
                  <input type="text" class="form-control form-control-md txt_firstCapital" id="txthighschool" name="txthighschool">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="occupation" class="form-label">Occupation</label>
                  <input type="text" class="form-control form-control-md txt_firstCapital" id="occupation" name="occupation">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="industry" class="form-label">Industry</label>
                  <input type="text" class="form-control form-control-md txt_firstCapital" id="industry" name="industry">
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <h5 class="text-primary mt-3">CHRISTIAN EXPERIENCE</h5>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="txtwhenreceive" class="form-label">When did you receive Jesus Christ as Lord and Savior?</label>
                  <input type="date" class="form-control form-control-md" id="txtwhenreceive" name="txtwhenreceive">
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3" id="baptized-group">
                  <label for="txtwhenbaptized" class="form-label d-block">Have you been baptized by immersion? When?</label>
                  <div class="row">
                    <div class="col-md-3 mt-2">
                      <label style="cursor: pointer;"><input type="radio" name="baptized" value="Yes" class="baptizedwhen" style="width: 15px; height:15px; cursor: pointer;"> YES</label>
                    </div>
                    <div class="col-md-3 mt-2">
                      <label style="cursor: pointer;"><input type="radio" name="baptized" value="No" class="baptizedwhen" style="width: 15px; height:15px; cursor: pointer;"> NO</label>
                    </div>
                    <div class="col-md-6">
                      <input type="date" class="form-control form-control-md" id="txtwhenbaptized" name="txtwhenbaptized">
                    </div>
                  </div>
                  <span class="text-danger small" id="baptized-error" style="display:none; margin-left:10px;"></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="txtspiritualgifts" class="form-label">What are your Spiritual Gifts?</label>
                  <textarea cols='5' name="txtspiritualgifts" id="txtspiritualgifts" class="form-control" style="resize: none;"></textarea>
                </div>
              </div>
            </div>

            <!--<hr>
             <div class="d-none">
              
              <div class="row">
                <h5 class="text-primary mt-3">SERVICE INFORMATION</h5>
                <div class="col-md-6">
                  <div class="row">
                    <label for="churchname" class="form-label">Church Name <span class='text-danger'>*</span></label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-field form-control form-control-md input-click" id="churchname" name="churchname" readonly="true" placeholder="Click here to select the church" onclick="openModal('modalsatelliteslist');">
                      <span class="input-group-text"><i class="bx bx-search-alt-2"></i></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="row">
                    <div class="mb-3">
                      <label for="shortname" class="form-label">Short Name</label>
                      <input type="text" class="form-field form-control form-control-md" id="shortname" name="shortname" readonly="true">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="mb-3">
                      <label for="areapastor" class="form-label">Area Pastor</label>
                      <input type="text" class="form-field form-control form-control-md" id="areapastor" name="areapastor" readonly="true">
                      <input type="hidden" id="areapastorid" name="areapastorid">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <label for="satellitesname" class="form-label">Worship Place</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-field form-control form-control-md input-click" id="satellitesname" name="satellitesname" readonly="true" placeholder="Click here to select the church" onclick="openModal('modalsatelliteslist');">
                      <span class="input-group-text" ><i class="bx bx-search-alt-2"></i></span>
                      <input type="hidden" id="satellitesid" name="satellitesid">
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="mb-3">
                      <label for="worshipday" class="form-label">Worship Day</label>
                      <input type="text" class="form-field form-control form-control-md" id="worshipday" name="worshipday" readonly="true">
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="mb-3">
                      <label for="worshiptime" class="form-label">Worship Time</label>
                      <input type="text" class="form-field form-control form-control-md" id="worshiptime" name="worshiptime" readonly="true">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="satellitelocation" class="form-label">Worship Location</label>
                    <input type="text" class="form-control form-control-md" id="satellitelocation" name="satellitelocation" readonly="true">
                  </div>
                </div>
              </div>
            </div> -->

            <hr>

            <div class="row">
              <h5 class="text-primary mt-3">OTHER INFORMATION</h5>
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="comment" class="form-label">Purpose of Registration</label>
                  <textarea id="comment" class="form-control txtcapital" col="10" name="comment"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                <div class="mb-3">
                  <label for="prevchurch" class="form-label">Previous Church</label>
                  <input type="text" class="form-control form-control-md txt_firstCapital" id="prevchurch" name="prevchurch">
                </div>
              </div>
              <div class="col-md-5">
                <div class="mb-3">
                  <label for="txtaffiliation" class="form-label">Church Affiliation</label>
                  <input type="text" class="form-control form-control-md txt_firstCapital" id="txtaffiliation" name="txtaffiliation">
                </div>
              </div>
              <div class="col-md-2">
                <div class="mb-3">
                  <label for="memberstatus" class="form-label">Status</label>
                  <select class="form-select" aria-label="Default select example" id="memberstatus" name="memberstatus">
                    <option selected value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                  </select>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <h5 class="text-primary mt-3">ELDER'S RECOMMENDATION</h5>
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="txtconductedby" class="form-label">Interview Conducted By</label>
                  <input type="text" class="form-control form-control-md txt_firstCapital" id="txtconductedby" name="txtconductedby">
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="txtconducteddate" class="form-label">Membership Date</label>
                  <input type="date" class="form-control form-control-md" id="txtconducteddate" name="txtconducteddate">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <label for="txtrecfor" class="form-label">Recommendation for:</label>
                <div class="row" id="recfor-group">
                  <div class="col-md-6 pt-2">
                    <div class="mb-3">
                      <label style="cursor: pointer;"><input type="checkbox" class="recfor" id="forBaptism" name="forBaptism" value="No" style="width: 15px; height:15px; cursor: pointer;"> For Baptism</label>
                    </div>
                  </div>
                  <div class="col-md-6 pt-2">
                    <div class="mb-3">
                      <label style="cursor: pointer;"><input type="checkbox" class="recfor" id="forMembership" name="forMembership" value="No" style="width: 15px; height:15px; cursor: pointer;"> For Membership</label>
                    </div>
                  </div>
                  <span class="text-danger small" id="recfor-error" style="display:none; margin-left:10px;"></span>
                </div>
              </div>
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="txtreccomment" class="form-label">Comments</label>
                  <input type="text" class="form-control form-control-md" id="txtconductedcomment" name="txtconductedcomment">
                </div>
              </div>
            </div>
            
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSaveMember" class="btn btn-success btn-sm d-flex align-items-center justify-content-center gap-1" onclick="savenewmember();"><i class='bx bx-save' id="saveIcon"></i> Save</button>
        <!-- <button type="submit" class="btn btn-primary"><i class='bx bx-save'></i> Save</button> -->
        <button type="button" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center gap-1" data-bs-dismiss="modal"><i class='bx bx-x'></i> Close</button>
      </div>
    </div>
  </div>
</div>