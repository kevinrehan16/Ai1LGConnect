<div id="modalgrowthgroup" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <!-- <form action="churchList/add" method="POST"> -->
        <div class="modal-header">
          <h5 class="modal-title">NEW GROWTH GROUP</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container pt-3">
            <div class="row mb-3">
              <div class="col-md-8">
                <label>Growth Group Name</label>
                <input type="text" class="form-control input-md form-control-md txt_firstCapital inputant" id="txtgrowthgroupname">
              </div>
              <div class="col-md-4">
                <label>Abbreviation</label>
                <input type="text" class="form-control input-md form-control-md txtuppercase inputant" id="txtggabbreviation">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <label>Growth Group Leader</label>
                <input type="text" class="form-control input-md form-control-md txtuppercase inputant" id="txtggleader" readonly style="cursor: pointer;" onclick="selectLeader();">
                <input type="text" class="form-control input-md form-control-md d-none inputant" id="txtggleaderid" disabled>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-8">
                <label>Day Schedule</label>
                <select class="form-select input-md inputant" id="txtggday">
                  <option value="">--Select Day Schedule--</option>
                  <option value="Sunday">Sunday</option>
                  <option value="Monday">Monday</option>
                  <option value="Tuesday">Tuesday</option>
                  <option value="Wednesday">Wednesday</option>
                  <option value="Thursday">Thursday</option>
                  <option value="Friday">Friday</option>
                  <option value="Saturday">Saturday</option>
                </select>
              </div>
              <div class="col-md-4">
                <label>Time Schedule</label>
                <input type="time" class="form-control input-md form-control-md inputant" id="txtggtime">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-md btn-success" onclick="savenewgrowthgroup();"><i class='bx bx-save'></i> Save</button>
          <button type="button" class="btn btn-md btn-danger" onclick="cancelgrowthgroup();" data-bs-dismiss="modal"><i class='bx bx-x'></i> Close</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
</div>