<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'Home';
$route['404_override'] 			= 'Home/error';
$route['translate_uri_dashes'] 	= FALSE;



/*=================================*/
$route['AboutUs']			= 	"Home/AboutUs";

/*=================================*/
$route['Services']			= 	"Home/Services";

/*=================================*/
$route['TermsCondition']	= 	"Home/TermsCondition";

/*=================================*/
$route['FAQ']				= 	"Home/FAQ";

/*=================================*/
$route['Payment']			= 	"Home/Payment";

/*=================================*/
$route['PhotoGallery']		= 	"Home/PhotoGallery";

/*=================================*/
$route['CorporateClient']	= 	"Home/Corporate_Client";

/*=================================*/
$route['UserComment']		= 	"Home/User_Comment_page";

/*=================================*/
$route['postComment']		= 	"Home/post_comment";

/*====================================*/
$route['ContactUs']			= 	"Home/Contact_Us";

/*====================================*/
$route['sendFeedback']		= 	"Users/send_user_feedback";



/*===============Products==================*/
/*===============Products==================*/
$route['CategoryProduct/(:any)/(:any)/(:any)']= "Home/CategoryProduct/$1/$2/$3";
$route['SubCategoryProduct/(:any)/(:any)/(:any)']="Home/SubCategoryProduct/$1/$2/$3";
$route['CategoryPaymentRule']		= 	"Home/CategoryPaymentRule";
// $route['CategoryProduct']			= 	"Home/CategoryProductDetails";
$route['CityProduct/(:any)/(:any)/(:any)']= "Home/CityProduct/$1/$2/$3";
$route['ZoneProduct/(:any)/(:any)/(:any)/(:any)']="Home/ZoneProduct/$1/$2/$3/$4";
$route['viewProduct/(:any)/(:any)/(:any)'] = "Home/viewProduct/$1/$2/$3";

$route['Category-Product/(:any)']		= "Home/user_category_products/$1";
$route['Sub-CategoryProduct/(:any)']	= "Home/user_sub_category_products/$1";
$route['City-Product/(:any)']			= "Home/user_City_products/$1";

$route['UserSearchProduct/(:any)']		= 	"Home/User_SearchProduct/$1";
// WA-Without Access
$route['UserWASearchProduct/(:any)']	=   "Home/User_WASearchProduct/$1";
$route['SearchProduct/(:any)']			= 	"Home/SearchProduct/$1";




/*========Regester User=========*/
/*========Regester User=========*/
$route['signIn'] 					= 	"Users/signIn_page";
$route['signUp'] 					= 	"Users/signUp_page";
$route['registerPlease'] 			= 	"Users/register_or_payment_Please";
$route['registerUser'] 				= 	"Users/register_user_data_check";
$route['User-Dashboard'] 			= 	"Users/index";
$route['e_userInfo/(:any)'] 		= 	"Users/edit_user_info/$1";
$route['update_userInfo/(:any)'] 	= 	"Users/update_user_info/$1";
$route['changeProfile/(:any)'] 		= 	"Users/change_Profile/$1";
$route['UpdateProfile/(:any)'] 		= 	"Users/Update_Profile/$1";


// Admin View==============
$route['PendingRegisterUser'] 		= 	"Users/Pending_Register_User";
$route['ApproveUser'] 				= 	"Users/Approve_User";
$route['viewSingleUser/(:any)'] 	= 	"Users/view_Single_User/$1";
$route['moreCategoryAccess/(:any)'] = 	"Users/more_category_access/$1";
$route['insertCategoryAccess']		=	"Users/insert_more_category_access";
$route['member_Id_pass/(:any)'] 	= 	"Users/create_id_pass/$1";
$route['updateMemberIdPass/(:any)'] = 	"Users/update_Member_Id_Pass/$1";






/*========Post User=========*/
$route['PostProduct'] 			= 	"Post/buyer_seller_Post_page";
$route['SavePostProduct'] 		= 	"Post/save_Post_Product_data_check";
$route['e_Product/(:any)'] 		= 	"Post/edit_user_Product/$1";
$route['UpdatePostProduct/(:any)'] = "Post/update_post_product/$1";


// Admin View=================
$route['PendingPost'] 			= 	"Post/fatch_pending_post";
$route['viewSinglePost/(:any)'] = 	"Post/view_Single_Post/$1";
$route['approvePost']			= 	"Post/fatch_approve_post";








// =====================login Admin================
// =====================login Admin================
$route['login/admin']	= 	"Login/loginPage";




// =====================Admin Panel================
// =====================Admin Panel================
// =====================Admin Panel================



$route['ViewComment']			= 	"Users/View_Comment";
$route['d_comment/(:any)']		= 	"Users/delete_Comment/$1";

$route['singleFeedback/(:any)']	= 	"Users/single_feedback/$1";
$route['seenFeedback']			= 	"Users/seenFeedback";




/*===========Add About Us==========*/
$route['add_about']					= "Aboutus/add_aboutus";
$route['saveAbout'] 				= "Aboutus/save_about";
$route['About_update/(:any)'] 		= "Aboutus/update_about_data_check/$1";


/*===========Add About Us==========*/
$route['footer_aboutUs']			= "Aboutus/add_footer_aboutUs";
$route['savefooter_aboutUs'] 		= "Aboutus/save_footer_aboutUs";
$route['footer_aboutUs_update/(:any)'] = "Aboutus/update_footer_aboutUs/$1";



/*===========Add Service==========*/
$route['add_Service']				= "Service/add_Service";
$route['saveService'] 				= "Service/save_Service";
$route['Service_update/(:any)'] 	= "Service/update_Service_data_check/$1";


