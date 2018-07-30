<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$dateF = date('Y-m-d');
		$qu = $this->db->where('date',$dateF)->get('tbl_check_date');
		$da = $qu->row();
		if(!isset($da->date)):
			$Insertdate = array('date' => $dateF);
			$this->db->insert('tbl_check_date', $Insertdate);
			$this->User_model->post_check_expiration_date();
		endif;

		$uid = $this->session->userdata('user_id');
		$vars['accessCategory'] = $this->User_model->fatch_access_user_data($uid);

		$vars['fatchAboutus'] 	= $this->About_model->all_about_footer_text();
		$vars['fatchSubCategory']=$this->Subcategory_model->all_Subcategory_list();
		$vars['fatchCategory'] 	  = $this->Category_model->all_category_list();
		$vars['fatchPhoneCode'] = $this->PhoneCode_model->all_PhoneCode_list();
		
		$vars['fatchCountry'] 	  = $this->Area_model->all_Country_list();
		$vars['fatchCity'] 		  = $this->Area_model->all_City_list();
		$vars['fatchArea']		  = $this->Area_model->all_Area_list();

		$vars['fatchContactInfo'] = $this->Contact_model->show_contact_us();
		$vars['fatchcontact'] = $this->Contact_model->show_footer_contact_us();
		$this->load->vars($vars);
	}

	/*====================Error Page=====================*/
	public function error()
	{	
		$this->load->view('errors/errorpage', TRUE);	
	}


	/*====================Home Page =====================*/
	public function index()
	{
		$data['allSlideImage'] = $this->Slider_model->all_slider_list();
		$data['fatchCountry'] = $this->Area_model->all_Country_list();
		$data['fatchCity'] 		= $this->Area_model->all_City_list();
		$data['fatchArea']		  = $this->Area_model->all_Area_list();
		$data['content'] = 'homePage';
		$this->load->view('FrontEnd/homeMaster', $data);
	}



	/*=======================================*/
	/*=======================================*/
	public function AboutUs()
	{	
		$data['fatchAbout'] = $this->About_model->all_about_text();
		$data['content'] = 'AboutUs';
		$this->load->view('FrontEnd/homeMaster',$data);	
	}


	/*=======================================*/
	/*=======================================*/
	public function Services()
	{	
		$data['fatchService'] = $this->Service_model->all_Service_text();
		$data['content'] = 'Services';
		$this->load->view('FrontEnd/homeMaster',$data);	
	}



	/*=======================================*/
	/*=======================================*/
	public function TermsCondition()
	{	
		$data['fatchTerms'] = $this->Terms_model->all_Terms_text();
		$data['content'] = 'TermsCondition';
		$this->load->view('FrontEnd/homeMaster',$data);	
	}



	/*=======================================*/
	/*=======================================*/
	public function FAQ()
	{	
		$data['fatchFaq'] = $this->Faq_model->all_Faq_text();
		$data['content'] = 'FAQ';
		$this->load->view('FrontEnd/homeMaster',$data);	
	}



	/*=======================================*/
	/*=======================================*/
	public function Payment()
	{	
		$data['fatchPayment'] = $this->Payment_model->all_Payment_text();
		$data['content'] = 'Payment';
		$this->load->view('FrontEnd/homeMaster',$data);	
	}




	/*=======================================*/
	/*=======================================*/
	public function CategoryProduct($cateID,$uType)
	{	
		$cate = base64_decode(strtr($cateID, '_-.', '+/='));

		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			$data['CategoryProduct'] = $this->Post_model->fatch_Category_product($cate,$uType);
			$data['CategoryDetails'] = $this->Category_model->all_category_Details();
			
			$data['id'] = $cate;
			$data['content'] = 'CategoryProduct';
			$this->load->view('FrontEnd/homeMaster',$data);	
				
		}
	}



	/*=======================================*/
	/*=======================================*/
	public function SubCategoryProduct($subID,$uType)
	{	
		$sub = base64_decode(strtr($subID, '_-.', '+/='));
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			$data['CategoryProduct'] = $this->Post_model->fatch_sub_Category_product($sub,$uType);
			$data['CategoryDetails'] = $this->Category_model->all_category_Details();
			
			$data['id'] = $subID;
			$data['content'] = 'CategoryProduct';
			$this->load->view('FrontEnd/homeMaster',$data);	
				
		}
	}


	/*=======================================*/
	/*=======================================*/
	public function CategoryPaymentRule()
	{	
		$data['CategoryPayRule'] = $this->Category_model->all_category_Details();

		$data['content'] = 'Category_Payment_Rule';
		$this->load->view('FrontEnd/homeMaster',$data);		
	}



	/*=======================================*/
	/*=======================================*/
	public function user_category_products($cateID)
	{	
		$data['CategoryProduct'] = $this->Post_model->fatch_user_category_products($cateID);
		$data['id'] = $cateID;
		$data['content'] = 'user_show_product';
		$this->load->view('FrontEnd/homeMaster',$data);		
	}


	/*=======================================*/
	/*=======================================*/
	public function user_sub_category_products($subID)
	{	
		$data['CategoryProduct'] = $this->Post_model->fatch_user_sub_category_products($subID);
		$data['id'] = $subID;
		$data['content'] = 'user_show_product';
		$this->load->view('FrontEnd/homeMaster',$data);		
	}


	/*=======================================*/
	/*=======================================*/
	public function user_City_products($city)
	{	
		$data['CategoryProduct'] = $this->Post_model->fatch_user_City_product($city);
		$data['content'] = 'user_show_product';
		$this->load->view('FrontEnd/homeMaster',$data);		
	}





	/*=======================================*/
	/*=======================================*/
	public function User_WASearchProduct($cateid=null)
	{	
		$data['CategoryProduct'] = $this->Post_model->WAsearch_products($cateid);

		$data['id'] = $cateid;
		$data['content'] = 'without_access_category_search';
		$this->load->view('FrontEnd/homeMaster',$data);		
	}



	/*=======================================*/
	/*=======================================*/
	public function User_SearchProduct($cateid=null)
	{	
		$data['CategoryProduct'] = $this->Post_model->search_products($cateid);
		$data['id'] = $cateid;
		$data['content'] = 'user_show_product';
		$this->load->view('FrontEnd/homeMaster',$data);		
	}



	/*=======================================*/
	/*=======================================*/
	public function SearchProduct($cateid=null)
	{	
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			$data['id'] = $cateid;
			$data['CategoryProduct'] = $this->Post_model->search_products($cateid);
			$data['content'] = 'CategoryProduct';
			$this->load->view('FrontEnd/homeMaster',$data);
		}		
	}


	/*=======================================*/
	/*=======================================*/
	public function CityProduct($cityID,$uType)
	{	
		$city = base64_decode(strtr($cityID, '_-.', '+/='));

		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			redirect('City-Product/'.$city);
		}
		else{
			$data['city']  = $city;
			$data['CityProduct'] = $this->Post_model->fatch_City_product($city,$uType);

			$data['content'] = 'CityProduct';
			$this->load->view('FrontEnd/homeMaster',$data);		
		}
	}



	/*=======================================*/
	/*=======================================*/
	public function ZoneProduct($zoneID,$uType,$cityID)
	{	
		$zone = base64_decode(strtr($zoneID, '_-.', '+/='));
		$city = base64_decode(strtr($cityID, '_-.', '+/='));
		
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			$data['city']  = $city;
			$data['CityProduct'] = $this->Post_model->fatch_Zone_product($zone,$uType);

			$data['content'] = 'CityProduct';
			$this->load->view('FrontEnd/homeMaster',$data);		
		}
	}




	/*=======================================*/
	/*=======================================*/
	public function viewProduct($Pid,$cateID)
	{	 
		$id = base64_decode(strtr($Pid, '_-.', '+/='));
		$cate = base64_decode(strtr($cateID, '_-.', '+/='));
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			$data['RelatedProduct'] =$this->Post_model->fatch_related_product($cate);
			$data['fatchViewProduct'] = $this->Post_model->view_product($id);
			$data['content'] = 'viewProduct';
			$this->load->view('FrontEnd/homeMaster',$data);
		}	
	}




	/*=======================================*/
	/*=======================================*/
	public function Corporate_Client()
	{	
		$data['fatchClient'] = $this->Corporate_model->all_Corporate_list();
		$data['content'] = 'Corporate_Client';
		$this->load->view('FrontEnd/homeMaster',$data);	
	}



	/*=======================================*/
	/*=======================================*/
	public function User_Comment_page()
	{	
		$data['fatchComment'] = $this->User_model->fatch_all_Comment();
		$data['content'] = 'comment_page';
		$this->load->view('FrontEnd/homeMaster',$data);	
	}


	/*========================================*/
	/*========================================*/
	public function post_comment()
	{
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			$this->form_validation->set_rules('comment','Comment','required|trim');
			if($this->form_validation->run() == FALSE)
			{
				$data['content'] = 'comment_page';
				$this->load->view('FrontEnd/homeMaster',$data);	
			}
			else{
				if($this->User_model->insert_comment()){
						$data['message']="Successfully!";
						$this->session->set_flashdata($data);
						redirect('UserComment');
				}else{
					$data['message2']="Unsuccessfully!";
					$this->session->set_flashdata($data);
					redirect('UserComment');
				}
			}
		}

	}



	/*=======================================*/
	/*=======================================*/
	public function PhotoGallery()
	{	
		$data['fatchGalleryImage'] = $this->Gallery_model->all_gallery_list();
		$data['content'] = 'photo_gallery';
		$this->load->view('FrontEnd/homeMaster',$data);	
	}



	/*=======================================*/
	/*=======================================*/
	public function Contact_Us()
	{	
		$data['fatchContactInfo'] = $this->Contact_model->show_contact_us();
		$data['content'] = 'Contact_Us';
		$this->load->view('FrontEnd/homeMaster',$data);	
	}






}
