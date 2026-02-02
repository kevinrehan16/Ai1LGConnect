<?php

  class PastorsList extends Controller {
    
    function index(){
      $this->view("members", "pastorslist");
    }

    function getpastorslist(){
      $pastors = $this->loadModel('pastordbview');
      $conditions = [];
      $params = [];
  
      // General search condition for fullname
      if (isset($_POST['txtsearchpastorinfo']) && !empty($_POST['txtsearchpastorinfo'])) {
          // Use LIKE for search term with a wildcard
          $conditions[] = "fullname LIKE :search";
          $params[':search'] = "%" . $_POST['txtsearchpastorinfo'] . "%";
      }
  
      // Combine conditions into the WHERE clause
      $conditionString = !empty($conditions) ? " WHERE " . implode(' AND ', $conditions) : '';
  
      // Call the mainQuery method with the conditions and parameters
      $dataResult = $pastors->mainQuery($conditionString, $params);
  
      // Return the results as JSON
      echo json_encode($dataResult);
  }

    function savepastor(){
      $pastors = $this->loadModel('pastor');

      $pastorInfo['pastorid'] = $pastors->createrecordid('GCF-PASTOR', 'pastors', 'GCF-PASTOR', 'pastorid');
      $pastorInfo['pastorlevel'] = $_POST['pastorlevel'];
      $pastorInfo['memberid'] = $_POST['memberid'];
      $pastorInfo['churchid'] = $_POST['churchid'];
      $pastorInfo['satellitesid'] = $_POST['satellitesid'];
      
      $addResult = $pastors->insert($pastorInfo);

      $pastor = $this->loadModel('member');
      $pastorEditInfo['id'] = $_POST['defaultid'];
      $pastorEditInfo['memberLevel'] = $pastorInfo['pastorlevel'] == "Senior Pastor" ? 'Level 1' : 'Level 2';
      $pastorEditInfo['memberLvlTitle'] = $pastorInfo['pastorlevel'];

      $updateResult = $pastor->update($pastorEditInfo['defaultid'], $pastorEditInfo);

      // AUDIT TRAIL HERE
      $auditTrail = $this->loadModel('audittrail');
      $auditTrail->auditTrail("INSERT", "pastors", $_POST['memberid'], "", json_encode($pastorInfo));
    }


  }