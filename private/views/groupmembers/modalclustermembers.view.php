<div id="modalclustermembers" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- <form action="churchList/add" method="POST"> -->
        <div class="modal-header">
          <h5 class="modal-title"><span class="uppercase grpName">CLUSTER</span> MEMBERS <span id="lblggclusterid" class="d-none"></span> </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container pt-3">
            <div class="alert alert-info rounded-0">
              <strong><i class='bx bx-table'></i> <span class="modalgrpName">Muntinlupa Cluster</span></strong>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-4">
                <div class="card">
                  <img id="imageLeader" src="https://www.caspianpolicy.org/no-image.png" class="img-fluid img-thumbnail rounded-0" alt="Cluster Leader Photo" height="200px;">
                  <div class="card-body text-center">
                    <h6 class="mb-0" id="clusterleadername">Kevin Macandog</h6>
                    <small><span class="grpName">Cluster</span> Leader</small>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="alert alert-info rounded-0">
              <strong><i class='bx bxs-group'></i> Members</strong>
              <button class="btn btn-sm btn-primary" style="float: right !important;" onclick="viewMembers();"><i class="bx bx-user-plus text-white"></i></button>
            </div>
            <div class="row" id="divmembersinfo">
              <!-- <div class="col-md-4 mb-2">
                <div class="card">
                  <img id="imageLeader" src="https://www.caspianpolicy.org/no-image.png" class="img-fluid img-thumbnail rounded-0" alt="Cluster Leader Photo" height="200px;">
                  <div class="card-body text-center">
                    <h6 class="mb-0">Kevin Macandog</h6>
                    <small>Cluster Mentor</small>
                  </div>
                </div>
              </div> -->
              
              

            </div>          
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-md btn-danger" onclick="modalClose();"><i class='bx bx-x'></i> Close</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
</div>