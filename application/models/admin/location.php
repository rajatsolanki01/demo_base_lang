<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Location extends CI_Model
{


public function updateCountryByPID()
{
  
  $q1 ="SELECT id, country FROM `country_old` where state='' and city='' order by country";
  $rec = $this->db->query($q1);
  $data = $rec->result();
  $arr = explode(",", "Afghanistan,Albania,Algeria,American Samoa,Andorraa,Angola,Antigua And Barbuda,Argentina,Armenia,Aruba,Australia,Austria,Azerbaijan,Bahamas The,Bahrain,Bangladesh,Belarus,Belgium,Belize,Benin,Bermuda,Bhutan,Bolivia,Botswana,Brazil,Brunei,Bulgaria,Burkina Faso,Burundi,Cambodia,Cameroon,Canada,Cape Verde,Central African Republic,Chad,Chile,China,Colombia,Comoros,Congo,Congo The Democratic Republic Of The,Cook Islands,Costa Rica,Croatia (Hrvatska),Cuba,Cyprus,Czech Republic,Denmark,Djibouti,Dominican Republic,East Timor,Ecuador,Egypt,El Salvador,Equatorial Guinea,Eritrea,Estonia,Ethiopia,Faroe Islands,Fiji Islands,Finland,France,French Guiana,French Polynesia,French Southern Territories,Gabon,Gambia The,Georgia,Germany,Ghana,Gibraltar,Greece,Greenland,Guadeloupe,Guam,Guatemala,Guernsey and Alderney,Guinea,Guinea-Bissau,Guyana,Haiti,Honduras,Hungary,Iceland,India,Indonesia,Iran,Iraq,Ireland,Israel,Italy,Jamaica,Japan,Jersey,Jordan,Kazakhstan,Kenya,Kiribati,Korea North,Korea South,Kuwait,Kyrgyzstan,Laos,Latvia,Lebanon,Lesotho,Liberia,Libya,Liechtenstein,Lithuania,Luxembourg,Macau S.A.R.,Macedonia,Madagascar,Malawi,Malaysia,Maldives,Mali,Malta,Man (Isle of),Marshall Islands,Martinique,Mauritania,Mauritius");
  //print_r($arr);exit;
  foreach ($data as $item)
  {
    //echo $item->id . ' '. $item->country;
    if (!in_array($item->country, $arr))
    {
      $q2 ="update `country_old` set pid='".$item->id."', country='' where country='".$item->country."' and state!='' and city=''";
      $this->db->query($q2);

      $q2="SELECT id, state FROM `country_old` where pid='".$item->id."' and state!='' and city=''";
      $rec2 = $this->db->query($q2);
      $data2 = $rec2->result();
      foreach ($data2 as $item2)
      {
        $q3="update `country_old` set country='', state='', pid='".$item2->id."' where state='".$item2->state."' and city!=''";

        $dt = array("country"=>"", "state"=>"", "pid"=>$item2->id);
        $this->db->where (array("state"=>$item2->state));
        $this->db->where("city != ''");
        $this->db->update("country_old", $dt);
        //echo $item2->state."**";
      }
    }   
    echo $item->country.",";
  }

  

  //print_r($data);
  echo "rs";exit;
}

    function getLocation($condition,$start=null,$page_row=null)
    {
      extract($condition);
      if($editid=='1') //state list
        $select = 'DISTINCT(state),country,flage,id';
      elseif($editid=='2') //city list
        $select = '*'; 
      else  //country list
        $select = 'DISTINCT(country),flage,banner,avilable_home_search,id';
      
      $this->db->select($select);
      $this->db->from('country');
      $this->db->where('status','Y');
      $this->db->where('deleted','N');
      $this->db->where(array("lang_type"=>$this->session->userdata("user_lang")));

      if($cont_name!='' && $state_name=='') //state list
      {
        $this->db->where('country', $cont_name);
        $this->db->where('state !=',' ');
        $this->db->where('city =','');
        $this->db->group_by('state');
        $this->db->order_by('state','ASC');
        if(isset($search_val))
        {
          $this->db->like('state',$search_val);
        }
      }
      else if($state_name!='') //city list
      {
        $this->db->where('state', $state_name);
        $this->db->where('city !=','');
        $this->db->group_by('city');
        $this->db->order_by('city','ASC');
        if(isset($search_val))
        {
          $this->db->like('city',$search_val);
        }
      }
      else //country list
      {
        $this->db->where("country != ''");
        $this->db->where("state",'');
        $this->db->group_by('country');
        $this->db->order_by('country','ASC');
        if(isset($search_val))
        {
          $this->db->like('country',$search_val);
        }
      }

        if($start>=0 && $page_row!=null && !isset($search_val))
        {
          $this->db->limit($page_row,$start);     
        }
        return $this->db->get();
        // echo $this->db->last_query();
      }
}