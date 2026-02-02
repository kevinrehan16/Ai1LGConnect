<?php

  class GrowthGroupMembers extends Controller {

    function index(){
      // $clusters = $this->loadModel('cluster');
      // $dataResult = $clusters->findAll();
      
      $this->view("groupmembers", "growthgroupmembers");
    }

    function getgrowthgroupmembers(){
      $growthgroup = $this->loadModel('ggmembers');
      // $dataResult = $clusters->findAll();
      $mainQuery = "SELECT * FROM growthgroupmembers_information";
      $subQuery = "SELECT * FROM ggmembers as gm LEFT JOIN members as mn ON gm.ggmemberid = mn.memberid WHERE gm.growthgroupid = :growthgroupid";

      $dataResult = $growthgroup->anyQuery($mainQuery, $subQuery, 'memberid', 'growthgroupid');
      
      echo json_encode($dataResult);
    }

    function saveGGMember(){
      $ggMember = $this->loadModel('GrowthGroupGGMember');
      $ggMID = $ggMember->createrecordid('GCF-GGM', 'ggmembers', 'GCF-GGM', 'ggMid');
      $ggMemberInfo['ggMid'] = $ggMID;
      $ggMemberInfo['growthgroupid'] = $_POST['ggid'];
      $ggMemberInfo['ggmemberid'] = $_POST['memberid'];

      $addResult = $ggMember->insert($ggMemberInfo);

      $gg = $this->loadModel('member');
      $ggEditInfo['id'] = $_POST['defaultid'];
      $ggEditInfo['memberLevel'] = 'Level 4';
      $ggEditInfo['ggMember'] = 'Yes';
      $ggEditInfo['memberLvlTitle'] = 'GG Member';

      $updateResult = $gg->update($ggEditInfo['defaultid'], $ggEditInfo);

    }

  }