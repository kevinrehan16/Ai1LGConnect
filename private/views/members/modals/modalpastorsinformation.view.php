<div id="modalpastorsinformation" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <!-- <form action="churchList/add" method="POST"> -->
        <div class="modal-header">
          <h5 class="modal-title">ADD NEW PASTOR</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container pt-3">
            
            <div class="col-md-12 text-center">
              <div class="row">
                <div class="col-md-12">
                  <div class="circle">
                    <img id="imagefileInput" src="https://heatherchristenaschmidt.com/wp-content/uploads/2011/09/facebook_no_profile_pic2-jpg.gif" class="rounded-circle img-fluid img-thumbnail" alt="Member photo">
                  </div>
                  <h5 id="nickname">---</h5>
                </div>
              </div>
            </div>
            <hr>

            <div class="row mb-2">
              <label for="" class="col-md-4 mt-2">Title</label>
              <div class="col-md-8">
                <select class="form-select input-md" name="pastorlevel" id="pastorlevel">
                  <option value="Pastor">Pastor</option>
                  <option value="Assistant Pastor">Assistant Pastor</option>
                  <option value="Senior Pastor">Senior Pastor</option>
                </select>
              </div>
            </div>
            <div class="row mb-2">
              <label for="" class="col-md-4 mt-2">Full Name</label>
              <div class="col-md-8">
                <div class="input-group input-click" onclick="openModal('modalmemberslist')">
                  <input type="hidden" class="form-control input-md" name="defaultid" id="defaultid">
                  <input type="hidden" class="form-control input-md" name="memberid" id="memberid">
                  <input type="text" class="form-control input-md input-click" name="fullname" id="fullname" readonly="true" placeholder="Click here...">
                  <span class="input-group-text"><i class="bx bx-search-alt-2"></i></span>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label for="" class="col-md-4 mt-2">Email Address</label>
              <div class="col-md-8">
                <input type="text" class="form-control input-md" name="emailaddress" id="emailaddress" readonly="true">
              </div>
            </div>
            <div class="row mb-2">
              <label for="" class="col-md-4 mt-2">Contact Number</label>
              <div class="col-md-8">
                <input type="text" class="form-control input-md" name="contactnumber" id="contactnumber" readonly="true">
              </div>
            </div>
            <div class="row mb-2">
              <label for="" class="col-md-4 mt-2">Church Name</label>
              <div class="col-md-8">
                <div class="input-group input-click" onclick="openModal('modalsatelliteslist');">
                  <input type="hidden" class="form-control input-md" name="churchid" id="churchid">
                  <input type="text" class="form-control input-md input-click" name="churchname" id="churchname" readonly="true" placeholder="Click here...">
                  <span class="input-group-text"><i class="bx bx-search-alt-2"></i></span>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label for="" class="col-md-4 mt-2">Place of Worship</label>
              <div class="col-md-8">
              <input type="hidden" class="form-control input-md" name="satellitesid" id="satellitesid">
                <input type="text" class="form-control input-md" name="satellitesname" id="satellitesname" readonly="true">
              </div>
            </div>

          </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-md btn-success" onclick="savepastorinformation();"><i class='bx bx-save'></i> Save</button>
          <button type="button" class="btn btn-md btn-danger" onclick="closeModal('modalpastorsinformation');"><i class='bx bx-x'></i> Close</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
</div>