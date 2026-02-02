 <!-- NAVBAR   -->

 <?php
  $userMemberID = isset($_SESSION['userMemberID']) ? $_SESSION['userMemberID'] : '';
  $userFullname = isset($_SESSION['userFullname']) ? $_SESSION['userFullname'] : '';
  $userPicture = isset($_SESSION['userPicture']) ? $_SESSION['userPicture'] : '';

  $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
  $defaultUserID = isset($_SESSION['id']) ? $_SESSION['id'] : '';
 ?>

 <nav>
  <i class='bx bx-menu toggle-sidebar'></i>
  <form action="">
    <!-- <div class="form-group">
      <input type="text" placeholder="Search...">
      <i class='bx bx-search icon'></i>
    </div> -->
  </form>
  <a href="javascript::void(0)" class="nav-link">
    <i class='bx bxs-bell icon'></i>
    <span class="badge">5</span>
  </a>
  <a href="javascript::void(0)" class="nav-link">
    <i class='bx bxs-message-square-dots icon'></i>
    <span class="badge">8</span>
  </a>
  <span class="divider"></span>
  <div class="profile">
    <img src="<?=ROOT_PRIVATE?>/views/memberimage/<?php echo $userMemberID; ?>/<?php echo $userPicture; ?>" alt="Profile">
    <ul class="profile-link">
      <li><a href="<?=ROOT_PUBLIC?>/profilelist/<?php echo $_SESSION['memberDefaultId']; ?>"><img src="<?=ROOT_PRIVATE?>/views/memberimage/<?php echo $userMemberID; ?>/<?php echo $userPicture; ?>" alt="Profile"> <?php echo $userFullname ?></a></li>
      <li><a href="javascript:void(0)" onclick="openModal('modalchangepass');"><i class='bx bx-lock-open'></i> Change Password</a></li>
      <li onclick="logoutAccount();"><a href="javascript:void(0)"><i class='bx bx-log-out-circle'></i> Logout</a></li>
    </ul>
  </div>
</nav>

<div id="modalchangepass" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <!-- <form action="churchList/add" method="POST"> -->
        <div class="modal-header">
          <h5 class="modal-title">CHANGE PASSWORD</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container pt-3">
            <div class="row mb-2">
              <div class="col-md-12">
                <label>Email Address</label>
                <input type="text" class="form-control input-md form-control-md txt_firstCapital" id="txtemailacc" value="<?php echo $username; ?>" readonly disabled>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label>Current Password</label>
                <input type="password" class="form-control input-md form-control-md txtpass" id="txtcurrpass" maxlength="8">
              </div>
            </div>
            <hr class="dotted-line">
            <div class="row mb-2">
              <div class="col-md-12">
                <label>New Password</label>
                <input type="password" class="form-control input-md form-control-md txtpass" id="txtnewpass" maxlength="8">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12">
                <label>Password Confirmation</label>
                <input type="password" class="form-control input-md form-control-md txtpass" id="txtpassconfirm" maxlength="8">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-md btn-success" onclick="changepassword();"><i class='bx bx-save'></i> Save</button>
          <button type="button" class="btn btn-md btn-danger" onclick="cancelChangePass();"><i class='bx bx-x'></i> Close</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
</div>

<script>
  function changepassword(index){
    var txtemailacc = $("#txtemailacc").val(); 
    var txtcurrpass = $("#txtcurrpass").val(); 
    var txtnewpass = $("#txtnewpass").val();
    var defaultID = "<?php echo $defaultUserID; ?>";

    Swal.fire({
      title: "Are you sure?",
      text: "Are you sure you want to change your current password?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, add it!"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          url: '<?=ROOT_PUBLIC?>/login/changepassword',
          data: {
            defaultID: defaultID,
            txtemailacc: txtemailacc,
            txtcurrpass: txtcurrpass,
            txtnewpass: txtnewpass
          },
          success: function(data){
            console.log(data);
            // getAllElders();
          }
        });
        cancelChangePass();
      }
    });
  }

  function cancelChangePass(){
    closeModal("modalchangepass");
    $('#modalchangepass').find('.txtpass').val('');
  }

  function logoutAccount(){
    Swal.fire({
      title: "Are you sure?",
      text: "Do you want to logout your account?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, log it out!"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          url: '<?=ROOT_PUBLIC?>/logout',
          success: function(data){
            window.location.href = "<?=ROOT_PUBLIC?>/login";
          }
        });
      }
    });
  }
</script>
<!-- NAVBAR   -->