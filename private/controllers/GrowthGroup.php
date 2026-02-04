<?php

  class GrowthGroup extends Controller {

    function index(){
      $this->view("groups", "growthgrouplist");
      // $gg = $this->loadModel('growthgroupgg');
      // $dataResult = $gg->findAll();
      
      // $this->view("groups", "growthgrouplist", ['growthgroups'=>$dataResult]);
    }

    function getGrowthGroup(){
      $satellite = $this->loadModel("ggmembers");
      $dataResult = $satellite->findAll();;

      echo json_encode($dataResult);
    }

    function savenewgrowthgroup(){
      $memInfo = $this->loadModel('member');
      $dataResult = $memInfo->where('memberid', $_POST['txtggleaderid']);
      $levelInfo = str_replace("Level ", "", $dataResult[0]->memberLevel);

      $growthgroups = $this->loadModel('GrowthGroupGG');
      $growthgroupid = $growthgroups->createrecordid('GCF-GG', 'growthgroups', 'GCF-GG', 'growthgroupid');

      $ggAddinfo['growthgroupid'] = $growthgroupid;
      $ggAddinfo['growthgroupname'] = $_POST['txtgrowthgroupname'];
      $ggAddinfo['growthgroupshortname'] = $_POST['txtggabbreviation'];
      $ggAddinfo['growthgroupleaderid'] = $_POST['txtggleaderid'];
      $ggAddinfo['dayschedule'] = $_POST['txtggday'];
      $ggAddinfo['timeschedule'] = $_POST['txtggtime'];
      $growthgroups->insert($ggAddinfo);

      $ggEditInfo['id'] = $_POST['defaultID'];
      $ggEditInfo['ggLeader'] = 'Yes';
      if($levelInfo >= 3){
        $ggEditInfo['memberLevel'] = 'Level 3';
        $ggEditInfo['memberLvlTitle'] = 'GG Leader';
      }
      $updateResult = $memInfo->update($_POST['defaultID'], $ggEditInfo);
    }
  }