<?php

  class ProfileList extends Controller {

    function index(){
      $this->view("profiles", "profilelist");
    }

    function getInformation(){
      $member = $this->loadModel('member');
      $dataMember = $member->where('id', $_POST['defaultId'], '=');

      $children = $this->loadModel('memberchildren');
      $datachildren = $children->where('memberid', $dataMember[0]->memberid, '=');

      $dataMember[0]->children = $datachildren;

      echo json_encode($dataMember);
    }

    function growthgroupasaleader(){

      $ggAsLeader = array();
      
      $gg = $this->loadModel('GrowthGroupGG');
      $dataGgGroups = $gg->where('growthgroupleaderid', $_POST['memberId'], '=');
      
      $members = $this->loadModel('member');
      foreach($dataGgGroups as $ggGroup){
        
        $ggMembers = $members->leftJoin('ggmembers', 'memberid = ggmembers.ggmemberid', 'ggmembers.growthgroupid', $ggGroup->growthgroupid);

        $ggAsLeader[] = [
          'growthgroupid' => $ggGroup->growthgroupid,
          'growthgroupname' => $ggGroup->growthgroupname,
          'shortname' => $ggGroup->growthgroupshortname,
          'members' => $ggMembers
        ];
      }

      echo json_encode($ggAsLeader);
    }
  }