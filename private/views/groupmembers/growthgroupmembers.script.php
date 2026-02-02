<script>
  var members = [];
  var growthgroupmembersarray = [];
  var colors = ['#FF5733', '#33FF57', '#3357FF', '#F1C40F', '#8E44AD', '#E74C3C', '#3498DB', '#2ECC71'];

  $(function(){
    growthgroupmembers();
    getmemberslist();

    $(".fixTable").tableHeadFixer();

    $('#txtSearchInformation').keyup(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
          getmemberslist();
      }else if(keycode == '8'){
          getmemberslist();
      }
    });
  });

  // Function to shuffle the colors array
  function shuffleColors(colors) {
    for (let i = colors.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [colors[i], colors[j]] = [colors[j], colors[i]]; // Swap
    }
    return colors;
  }

  function growthgroupmembers(){
    var growthgroupmembers = "";

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/growthgroupmembers/getgrowthgroupmembers',
      dataType: 'json',
      data: {
        joinTable: 'members'
      },
      success: function(data){
        // console.log(data);
        growthgroupmembersarray = data;

        // console.log(growthgroupmembersarray);
        for(cnt in data){
          // console.log(data[cnt]);
          var shuffledColors = shuffleColors([...colors]);

          var members = "";
          for(cntN in data[cnt].memberid){
            var randomColor = shuffledColors[cntN % shuffledColors.length];
            var name = data[cnt].memberid[cntN].firstname;
            var fullname = data[cnt].memberid[cntN].firstname + " " + data[cnt].memberid[cntN].lastname;
            members += "<li class='icon-circle' style='background-color: "+randomColor+"'><span class='icon'>"+ name.charAt(0) + "</span><span class='tooltip'>"+fullname+"</span></li><br>";
          }

          var memPicture = '';
          if(data[cnt].picture != ""){
            memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+data[cnt].growthgroupleaderid+"/"+data[cnt].picture+"";
          }
          else{
            // Placeholder image with the letter
            memPicture = "https://ui-avatars.com/api/?name="+data[cnt].firstname+"+"+data[cnt].lastname; 
          }

          growthgroupmembers += "<tr>"+
                        "<td>"+data[cnt].growthgroupname+" ("+data[cnt].growthgroupshortname+")</td>"+
                        "<td><img src='"+memPicture+"' alt='Image 1'> "+data[cnt].leaderName+"</td>"+
                        "<td><ul class='image-list'>"+members+"</ul></td>"+
                        "<td><button class='btn btn-sm btn-flat btn-info' onclick='viewggmembers(\"" + cnt + "\", \"Growth Group\");'><i class='bx bx-list-ul'></i></button></td>"+
                      "</tr>";
        }
        $("#tblgrowthgroupmembers").html(growthgroupmembers);
      },
      complete: function(){
        $("#cntGrowthGroups").text(growthgroupmembersarray.length);
      }
    });
  }

  function viewggmembers(arrayIndex){
    openModal('modalclustermembers');
    $(".grpName").text("Growth-Group");
    $(".modalgrpName").text("Growth-Group");

    var fName = growthgroupmembersarray[arrayIndex].firstname;
    var lName = growthgroupmembersarray[arrayIndex].lastname;
    var mId = growthgroupmembersarray[arrayIndex].growthgroupleaderid;
    var mPicture = growthgroupmembersarray[arrayIndex].picture;

    var membePicture = getMemberPicture(fName, lName, mId, mPicture);
    $("#imageLeader").prop("src", membePicture);

    $("#clusterleadername").text(growthgroupmembersarray[arrayIndex].leaderName);
    $("#lblggclusterid").text(growthgroupmembersarray[arrayIndex].growthgroupid);

    var membersInfo = "";
    for(cnt in growthgroupmembersarray[arrayIndex].memberid){

      var membername = growthgroupmembersarray[arrayIndex].memberid[cnt].firstname + " " + growthgroupmembersarray[arrayIndex].memberid[cnt].lastname;
      var mtype = growthgroupmembersarray[arrayIndex].memberid[cnt].ggMtype === "" ? "Member" : growthgroupmembersarray[arrayIndex].memberid[cnt].clusterMType;

      console.log(growthgroupmembersarray[arrayIndex].memberid[cnt]);

      var memPicture = '';
      if(growthgroupmembersarray[arrayIndex].memberid[cnt].picture != ""){
        memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+growthgroupmembersarray[arrayIndex].memberid[cnt].ggmemberid+"/"+growthgroupmembersarray[arrayIndex].memberid[cnt].picture+"";
      }
      else{
        // Placeholder image with the letter
        memPicture = "https://ui-avatars.com/api/?name="+growthgroupmembersarray[arrayIndex].memberid[cnt].firstname+"+"+growthgroupmembersarray[arrayIndex].memberid[cnt].lastname; 
      }

      var membePicture = getMemberPicture(
        growthgroupmembersarray[arrayIndex].memberid[cnt].firstname, 
        growthgroupmembersarray[arrayIndex].memberid[cnt].lastname, 
        growthgroupmembersarray[arrayIndex].memberid[cnt].ggMid, 
        growthgroupmembersarray[arrayIndex].memberid[cnt].picture
      );

      membersInfo += '<div class="col-md-4 mb-2">'+
                '<div class="card">'+
                  '<img id="imageLeader" src="'+memPicture+'" class="img-fluid img-thumbnail rounded-0" alt="Cluster Leader Photo" height="200px;">'+
                  '<div class="card-body text-center">'+
                    '<h6 class="mb-0">'+ membername +'</h6>'+
                    '<small>'+ mtype +'</small>'+
                  '</div>'+
                '</div>'+
              '</div>';
    }

    $("#divmembersinfo").html(membersInfo);
  }

  function viewMembers(){
    openModal("modalmemberslist");
  }

  function getmemberslist(){
    var dataRecord = "";
    var txtSearchInformation = $("#txtSearchInformation").val();

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/memberlist/getmembers',
      dataType: 'json', 
      data: {
        txtSearchInformation: txtSearchInformation
      },
      success: function(data){
        // console.log(data);

        members = data;

        $.each(data, function(index, memberInfo){
          // console.log(memberInfo);
          dataRecord += "<tr>"+
                          "<td>"+memberInfo.firstname+" "+memberInfo.lastname+"</td>"+
                          "<td>"+memberInfo.emailaddress+"</td>"+
                          "<td>"+memberInfo.mobilenumber+"</td>"+
                          "<td>"+
                            "<button class='btn btn-sm btn-flat btn-info' onclick='selectMember("+index+");'><i class='bx bx-check'></i></button>"+
                          "</td>"+
                        "</tr>";
        });

        $("#tblmodalmemberslist").html(dataRecord);
      }
    });
  }

  function selectMember(index){
    var lblggclusterid = $("#lblggclusterid").text();
    var memberid = members[index].memberid;
    const clusterinfo = growthgroupmembersarray.filter(growthgroupmembersarray => growthgroupmembersarray.growthgroupid === lblggclusterid);

    Swal.fire({
      title: "Are you sure?",
      text: "Add "+members[index].firstname+" "+members[index].lastname+" in "+clusterinfo[0].clustername+" cluster?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, add it!"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          url: '<?=ROOT_PUBLIC?>/growthgroupmembers/saveGGMember',
          data: {
            defaultid: members[index].id,
            ggid: lblggclusterid,
            memberid: memberid
          },
          success: function(data){
            // console.log(data);
            // getAllDeacons();

            var memPicture = '';
            if(members[index].picture != ""){
              memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+memberid+"/"+members[index].picture+"";
            }
            else{
              // Placeholder image with the letter
              memPicture = "https://ui-avatars.com/api/?name="+members[index].firstname+"+"+members[index].lastname; 
            }


            var membersInfo = '<div class="col-md-4 mb-2">'+
                  '<div class="card">'+
                    '<img id="imageLeader" src="'+memPicture+'" class="img-fluid img-thumbnail rounded-0" alt="Cluster Leader Photo" height="200px;">'+
                    '<div class="card-body text-center">'+
                      '<h6 class="mb-0">'+ members[index].firstname +' '+ members[index].lastname +'</h6>'+
                      '<small>Member</small>'+
                    '</div>'+
                  '</div>'+
                '</div>';

            $("#divmembersinfo").append(membersInfo);

          }
        });
        closeModal("modalmemberslist");
      }
    });
  }

  function modalClose(){
    closeModal("modalclustermembers");
    growthgroupmembers();
  }

  function getMemberPicture(memberfirstname, memberlastname, memberid, memberpicture){
    var memPicture = '';
    if(memberpicture != ""){
      memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+memberid+"/"+memberpicture+"";
    }
    else{
      // Placeholder image with the letter
      memPicture = "https://ui-avatars.com/api/?name="+memberfirstname+"+"+memberlastname; 
    }

    return memPicture;
  }

</script>