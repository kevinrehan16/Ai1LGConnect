<div id="modalaudittrail" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-xxl">
    <div class="modal-content">
        <!-- <form action="churchList/add" method="POST"> -->
        <div class="modal-header">
          <h5 class="modal-title">AUDIT TRAIL</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid pt-3">
            <div class="row">
              <div class="col-md-12">
                <input type="hidden" id="memberIdLogs">
                <div class="table-parent-audittrail">
                  <table class="table table-bordered table-hover table-striped fixTable">
                    <thead>
                      <tr>
                        <th width="30%">Old Information</th>
                        <th width="30%">New Information</th>
                        <th width="16%">Change By</th>
                        <th width="7%">Action</th>
                        <th width="17%">Date & Time</th>
                      </tr>
                    </thead>
                    <tbody id="tblmodalaudittrail">
                      <!-- Append here... -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center gap-1" data-bs-dismiss="modal"><i class='bx bx-x'></i> Close</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
</div>

<script>
  var allLogs = [];
  const labelMap = {
    nickname: "Nickname",
    lastname: "Last Name",
    firstname: "First Name",
    middlename: "Middle Name",
    emailaddress: "Email Address",
    spousename: "Spouse's Name",
    fathername: "Father's Name",
    mothername: "Mother's Name",
    gender: "Gender",
    birthday: "Birthday",
    age: "Age",
    lifestage: "Life-Stage",
    mobilenumber: "Mobile Number",
    homeaddress: "Home Address",
    country: "Country",
    region: "Region",
    city: "City",
    barangay: "Barangay",
    occupation: "Occupation",
    industry: "Industry",
    collegeschool: "College School",
    collegedegree: "College Degree",
    highschool: "High School",
    receivedJesus: "When did you receive Jesus Christ as Lord and Savior?",
    baptizedImmersion: "Have you been baptized by immersion?",
    baptizeddate: "Date baptized?",
    spiritualgift: "What are your Spiritual Gifts?",
    picture: "Picture",
    purposereg: "Purpose of Registration",
    prevchurch: "Previous Church",
    churchaffiliation: "Church Affiliation",
    interviewby: "Interview Conducted By",
    membershipdate: "Membership Date",
    recForBaptism: "Recommendation for Baptism",
    recForMembership: "Recommendation for Membership",
    comment: "Comment",
    memberstatus: "Status",
    // Add more custom mappings as needed...
  };


  $(function(){
    // getAuditTrails();
  });

  function viewLogs(memberid){
    $("#memberIdLogs").val(memberid);
    getAuditTrails();
    $("#modalaudittrail").modal("show");
  }

  function getAuditTrails(){
    var logs = "";
    var memberIdLogs = $("#memberIdLogs").val();
    var auditInformation = '';

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/audittraillist/getAuditTrail',
      dataType: 'json',
      data: {
        memberIdLogs: memberIdLogs,
        auditInformation: auditInformation
      },
      beforeSend: function(){
        $("#tblmodalaudittrail").html("<tr><td colspan='5' class='text-center'>Loading Records...</td></tr>");
      },
      success: function(data){
        allLogs = data;
        // console.log(allLogs);

        let allLogsLength = Array.isArray(allLogs) ? allLogs.length : 0;
        let logs = "";

        if (allLogsLength > 0) {
          $.each(allLogs, function(index, log) {
            let logDetailsHtml = "";
            let logNewDetailsHtml = "";

            // Parse old_data safely
            try {
              const logOldObj = JSON.parse(log.old_data);
              for (let key in logOldObj) {
                const label = labelMap[key] || key;
                logDetailsHtml += `<ul class='ul-audit'><li><span class='text-black-50 fw-bold'>${label}:</span> ${logOldObj[key]}</li></ul>`;
              }
            } catch (e) {
              if(log.action_type != "INSERT")
              logDetailsHtml = `<span class='text-danger'>Old data parse error</span`;
              // console.warn(`Failed to parse old_data at index ${index}:`, log.old_data);
            }

            // Parse new_data safely
            try {
              const logNewObj = JSON.parse(log.new_data);
              for (let key in logNewObj) {
                const label = labelMap[key] || key;
                logNewDetailsHtml += `<ul class='ul-audit'><li><span class='text-black-50 fw-bold'>${label}:</span> ${logNewObj[key]}</li></ul>`;
              }
            } catch (e) {
              logNewDetailsHtml = `<span class='text-danger'>New data parse error</span>`;
              console.warn(`Failed to parse new_data at index ${index}:`, log.new_data);
            }
            
            var dateTime = log.change_timestamp.split(" ");
            var petsa = dateTime[0]; // Date part
            var oras = dateTime[1];  // Time part (if you need it later)

            logs += `<tr>
              <td>${logDetailsHtml}</td>
              <td>${logNewDetailsHtml}</td>
              <td>${log.changed_byName}</td>
              <td>${log.action_type}</td>
              <td>${formatDate(petsa)} | ${formatTime(oras)}</td>
            </tr>`;
          });
        } else {
          logs = `<tr><td class='text-center' colspan='9'>No Record Found</td></tr>`;
        }

        $("#tblmodalaudittrail").html(logs);
      }
    })
  }

</script>