/*===========Add Terms==========*/
$route['add_Terms']					= "Terms/add_Terms";
$route['saveTerms'] 				= "Terms/save_Terms";
$route['Terms_update/(:any)'] 		= "Terms/update_Terms_data_check/$1";


/*===========Add FAQ==========*/
$route['add_Faq']					= "Faq/add_Faq";
$route['saveFaq'] 					= "Faq/save_Faq";
$route['Faq_update/(:any)'] 		= "Faq/update_Faq_data_check/$1";


/*===========Add Payment==========*/
$route['add_Payment']				= "Payment/add_Payment";
$route['savePayment'] 				= "Payment/save_Payment";
$route['Payment_update/(:any)'] 	= "Payment/update_Payment_data_check/$1";




/*=======Add Category Info=========*/
$route['addPriceType'] 				= "PriceType/addPriceType";
$route['savePriceType'] 			= "PriceType/savePriceType";
$route['e_PriceType/(:any)'] 		= "PriceType/edit_PriceType/$1";
$route['update_PriceType/(:any)'] 	= "PriceType/update_PriceType_data_check/$1";




/*=======Add Category Info=========*/
$route['addPhoneCode'] 				= "PhoneCode/addPhoneCode";
$route['savePhoneCode'] 			= "PhoneCode/savePhoneCode";
$route['e_PhoneCode/(:any)'] 		= "PhoneCode/edit_PhoneCode/$1";
$route['update_PhoneCode/(:any)'] 	= "PhoneCode/update_PhoneCode_data_check/$1";




/*=======Add Category Info=========*/
$route['addCategory'] 				= "Category/addCategory";
$route['saveCategory'] 				= "Category/saveCategory";
$route['e_Category/(:any)'] 		= "Category/edit_Category/$1";
$route['update_Category/(:any)'] 	= "Category/update_Category_data_check/$1";



/*=======Add Category Info=========*/
$route['addCategoryDetails'] 			= "Category/addCategoryDetails";
$route['saveCategoryDetails'] 			= "Category/saveCategoryDetails";
$route['update_CategoryDetails/(:any)']	= "Category/update_CategoryDetails/$1";


/*=======Add Sub Category Info=========*/
$route['addSubCategory'] 			= "Subcategory/addSubCategory";
$route['saveSubCategory'] 			= "Subcategory/saveSubCategory";
$route['e_SubCategory/(:any)'] 		= "Subcategory/edit_SubCategory/$1";
$route['update_SubCategory/(:any)'] = "Subcategory/update_SubCategory_data_check/$1";


/*=======Add Area Info=========*/
$route['addCountry'] 				= "Area/addCountry";
$route['saveCountry'] 				= "Area/saveCountry";
$route['e_Country/(:any)'] 			= "Area/edit_Country/$1";
$route['update_Country/(:any)'] 	= "Area/update_Country_data_check/$1";


/*=======Add Area Info=========*/
$route['addCity'] 					= "Area/addCity";
$route['saveCity'] 					= "Area/saveCity";
$route['e_City/(:any)'] 			= "Area/edit_City/$1";
$route['update_City/(:any)'] 		= "Area/update_City_data_check/$1";


/*=======Add Area Info=========*/
$route['addArea'] 					= "Area/addArea";
$route['saveArea'] 					= "Area/saveArea";
$route['e_Area/(:any)'] 			= "Area/edit_Area/$1";
$route['update_Area/(:any)'] 		= "Area/update_Area_data_check/$1";



/*=======Add Contact Info=======*/
$route['add_contact'] 			= "Contact/add_contactus";
$route['save_contact']			= "Contact/save_contact";
$route['update_contact/(:any)'] = "Contact/update_contact_data_check/$1";


/*=======Add Contact Info=======*/
$route['footer_contact'] 			= "Contact/footer_contact";
$route['save_footer_contact']		= "Contact/save_footer_contact";
$route['update_footer_contact/(:any)'] = "Contact/update_footer_contact_data_check/$1";


/*===========Add Slider=========*/
$route['add_slideImage'] 			= "Sliders/add_slider";
$route['saveImage'] 				= "Sliders/add_slider_data_check";
$route['d_slider/(:any)/(:any)'] 	= "Sliders/slider_delete/$1/$2";




/*==================Add Gallery=================*/
$route['add_gallery'] 				= "Gallery/add_gallery";
$route['savegallery'] 				= "Gallery/add_gallery_data_check";
$route['e_gallery/(:any)'] 			= "Gallery/edit_gallery/$1";
$route['update_gallery/(:any)'] 	= "Gallery/update_gallery_data_check/$1";
$route['d_gallery/(:any)/(:any)'] 	= "Gallery/gallery_delete/$1/$2";




/*==================Add Gallery=================*/
$route['addCorporate'] 				= "Corporate/addCorporate";
$route['saveCorporate'] 			= "Corporate/Corporate_data_check";
$route['e_Corporate/(:any)'] 		= "Corporate/edit_Corporate/$1";
$route['update_Corporate/(:any)'] 	= "Corporate/update_Corporate_data_check/$1";
$route['d_Corporate/(:any)/(:any)'] = "Corporate/Corporate_delete/$1/$2";





/*========Create Admin=========*/
$route['add_admin'] 			= "Admin/add_admin";
$route['saveAdminData'] 		= "Admin/add_admin_data_check";
$route['e_admin/(:any)']		= "Admin/edit_admin/$1";
$route['admin_update/(:any)'] 	= "Admin/edit_admin_data_check/$1";
$route['d_admin/(:any)'] 		= "Admin/admin_delete/$1";

// Access Admin
$route['access_admin/(:any)']	= "Admin/access_admin/$1";
$route['defineAccess/(:any)']	= "Admin/define_access/$1";

