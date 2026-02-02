<script>
  var pastors = [];
  var members = [];
  var satellites = [];

  $(function(){
    getpastorslist();
    getmemberslist();
    getsatelliteslist();

    $(".fixTable").tableHeadFixer(); 

    $('#txtsearchpastorinfo').keyup(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            getpastorslist();
        }else if(keycode == '8'){
            getpastorslist();
        }
    });

    $('#txtSearchInformation').keyup(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            getmemberslist();
        }else if(keycode == '8'){
            getmemberslist();
        }
    });
  });

  function addnewpastor(){
    $("#modalpastorsinformation").modal("show");
  }

  function getpastorslist(){
    var dataRecord = "";
    var txtsearchpastorinfo = $("#txtsearchpastorinfo").val();

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/Pastorslist/getpastorslist',
      dataType: 'json',
      data: {
        joinTable: 'churches',
        txtsearchpastorinfo: txtsearchpastorinfo
      },
      success: function(data) {
        pastors = data;

        $.each(data, function(index, pastorInfo) {
        
          $pasPicture = '';
          if(pastorInfo.picture != ""){
            $pasPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+pastorInfo.memberid+"/"+pastorInfo.picture+"";
          }
          else{
            // Placeholder image with the letter
            $pasPicture = "https://ui-avatars.com/api/?name="+pastorInfo.firstname+"+"+pastorInfo.lastname; 
          }

          dataRecord += "<tr>" +
                          "<td>" +
                            "<input type='checkbox' data-toggle='toggle' data-onstyle='success' data-offstyle='danger' data-size='xs' checked data-on='Active' data-off='Inactive' data-style='ios' value='Active' onChange='alert($(this).val());'>" +
                          "</td>" +
                          "<td>" + pastorInfo.memberid + "</td>" +
                          "<td>" + pastorInfo.pastorlevel + "</td>" +
                          "<td>" + pastorInfo.nickname + "</td>" +
                          "<td><img src='"+$pasPicture+"' alt='Image 1'> &nbsp;" + pastorInfo.fullname + "</td>" +
                          "<td>" + pastorInfo.lifestage + "</td>" +
                          "<td>" + formatDate(pastorInfo.birthday) + "</td>" +
                          "<td>" + pastorInfo.emailaddress + "</td>" +
                          "<td class='td-btn'>"+
                            "<i class='btn-icon bx bxs-edit' title='Edit information'></i>"+
                            "<i class='btn-icon bx bx-notepad' title='View logs'></i>"+
                            "<i class='btn-icon bx bx-task-x' title='Remove'></i>"+
                          "</td>"+
                        "</tr>";
        });

        // Insert the data into the table
        $("#tblpastorslist").html(dataRecord);
      },
      complete: function() {
        $('input[data-toggle="toggle"]').bootstrapToggle();
      }
    });

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

    var memPicture = "";
    if(members[index].picture == ""){
      memPicture = "https://ui-avatars.com/api/?name="+members[index].firstname+"+"+members[index].lastname; 
    }else{
      memPicture = "<?=ROOT_PRIVATE?>/views/memberimage/"+members[index].memberid+"/"+members[index].picture+"";
    }
    
    $("#nickname").text(members[index].nickname);
    $("#imagefileInput").prop("src", memPicture);
    $("#defaultid").val(members[index].id);
    $("#memberid").val(members[index].memberid);
    $("#fullname").val(members[index].firstname + " " + members[index].lastname);
    $("#emailaddress").val(members[index].emailaddress);
    $("#contactnumber").val(members[index].mobilenumber);

    closeModal("modalmemberslist");
  }

  function getsatelliteslist(){
    var dataRecord = "";

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/satellitelist/getsatelliteslist',
      dataType: 'json', 
      data: {
        joinTable: 'churches'
      },
      success: function(data){
        // console.log(data);

        satellites = data;

        $.each(data, function(index, satelliteInfo){
          // console.log(memberInfo);
          dataRecord += "<tr onclick='selectSatellite("+index+");' style='cursor: pointer;'>"+
                          "<td>"+satelliteInfo.satellitesname+"</td>"+
                        "</tr>";
        });

        $("#tblmodalsatelliteslist").html(dataRecord);
      }
    });
  }

  function selectSatellite(index){
    $("#churchid").val(satellites[index].churchid);
    $("#churchname").val(satellites[index].churchname);
    $("#satellitesid").val(satellites[index].satellitesid);
    $("#satellitesname").val(satellites[index].satellitesname);

    closeModal("modalsatelliteslist");
  }

  function savepastorinformation(){
    var defaultid = $("#defaultid").val();
    var pastorlevel = $("#pastorlevel").val();
    var memberid = $("#memberid").val();
    var fullname = $("#fullname").val();
    var emailaddress = $("#emailaddress").val();
    var contactnumber = $("#contactnumber").val();
    var churchid = $("#churchid").val();
    var churchname = $("#churchname").val();
    var satellitesid = $("#satellitesid").val();
    var satellitesname = $("#satellitesname").val();

    $.ajax({
      type: 'POST',
      url: '<?=ROOT_PUBLIC?>/pastorslist/savepastor',
      // dataType: 'json', 
      data: {
        defaultid : defaultid,
        pastorlevel : pastorlevel,
        memberid : memberid,
        churchid : churchid,
        satellitesid : satellitesid,
      },
      success: function(data){
        // console.log(data);
        location.reload();
        closeModal("modalpastorsinformation");
      }
    });
  }
  
</script>