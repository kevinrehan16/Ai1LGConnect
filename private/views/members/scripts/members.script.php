<script>
  $(function(){
    var allMembers = [];
    // alert("wew");
    $(".fixTable").tableHeadFixer(); 

    getAllmembers();
    satellites();

    $('#modalmemberinformation').on('shown.bs.modal', function () {
      $('#txtspiritualgifts').select2({
        placeholder: "Select Spiritual Gifts",
        allowClear: true,
        dropdownParent: $('#modalmemberinformation'),
        width: '100%'
      });
    });

    $('.recfor').each(function(){
      $(this).click(function(){
        if($("#"+ this.id).prop("checked")){
          $("#"+this.id).val("Yes");
        }else{
          $("#"+this.id).val("No");
        }
      });
    });

    $("#lifestage").change(function(){
      if($(this).val() == "Single" || $(this).val() == ""){
        $("#txtspousename").prop("readonly", true).val("");
      }else{
        $("#txtspousename").prop("readonly", false);
      }
    });

    $('.search-info').keyup(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            getAllmembers();
        }else if(keycode == '8'){
            getAllmembers();
        }
    });

    $(".multiCollapse").each(function(){
      var multiCollapse = this.id;
      $('#multi'+multiCollapse).on('show.bs.collapse', function () {
        $('#icon'+multiCollapse).removeClass('bxs-chevron-left').addClass('bxs-chevron-down');
      });

      $('#multi'+multiCollapse).on('hide.bs.collapse', function () {
        $('#icon'+multiCollapse).removeClass('bxs-chevron-down').addClass('bxs-chevron-left');
      });
    });

    $(".baptizedwhen").each(function(){
      $(this).click(function(){
        if($(this).val() == "Yes"){
          $("#txtwhenbaptized").prop("readonly", false);
        }
        else{
          $("#txtwhenbaptized").prop("readonly", true).val('');
        }
      })
    });
    
    $(".srchbaptizedwhen").each(function(){
      $(this).click(function(){
        if(this.id != "baptizedwhenNo"){
          $("#srchbaptizeddatefrom").prop("readonly", false);
          $("#srchbaptizeddateto").prop("readonly", false);
        }
        else{
          $("#srchbaptizeddatefrom").prop("readonly", true).val('');
          $("#srchbaptizeddateto").prop("readonly", true).val('');
        }
      })
    });

    $(".srchRecommendation").each(function(){
      $(this).click(function(){
        if(this.id != "RecommendationAll"){
          $(".srchRecommendation").val("No");
          $("#RecommendationAll").val("All");
          $("#"+this.id).val("Yes");
        }else{
          $(".srchRecommendation").val("No");
          $("#RecommendationAll").val("All");
        }
      })
    });

    $("#chkbxNewMember").change(function(){
      if($(this).prop("checked") === true){
        $(this).val("Yes");
      }
      else{
        $(this).val("No");
      }

      getAllmembers();
    });

    $(".ggstatus").each(function(){
      $(this).click(function(){
        if($(this).hasClass('ggstatus-active') == false){
          $(this).addClass('ggstatus-active');
        }
        else{
          $(this).removeClass('ggstatus-active');
        }

        getAllmembers();
      });
    });

  });

  function searchFilter(){
    getAllmembers();
    closeModal("modalmorefilter");
  }

  function clearsearchinformations(){
    $(".txt-search").val('');
    $(".srchRecommendation").val("No");
    $("#RecommendationAll").val("All").click();
    $("#srchdateaddeddatefrom").val('');
    $("#srchdateaddeddateto").val('');
    $("#srchMembershipdatefrom").val('');
    $("#srchMembershipdateto").val('');
    
    $("#baptizedwhenAll").click();
    $("#MemStatusAll").click();

    $(".filterCollapse").each(function(){
      if($(this).hasClass('collapsed') == false){
        $(this).click();
      }
    });

    $(".ggstatus").each(function(){
      $(this).removeClass('ggstatus-active');
    });

    $("#srchbdaydatefrom").val('');
    $("#srchbdaydateto").val('');

    getAllmembers();
  }
  
  function getAllmembers(){
    var dataRecord = '';
    var mfullname = '';
    var txtSearchInformation = $("#txtSearchInformation").val();
    var sltGender = $("#sltGender").val();
    var sltLifeStage = $("#sltLifeStage").val();

    var recommendationfor = "";
    $(".srchRecommendation:checked").each(function(){
      if($(this).val() != "All"){
        recommendationfor = this.id.split("Recommendation")[1];
      }
    });

    var srchdateaddeddatefrom = $("#srchdateaddeddatefrom").val();
    var srchdateaddeddateto = $("#srchdateaddeddateto").val();
 
    var srchMembershipdatefrom = $("#srchMembershipdatefrom").val();
    var srchMembershipdateto = $("#srchMembershipdateto").val();

    var baptizedImmersion = "";
    $(".srchbaptizedwhen:checked").each(function(){
      if($(this).val() != "All"){
        baptizedImmersion = $(this).val();
      }
    });

    var srchbaptizeddatefrom = $("#srchbaptizeddatefrom").val();
    var srchbaptizeddateto = $("#srchbaptizeddateto").val();

    var memberStatus = "";
    $(".srchMemStatus:checked").each(function(){
      if($(this).val() != "All"){
        memberStatus = $(this).val();
      }
    });

    var srchbdaydatefrom = $("#srchbdaydatefrom").val();
    var srchbdaydateto = $("#srchbdaydateto").val();
    var chkbxNewMember = $("#chkbxNewMember").val();

    var ggLeader = '';
    // var ggTimothy = '';
    var ggMember = '';
    var ggNoGg = '';
    $(".ggstatus-active").each(function(){
      if(this.id == "ggLeader"){
        ggLeader = "Yes";
      }
      // else if(this.id == "ggTimothy"){
      //   ggTimothy = "Yes";
      // }
      else if(this.id == "ggMember"){
        ggMember = "Yes";
      }
      else{
        ggNoGg = "Yes";
      }
    });


    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/memberlist/getMembers',
      dataType: 'json',
      data: {
        // joinTable: 'churches',
        txtSearchInformation: txtSearchInformation,
        sltGender: sltGender,
        sltLifeStage: sltLifeStage,
        recommendationfor: recommendationfor,
        srchdateaddeddatefrom: srchdateaddeddatefrom,
        srchdateaddeddateto: srchdateaddeddateto,
        srchMembershipdatefrom: srchMembershipdatefrom,
        srchMembershipdateto: srchMembershipdateto,
        baptizedImmersion: baptizedImmersion,
        srchbaptizeddatefrom: srchbaptizeddatefrom,
        srchbaptizeddateto: srchbaptizeddateto,
        memberStatus: memberStatus,
        srchbdaydatefrom: srchbdaydatefrom,
        srchbdaydateto: srchbdaydateto,
        chkbxNewMember: chkbxNewMember,
        ggLeader: ggLeader,
        // ggTimothy: ggTimothy,
        ggMember: ggMember,
        ggNoGg: ggNoGg
      },
      beforeSend: function(){
        $("#tblAllMembers").html("<tr><td class='text-center' colspan='9'>Loading Records...</td></tr>");
      },
      success: function(data){
        // console.log(data);

        allMembers = data;
        let allMembersLength = Array.isArray(allMembers) ? allMembers.length : 0;

        if(allMembersLength > 0){
          $.each(data, function(index, memberInfo){
            // console.log(memberInfo);
            
            var memPicture = 'https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif';
            if(memberInfo.picture != ""){
              memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+escapeHtml(memberInfo.memberid)+"/"+escapeHtml(memberInfo.picture)+"";
            }
            else{
              // Placeholder image with the letter
              memPicture = "https://ui-avatars.com/api/?name="+escapeHtml(memberInfo.firstname)+"+"+escapeHtml(memberInfo.lastname); 
            }

            var leaderIcon = '';
            if(memberInfo.ggLeader != ''){
              leaderIcon = "<i class='bx bxs-user-pin text-info custom-tooltip-bottom' style='cursor: pointer;'><span class='tooltip-text-bottom'>Leader</span></i>";
            }
            // var timothyIcon = '';
            // if(memberInfo.ggTimothy != ''){
            //   timothyIcon = "<i class='bx bxs-user-pin text-success custom-tooltip-bottom' style='cursor: pointer;'><span class='tooltip-text-bottom'>Timothy</span></i>";
            // }
            var memberIcon = '';
            if(memberInfo.ggMember != ''){
              memberIcon = "<i class='bx bxs-user-pin text-warning custom-tooltip-bottom' style='cursor: pointer;'><span class='tooltip-text-bottom'>Member</span></i>";
            }else{
              memberIcon = "<i class='bx bxs-user-pin text-danger custom-tooltip-bottom' style='cursor: pointer;'><span class='tooltip-text-bottom'>No Growth-Group</span></i>";
            }

            mfullname = memberInfo.firstname + " " + memberInfo.lastname;

            // <div class='form-group d-flex justify-content-center'>"+
            //                     "<div class='checkbox toggle-border memStatusToggle "+toggleClass+"' id='chk-"+memberInfo.id+"-toggle'>"+
            //                       "<input type='checkbox' name='memStatus' class='memStatus' id='chk-"+memberInfo.id+"' "+chkStatus+">"+
            //                     "</div>"+
            //                   "</div>
            var statusClass = (memberInfo.memberstatus === "Active") ? 'checked' : ''; // Default to checked if status is 'ACTIVE'
            var statusLabel = (memberInfo.memberstatus === "Active") ? 'Active' : 'Inactive'; // Set the label accordingly
        

            dataRecord += "<tr>"+
                            "<td>"+
                              "<input type='checkbox' id='chk-"+escapeHtml(memberInfo.id)+"' data-toggle='toggle' data-onstyle='success' data-offstyle='danger' data-size='xs' " + statusClass + " data-on='Active' data-off='Inactive' data-style='ios' value='" + statusLabel + "' onchange='updateMemberStatus(\""+escapeHtml(memberInfo.id)+"\", \""+mfullname+"\", \""+escapeHtml(memberInfo.memberstatus)+"\")'>"+
                            "</td>"+
                            "<td>"+escapeHtml(memberInfo.memberid)+"</td>"+
                            "<td><img src='"+memPicture+"' alt='Image 1' loading='lazy'> &nbsp;<a href='<?=ROOT_PUBLIC?>/profilelist/"+escapeHtml(memberInfo.id)+"'>"+escapeHtml(memberInfo.firstname)+" "+escapeHtml(memberInfo.lastname)+"</a><span style='float: right;'>"+leaderIcon+""+memberIcon+"</span></td>"+
                            "<td>"+escapeHtml(memberInfo.nickname)+"</td>"+
                            "<td>"+escapeHtml(memberInfo.gender)+"</td>"+
                            "<td>"+escapeHtml(memberInfo.lifestage)+"</td>"+
                            "<td>"+ formatDate(escapeHtml(memberInfo.birthday))+"</td>"+
                            "<td>"+escapeHtml(memberInfo.emailaddress)+"</td>"+
                            "<td class='td-btn'>"+
                              "<i class='btn-icon bx bxs-edit' title='Edit information' onclick='editInformation(\""+escapeHtml(memberInfo.id)+"\");'></i>"+
                              "<i class='btn-icon bx bx-notepad' title='View Audit Trail' onClick='viewLogs(\""+escapeHtml(memberInfo.memberid)+"\");'></i>"+
                              // "<i class='btn-icon bx bx-task-x' title='Remove'></i>"+
                            "</td>"+
                          "</tr>";
          });
        }
        else{
          dataRecord = "<tr><td class='text-center' colspan='9'>No Record Found</td></tr>";
        }

        $("#tblAllMembers").html(dataRecord);
      },
      complete: function(){
        let allMembersLength = Array.isArray(allMembers) ? allMembers.length : 0;
        $("#cntTblAllMembers").text(allMembersLength);

        $('input[data-toggle="toggle"]').bootstrapToggle();

      }
    });
  }

  function updateMemberStatus(defaultID, mfullname, memstatus){
    var toggleDiv = $("#chk-" + defaultID).closest('.toggle');

    if(memstatus == "Active"){     
      toggleDiv.removeClass('btn-success').addClass('btn-danger off');
      $("#chk-" + defaultID).prop("checked", false);      
    }
    else{
      toggleDiv.removeClass('btn-danger off').addClass('btn-success');
      $("#chk-" + defaultID).prop("checked", true);
    }

    Swal.fire({
      title: "Are you sure?",
      text: "Do you want to change the status of this member, "+mfullname+"?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, update it!"
    }).then((result) => {
      if (result.isConfirmed) {
        var memstat = '';
        
        if(memstatus == "Active"){     
          memstat = "Inactive";
        }
        else{
          memstat = "Active";
        }

        
        $.ajax({
            type:"POST",
            url: '<?=ROOT_PUBLIC?>/memberlist/updateMemberStatus',
            data: {
              defaultID: defaultID,
              memstatus: memstat
            },
            success:function(data){
              Swal.fire({
                title: "STATUS CHANGED!",
                text: "Status has been changed successfully.",
                icon: "success"
              });
            },
            complete: function(){
              getAllmembers();
            },
        });
      }else{
        var toggleDiv = $("#chk-" + defaultID).closest('.toggle');

        if(memstatus == "Active"){     
          toggleDiv.removeClass('btn-danger off').addClass('btn-success');
          $("#chk-" + defaultID).prop("checked", true);
        }
        else{
          toggleDiv.removeClass('btn-success').addClass('btn-danger off');
          $("#chk-" + defaultID).prop("checked", false);
        }
      }
    });
  }

  function addnewmember(){
    $(".custom-file-button").html("<i class='bx bx-paperclip'></i>  Upload photo");
    $("#members-form .form-control").val('');
    $("#members-form .form-select").val('');
    $("#members-form input[type='radio']").prop('checked', false);
    $("#members-form input[type='checkbox']").prop('checked', false).val("No");
    $("#imagefileInput").prop("src", "https://heatherchristenaschmidt.com/wp-content/uploads/2011/09/facebook_no_profile_pic2-jpg.gif");
    $("#memberstatus").val("Active");
    $("#member_id").remove();
    $("#btnSaveMember").prop("disabled", false);
    $("#saveIcon")
    .removeClass("loading-spinner")
    .addClass("bx bx-save");
    
    $("#txtconducteddate").val("<?php echo date('Y-m-d'); ?>");
    
    openModal("modalmemberinformation");
  }

  function savenewmember(){
    let isValid = true;
    let errorMsg = [];

    // Loop through all fields with the class 'inputant'
    $(".inputant").each(function() {
        let value = $(this).val().trim();
        let label = $(this).attr("data-label") || $(this).attr("placeholder") || $(this).attr("name") || "This field";
        if (!value) {
            isValid = false;
            errorMsg.push(label + " is required.");
            $(this).css("border-color", "red");
        } else {
            // Basic sanitization
            $(this).val($("<div>").text(value).html());
            $(this).css("border-color", "");
        }
    });

    // Email format validation (if any .inputant has type email)
    $(".inputant[type='email']").each(function() {
        let email = $(this).val().trim();
        if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            isValid = false;
            errorMsg.push("Invalid email format.");
            $(this).css("border-color", "red");
        }
    });

    if (!$('input[name="baptized"]:checked').val()) {
      isValid = false;
      $("#baptized-group").addClass("error");
      $("#baptized-error").text("This field is required.").show();
      errorMsg.push("Have you been baptized by immersion? field is required.");
    } else {
      $("#baptized-group").removeClass("error");
      $("#baptized-error").hide();
    }

    if (!$('input[name="forBaptism"]').is(':checked') && !$('input[name="forMembership"]').is(':checked')) {
      isValid = false;
      $("#recfor-group").addClass("error");
      $("#recfor-error").text("Please select at least one recommendation.").show();
      errorMsg.push("Recommendation for field is required.");
    } else {
      $("#recfor-group").removeClass("error");
      $("#recfor-error").hide();
    }

    if (!isValid) {
        Swal.fire({
          icon: "error",
          title: "Validation Error",
          html: "<ul>" + errorMsg.map(e => "<li>" + e + "</li>").join('') + "</ul>",
          customClass: {
            popup: 'swal2-validation-popup'
          }
        });
        return;
    }
    
    var dataMembers = new FormData($('#members-form')[0]);
    var isUpdate = $('#member_id').length > 0;

    // Create an array to store the children data
    var childrenData = [];
    // Loop through the children table rows
    $("#tblChildren tr").each(function() {
        var childId = $(this).find('.child-id').val();
        var childName = $(this).find('.child-name').val();
        var childAge = $(this).find('.child-age').val();

        if (childName && childAge) {
            // Push the child data into the childrenData array
            childrenData.push({
                cid: childId,
                name: childName,
                age: childAge
            });
        }
    });

    // Append the entire children array to FormData as a JSON string
    dataMembers.append('children', JSON.stringify(childrenData));

    $.ajax({
        type:"POST",
        url: isUpdate ? '<?=ROOT_PUBLIC?>/memberlist/updatemember' : '<?=ROOT_PUBLIC?>/memberlist/savenewmember',
        data: dataMembers,
        mimeType: "multipart/form-data",
        contentType: false,
        cache: false,
        dataType: 'json',
        processData: false,
        beforeSend: function(){
          $("#btnSaveMember").prop("disabled", true);

          $("#saveIcon")
          .removeClass("bx-save")
          .addClass("loading-spinner")
          .removeClass("bx");
        },
        success:function(data){
          console.log(data);
          
          if(data.statusMsg == "Success"){
            Swal.fire({
              title: isUpdate ? "UPDATE INFORMATION" : "NEW MEMBER",
              text: data.alertMsg,
              icon: "success"
            });

            getAllmembers();
            closeModal("modalmemberinformation");
          }
          else{

            $.each(data.alertMsg, function(index, errorMsg){
              // $(".inputant").css("border-color", "red"); 
            });

            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Something went wrong!",
              footer: '<i class="bx bx-info-circle" ></i> Some of the fields are empty.'
            });
          }
        },
        complete: function(){
          $("#btnSaveMember").prop("disabled", false);

          $("#saveIcon")
          .removeClass("loading-spinner")
          .addClass("bx bx-save");
        }
    });
  }

  function appendChildForm(){
    var len = $("#tblChildren tr").length;
    var formCount = 1;

    if(len > 0){
      var lasttr = $("#tblChildren").find("tr:last-child").attr("id").split('children-')[1];
      formCount = Number(lasttr) + 1;
    }

    $("#tblChildren").append("<tr id='children-"+formCount+"'>"+
                              "<td><input type='hidden' name='childid[]' class='child-id'><input type='text' name='childname[]' class='form-control child-name input-sm m-0 txt_firstCapital'></td>"+
                              "<td><input type='text' name='childage[]' class='form-control child-age input-sm m-0 numonly text-center' maxlength='3'></td>"+
                              "<td><button type='button' class='btn btn-danger btn-md d-flex align-items-center justify-content-center gap-1' onclick='removeChildForm(\"children-"+formCount+"\");'><span class='bx bx-trash'></span></button></td>"+
                            "</tr>");
    validators();
  }

  function removeChildForm(rowId) {
    // Find the row by id
    $("#"+rowId).remove();
    
    // Optionally, renumber the rows if needed
    $("#tblChildren tr").each(function(index) {
      var newRowId = "children-" + (index + 1);
      $(this).attr('id', newRowId);
      $(this).find('.btn-danger').removeAttr("onclick").attr("onclick", "removeChildForm(\""+newRowId+"\")");
    });

    // Update the formCount
    formCount = $("#tblChildren tr").length;
    validators();
  }

  function moreFilter(){
    openModal("modalmorefilter");
  }

  function satellites(){
    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/satellitelist',
      // dataType: 'json',
      data: {
        joinTable: 'churches'
      },
      success: function(data){
        // console.log(data);
        $("#tblSatellites").html(data);
      }
    });
  }

  function selectSatellite(satelliteid){
    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/satellitelist/selectsatellite',
      dataType: 'json',
      data: {
        joinTable: 'churches',
        column: 'satellitesid',
        value: satelliteid,
      },
      success: function(data){
        // console.log(data[0]['churchid']);

        $("#churchname").val(data[0]['churchname']);
        $("#satellitesid").val(data[0]['satellitesid']);
        $("#shortname").val(data[0]['shortname']);
        $("#areapastor").val(data[0]['areapastor']);
        $("#areapastorid").val(data[0]['areapastorid']);
        $("#satellitesname").val(data[0]['satellitesname']);
        $("#worshipday").val(data[0]['worshipday']);
        $("#worshiptime").val(data[0]['worshiptime']);
        $("#satellitelocation").val(data[0]['satellitelocation']);

        closeModal("modalsatelliteslist");
      }
    });
  }

  function editInformation(memberId){
    const memberInformation = allMembers.filter(member => member.id === memberId);
    const memInfo = memberInformation[0];

    $("#member_id").remove();
    $('#members-form').append('<input type="hidden" name="member_id" id="member_id" value="' + memberId + '">');
    
    $("#lastname").val(memInfo.lastname);
    $("#firstname").val(memInfo.firstname);
    $("#middlename").val(memInfo.middlename);
    $("#nickname").val(memInfo.nickname);
    $("#gender").val(memInfo.gender);
    $("#emailaddress").val(memInfo.emailaddress);

    $("#birthday").val(memInfo.birthday);
    $("#age").val(memInfo.age);
    $("#mobilenumber").val(memInfo.mobilenumber);
    $("#lifestage").val(memInfo.lifestage);
    $("#txtfacebook").val(memInfo.facebookname);

    var memPicture = '';
    if(memInfo.picture != ""){
      memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+memInfo.memberid+"/"+memInfo.picture+"";
      $(".custom-file-button").html("<i class='bx bx-paperclip'></i>  Change photo");
    }
    else{
      // Placeholder image with the letter
      memPicture = "https://ui-avatars.com/api/?name="+memInfo.firstname+"+"+memInfo.lastname;
      $(".custom-file-button").html("<i class='bx bx-paperclip'></i>  Upload photo");
    }
    $("#imagefileInput").attr("src", memPicture);

    $("#txtspousename").val(memInfo.spousename);
    $("#txtfathername").val(memInfo.fathername);
    $("#txtmother").val(memInfo.mothername);

    $("#homeaddress").val(memInfo.homeaddress);
    $("#country").val(memInfo.country);
    $("#region").val(memInfo.region);
    $("#city").val(memInfo.city);
    $("#barangay").val(memInfo.barangay);
    $("#collegeschool").val(memInfo.collegeschool);
    $("#txtdegree").val(memInfo.collegedegree);
    $("#txthighschool").val(memInfo.highschool);
    $("#occupation").val(memInfo.occupation);
    $("#industry").val(memInfo.industry);

    $("#txtwhenreceive").val(memInfo.receivedJesus);
    $("#txtwhenbaptized").val(memInfo.baptizeddate);
    $(".baptizedwhen[value='"+memInfo.baptizedImmersion+"']").prop("checked", true);
    $("#txtspiritualgifts").val(memInfo.spiritualgift);
    
    $("#comment").val(memInfo.purposereg);
    $("#prevchurch").val(memInfo.prevchurch);
    $("#txtaffiliation").val(memInfo.churchaffiliation);
    $("#memberstatus").val(memInfo.memberstatus);

    $("#txtconductedby").val(memInfo.interviewby);
    $("#forBaptism").prop("checked", memInfo.recForBaptism === 'Yes' ? true : false).val(memInfo.recForBaptism);
    $("#forMembership").prop("checked", memInfo.recForMembership === 'Yes' ? true : false).val(memInfo.recForMembership);
    $("#txtconducteddate").val(memInfo.membershipdate);
    $("#txtconductedcomment").val(memInfo.comment);

    var tblChildren = "";
    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/memberlist/getMemberChildren',
      data: {memberId: memInfo.memberid},
      dataType: 'json',
      success: function(data){
        console.log(data);

        $.each(data, function(index, child) {
          tblChildren += `<tr id="children-${index + 1}">
            <td>
              <input type="hidden" name="childid[]" value="${child.id}" class="child-id">
              <input type="text" name="childname[]" value="${child.childname}" class="form-control child-name input-sm m-0 txt_firstCapital">
            </td>
            <td>
              <input type="text" name="childage[]" value="${child.childage}" class="form-control child-age input-sm m-0 numonly text-center" maxlength="3">
            </td>
            <td>
              <button type="button" class="btn btn-danger btn-md d-flex align-items-center justify-content-center gap-1"
                onclick="removeChildForm('children-${index + 1}')">
                <span class="bx bx-trash"></span>
              </button>
            </td>
          </tr>`;
        });

        $("#tblChildren").html(tblChildren);

      }
    })

    openModal("modalmemberinformation");
  }
</script>