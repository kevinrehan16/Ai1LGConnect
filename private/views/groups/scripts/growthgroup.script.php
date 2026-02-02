<script>
  var members = [];
  var growthgroup = [];
  $(function(){
    getmemberslist();
    getGrowthGroup();
    
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

  function addNewGrowthGroup(){
    openModal("modalgrowthgroup");
  }

  function cancelgrowthgroup(){
    closeModal("modalgrowthgroup");
  }

  function getGrowthGroup(){
    var dataRecord = "";
    var txtSearchGGInformation = $("#txtSearchGGInformation").val();

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/growthgroup/getGrowthGroup',
      dataType: 'json',
      data: {
        joinTable: 'members',
        txtSearchInformation: txtSearchGGInformation
      },
      beforeSend: function(){
        $("#tblgrowthgroup").html("<tr><td class='text-center' colspan='5'>Loading Records...</td></tr>");
      },
      success: function(data){
        // console.log(data);

        growthgroup = data;

        let growthgroupLength = Array.isArray(growthgroup) ? growthgroup.length : 0;
        $("#cntTblGrowthGroups").text(growthgroupLength);

        if(growthgroupLength > 0){
          $.each(data, function(index, growthgroup){
            // console.log(growthgroup);"+

            // $memPicture = '';
            // if(growthgroup.picture != ""){
            //   $memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+growthgroup.memberid+"/"+growthgroup.picture+"";
            // }
            // else{
            //   // Placeholder image with the letter
            //   $memPicture = "https://ui-avatars.com/api/?name="+growthgroup.firstname+"+"+growthgroup.lastname; 
            // }
  
            // const memberFullName = members.filter(member => member.memberid === growthgroup.growthgroupleaderid);
            dataRecord += "<tr>"+
                          "<td>"+ growthgroup.growthgroupid +"</td>"+
                          "<td>"+ growthgroup.growthgroupname +" ("+growthgroup.growthgroupshortname+")</td>"+
                          "<td>"+ growthgroup.leaderName +"</td>"+
                          "<td>"+ formatTime(growthgroup.timeschedule) +" | "+ growthgroup.dayschedule +"</td>"+
                          "<td></td>"+
                        "</tr>";
          });
        }else{
          dataRecord = "<tr><td class='text-center' colspan='5'>No Record Found...</td></tr>"
        }

        $("#tblgrowthgroup").html(dataRecord);
      }
    });
  }

  function selectLeader(){
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
    $("#txtggleaderid").val(members[index].memberid);
    $("#txtggleader").val(members[index].firstname + " " + members[index].lastname);

    closeModal("modalmemberslist");
  }

  function savenewgrowthgroup(){
    var txtgrowthgroupname = $("#txtgrowthgroupname").val();
    var txtggabbreviation = $("#txtggabbreviation").val();
    var txtggleader = $("#txtggleader").val();
    var txtggleaderid = $("#txtggleaderid").val();
    var txtggday = $("#txtggday").val();
    var txtggtime = $("#txtggtime").val();
    const defaultID = members.filter(member => member.memberid === txtggleaderid);

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/growthgroup/savenewgrowthgroup',
      data: {
        defaultID: defaultID[0].id,
        txtgrowthgroupname: txtgrowthgroupname,
        txtggabbreviation: txtggabbreviation,
        txtggleader: txtggleader,
        txtggleaderid: txtggleaderid,
        txtggday: txtggday,
        txtggtime: txtggtime
      },
      success: function(data){
        // console.log(data);
        Swal.fire({
          title: "New Growth Group",
          text: txtgrowthgroupname+ " Growth Group, leader "+ txtggleader +" has been added successfully.",
          icon: "success"
        });
      },
      complete: function(){
        cancelgrowthgroup();
        getGrowthGroup();
        $(".inputant").val("");
      }
    });
  }
</script>