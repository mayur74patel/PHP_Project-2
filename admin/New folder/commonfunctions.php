<?php

error_reporting(0);

if (!function_exists('pre')) {

    function pre($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit;
    }

}

if (!function_exists('pr')) {

    function pr($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

}

function login($vEmail, $vPassword) {
    global $conn;
    $login_query = "SELECT * FROM admin WHERE (email = '" . mysqli_real_escape_string($conn, $vEmail) . "') and (password = '" . mysqli_real_escape_string($conn, md5($vPassword)) . "')";
    $login_res = mysqli_query($conn, $login_query);
    if (mysqli_num_rows($login_res) == 1) {
        $rows = mysqli_fetch_array($login_res);
        $_SESSION['email'] = $rows['email'];
        $_SESSION['admin_id'] = $rows['admin_id'];
        $_SESSION['name'] = $rows['name'];
        return 1;
    } else {
        return 0;
    }
}

function changePassword($postData) {
    global $conn;
    $login_query = "SELECT * FROM admin WHERE password = '" . md5($postData['password']) . "' AND admin_id = '" . $_SESSION['admin_id'] . "' ";
    $login_res = mysqli_query($conn, $login_query);
    if (mysqli_num_rows($login_res) > 0) {
        $login_query1 = "UPDATE admin SET password = '" . md5($postData['newpassword']) . "' WHERE admin_id = '" . $_SESSION['admin_id'] . "'";
        if (mysqli_query($conn, $login_query1)) {
            return 1;
        } else {
            return 0;
        }
    } else {
        return 2;
    }
}

function getAllUserData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT *FROM tbl_user ORDER BY dCreateDate DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iUserID'] = $row['iUserID'];
            $temp[$i]['vFirstName'] = $row['vFirstName'];
            $temp[$i]['vLastName'] = $row['vLastName'];
            $temp[$i]['vEmail'] = $row['vEmail'];
            $temp[$i]['vPhone'] = $row['vPhone'];
            $temp[$i]['tAddress'] = $row['tAddress'];
            $temp[$i]['vCity'] = $row['vCity'];
            $temp[$i]['vPostcode'] = $row['vPostcode'];
            $temp[$i]['vReferralCode'] = $row['vReferralCode'];
            $temp[$i]['tImage'] = $row['tImage'];
            $temp[$i]['dCreatedDate'] = $row['dCreatedDate'];
            $i++;
        }
    }
    return $temp;
}

function getAllContactData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT *FROM tbl_contact";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($select_res)) {
            $temp[$i]['iContactID'] = $row['iContactID'];
            $temp[$i]['vName'] = $row['vName'];
            $temp[$i]['vEmail'] = $row['vEmail'];
            $temp[$i]['vPhone'] = $row['vPhone'];
            $temp[$i]['vCallTime'] = $row['vCallTime'];
            $temp[$i]['eContactWay'] = $row['eContactWay'];
            $temp[$i]['vReasonForContact'] = $row['vReasonForContact'];
            $temp[$i]['eEnquiryType'] = $row['eEnquiryType'];
            $temp[$i]['vServiceType'] = $row['vServiceType'];
            $temp[$i]['vSubServiceType'] = $row['vSubServiceType'];
            $temp[$i]['vPostcode'] = $row['vPostcode'];
            $temp[$i]['vPromocode'] = $row['vPromocode'];
            $temp[$i]['tNote'] = $row['tNote'];
            $i++;
        }
    }
    return $temp;
}

function addFaq($tQuestion, $tAnswer) {
    global $conn;
    $que = addslashes($tQuestion);
    $answ = addslashes($tAnswer);
    $insert_query = "INSERT INTO tbl_faq SET tQuestion='" . $que . "',tAnswer='" . $answ . "'";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}

function getAllFaqData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT *FROM tbl_faq ORDER BY iFaqID DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iFaqID'] = $row['iFaqID'];
            $temp[$i]['tQuestion'] = $row['tQuestion'];
            $temp[$i]['tAnswer'] = $row['tAnswer'];
            $i++;
        }
    }
    return $temp;
}

function getFaqByID($fid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM tbl_faq WHERE iFaqID = $fid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function updateFaq($iFaqID, $tQuestion, $tAnswer) {
    global $conn;
    $que = addslashes($tQuestion);
    $answ = addslashes($tAnswer);
    $update_query = "UPDATE tbl_faq SET tQuestion = '$que',tAnswer = '$answ' WHERE iFaqID = $iFaqID";
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}

function addCategory($vCategoryName, $newfilename) {
    global $conn;
    $insert_query = "INSERT INTO tbl_category SET vCategoryName='" . $vCategoryName . "',tImage='" . $newfilename . "', dCreateDate=NOW() ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}

function getAllcategoryData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT *FROM tbl_category WHERE eDelete='0' ORDER BY iCategoryID DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iCategoryID'] = $row['iCategoryID'];
            $temp[$i]['vCategoryName'] = $row['vCategoryName'];
            $temp[$i]['tImage'] = $row['tImage'];
            $i++;
        }
    }
    return $temp;
}

function getCategoryDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM tbl_category WHERE iCategoryID = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function updateCategory($iCategoryID, $vCategoryName, $newfilename) {
    global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT tImage FROM tbl_category WHERE iCategoryID = $iCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($CATEGORY_IMAGE_PATH . $row['tImage']);
        }
        $update_query = "UPDATE tbl_category SET vCategoryName= '$vCategoryName', tImage= '$newfilename' WHERE iCategoryID = $iCategoryID";
    } else {
        $update_query = "UPDATE tbl_category SET vCategoryName= '$vCategoryName' WHERE iCategoryID = $iCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}

function addSubCategory($iCategoryID, $vSubCategoryName, $newfilename, $tSubCatDetail) {    
    global $conn;
    $tContentdata = addslashes($tSubCatDetail); 
    $insert_query = "INSERT INTO tbl_subcategory SET iCategoryID='" . $iCategoryID . "', vSubCategoryName='" . $vSubCategoryName . "',tImage='" . $newfilename . "',tSubCatDetail = '".$tContentdata."', dCreateDate=NOW()";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}

function getAllsubcategoryData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT sc.*, c.vCategoryName FROM tbl_subcategory as sc JOIN tbl_category as c ON c.iCategoryID = sc.iCategoryID WHERE sc.eDelete='0' AND c.eDelete='0'  ORDER BY sc.iSubCategoryID DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iCategoryID'] = $row['iCategoryID'];
            $temp[$i]['iSubCategoryID'] = $row['iSubCategoryID'];
            $temp[$i]['vCategoryName'] = $row['vCategoryName'];
            $temp[$i]['vSubCategoryName'] = $row['vSubCategoryName'];
            $temp[$i]['tImage'] = $row['tImage'];
            $temp[$i]['tSubCatDetail'] = $row['tSubCatDetail'];
            $i++;
        }
    }
    return $temp;
}

function getSubcategoryDataByID($scid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT sc.*, c.vCategoryName FROM tbl_subcategory as sc JOIN tbl_category as c ON c.iCategoryID = sc.iCategoryID WHERE sc.eDelete='0' AND c.eDelete='0' AND sc.iSubCategoryID = $scid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function updateSubCategory($iSubCategoryID, $iCategoryID, $vSubCategoryName, $newfilename, $tSubCatDetail) {
    $tContentdata = addslashes($tSubCatDetail); 
    global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT tImage FROM tbl_subcategory WHERE iSubCategoryID = $iSubCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($SUBCATEGORY_IMAGE_PATH . $row['tImage']);
        }
        $update_query = "UPDATE tbl_subcategory SET vSubCategoryName= '$vSubCategoryName',iCategoryID='$iCategoryID',tImage= '$newfilename', tSubCatDetail='$tContentdata' WHERE iSubCategoryID = $iSubCategoryID";
    } else {
        $update_query = "UPDATE tbl_subcategory SET vSubCategoryName= '$vSubCategoryName',iCategoryID='$iCategoryID', tSubCatDetail='$tContentdata' WHERE iSubCategoryID = $iSubCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}

function addSubCategoryData($tImage, $tContent,$iSubCategoryID) {
    global $conn;
    $tContentdata = addslashes($tContent);      
    $insert_q = "INSERT INTO tbl_subcategory_detail SET tContent='" . $tContentdata . "',tImage='" . $tImage . "', iSubCategoryID='".$iSubCategoryID."', dCreateDate=NOW()";
    
    $insert_r = mysqli_query($conn, $insert_q);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;    
}

function getAllSubcategoryDataList() {
    global $conn;
    $temp = array();
    $select_query = "SELECT *FROM tbl_subcategory WHERE eDelete='0' ORDER BY iSubCategoryID DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iSubCategoryID'] = $row['iSubCategoryID'];
            $temp[$i]['vSubCategoryName'] = $row['vSubCategoryName'];            
            $i++;
        }
    }
    return $temp;
}

function getSubcategoryDataList() {
    global $conn;
    $temp = array();
    $select_query = "SELECT sd.*, sc.vSubCategoryName FROM  tbl_subcategory_detail as sd JOIN tbl_subcategory as sc ON sc.iSubCategoryID = sd.iSubCategoryID WHERE sd.eDelete='0' AND sc.eDelete='0'  ORDER BY sd.iSubCategoryDetailID DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iSubCategoryDetailID'] = $row['iSubCategoryDetailID'];
            $temp[$i]['iSubCategoryID'] = $row['iSubCategoryID'];
            $temp[$i]['vSubCategoryName'] = $row['vSubCategoryName'];
            $temp[$i]['tContent'] = $row['tContent'];
            $temp[$i]['tImage'] = $row['tImage'];
            $i++;
        }
    }
    return $temp;
}

function getSubcategoryDetailByID($sdid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT sd.*, sc.vSubCategoryName FROM  tbl_subcategory_detail as sd JOIN tbl_subcategory as sc ON sc.iSubCategoryID = sd.iSubCategoryID WHERE sd.eDelete='0' AND sd.iSubCategoryDetailID = $sdid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function updateSubCategoryData($iSubCategoryDetailID, $tImage, $tContent,$iSubCategoryID) {
    global $conn;
    $tContentdata = addslashes($tContent); 
    if (isset($tImage) && $tImage != "") {        
        require '../config/constant.php';
        $query = "SELECT tImage FROM tbl_subcategory_detail WHERE iSubCategoryDetailID = $iSubCategoryDetailID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($SUBCATEGORY_DATA_IMAGE_PATH . $row['tImage']);
        }
        $update_query = "UPDATE tbl_subcategory_detail SET iSubCategoryID= '$iSubCategoryID',tContent='$tContentdata',tImage= '$tImage' WHERE iSubCategoryDetailID = $iSubCategoryDetailID";
    } else {
        $update_query = "UPDATE tbl_subcategory_detail SET iSubCategoryID= '$iSubCategoryID',tContent='$tContentdata' WHERE iSubCategoryDetailID = $iSubCategoryDetailID";
    }
    
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}

function addSliderData($tImage, $tDetail, $iSubCategoryID) {
    global $conn;
    $tContentdata = addslashes($tDetail);      
    $insert_q = "INSERT INTO tbl_slider_data SET tDetail='" . $tContentdata . "',tImage='" . $tImage . "', iSubCategoryID='".$iSubCategoryID."', dCreateDate=NOW()";
    
    $insert_r = mysqli_query($conn, $insert_q);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;    
}

function getSliderDataList() {
    global $conn;
    $temp = array();
    $select_query = "SELECT sd.*, sc.vSubCategoryName FROM  tbl_slider_data as sd JOIN tbl_subcategory as sc ON sc.iSubCategoryID = sd.iSubCategoryID WHERE sd.eDelete='0' AND sc.eDelete='0'  ORDER BY sd.iSliderID DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iSliderID'] = $row['iSliderID'];
            $temp[$i]['iSubCategoryID'] = $row['iSubCategoryID'];
            $temp[$i]['vSubCategoryName'] = $row['vSubCategoryName'];
            $temp[$i]['tDetail'] = $row['tDetail'];
            $temp[$i]['tImage'] = $row['tImage'];
            $i++;
        }
    }
    return $temp;
}

function getSliderDetailByID($sdid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT sd.*, sc.vSubCategoryName FROM  tbl_slider_data as sd JOIN tbl_subcategory as sc ON sc.iSubCategoryID = sd.iSubCategoryID WHERE sd.eDelete='0' AND sc.eDelete='0' AND sd.iSliderID = $sdid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function updateSliderData($iSliderID, $tImage, $tDetail, $iSubCategoryID) {
    global $conn;
    $tContentdata = addslashes($tDetail); 
    if (isset($tImage) && $tImage != "") {        
        require '../config/constant.php';
        $query = "SELECT tImage FROM tbl_slider_data WHERE iSliderID = $iSliderID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($SUBCATEGORY_DATA_IMAGE_PATH . $row['tImage']);
        }
        $update_query = "UPDATE tbl_slider_data SET iSubCategoryID= '$iSubCategoryID',tDetail='$tContentdata',tImage= '$tImage' WHERE iSliderID = $iSliderID";
    } else {
        $update_query = "UPDATE tbl_slider_data SET iSubCategoryID= '$iSubCategoryID',tDetail='$tContentdata' WHERE iSliderID = $iSliderID";
    }
    
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}

// Regular Cleaning Service

//function getAllregularCleaningData() {
//    global $conn;
//    $temp = array();
//    $select_query = "SELECT rc.*, u.vName, FROM tbl_contact";
//    $select_res = mysqli_query($conn, $select_query);
//    if (mysqli_num_rows($select_res) > 0) {
//        $i = 0;
//        while ($row = mysqli_fetch_assoc($select_res)) {
//            $temp[$i]['iContactID'] = $row['iContactID'];
//            $temp[$i]['vName'] = $row['vName'];
//            $temp[$i]['vEmail'] = $row['vEmail'];
//            $temp[$i]['vPhone'] = $row['vPhone'];
//            $temp[$i]['vCallTime'] = $row['vCallTime'];
//            $temp[$i]['eContactWay'] = $row['eContactWay'];
//            $temp[$i]['vReasonForContact'] = $row['vReasonForContact'];
//            $temp[$i]['eEnquiryType'] = $row['eEnquiryType'];
//            $temp[$i]['vServiceType'] = $row['vServiceType'];
//            $temp[$i]['vSubServiceType'] = $row['vSubServiceType'];
//            $temp[$i]['vPostcode'] = $row['vPostcode'];
//            $temp[$i]['vPromocode'] = $row['vPromocode'];
//            $temp[$i]['tNote'] = $row['tNote'];
//            $i++;
//        }
//    }
//    return $temp;
//}