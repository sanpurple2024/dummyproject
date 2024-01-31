<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Admin routing

$route['master'] = 'Home/login_admin';
$route['login_check'] = 'master/login/login_check';
$route['master/dashboard'] = 'master/dashboard';
$route['admin_logout'] = 'master/login/admin_logout';
$route['master_forget_password'] = 'master/login/master_forget_password';
$route['admin_forget_pwd'] = 'master/login/admin_forget_pwd';
// $route['master/ad_product_listing'] = 'master/product/ad_product_listing';
// $route['master/product_review'] = 'master/product/product_review';
// $route['master/review_delete/(:any)'] = 'master/product/review_delete/$1';
// $route['product_listing_filter'] = 'master/product/product_listing_filter';
$route['master/ad_web_settings'] = 'master/web_settings';
$route['master/web_settings/ad_submit_web_setting'] = 'master/web_settings/ad_submit_web_setting';
// $route['master/product_status/(:any)/(:any)'] = 'master/product/product_status/$1/$2';
// $route['master/product_delete/(:any)'] = 'master/product/product_delete/$1';
// $route['master/product_edit/(:any)'] = 'master/product/product_edit/$1';
// $route['master/product_add'] = 'master/product/product_add';
// $route['master/product_upload_excel'] = 'master/product/product_upload_excel';
// $route['master/product_download_excel'] = 'master/product/product_download_excel';
// $route['master/upload_product_file'] = 'master/product/upload_product_file';
$route['master/ad_change_password'] = 'master/user_management/ad_change_password';
$route['master/admin_history'] = 'master/user_management/admin_history';
$route['master/admin_edit_profile'] = 'master/user_management/admin_edit_profile';
// $route['master/ad_customer_listing'] = 'master/customer/ad_customer_listing';
// $route['master/add_customer'] = 'master/customer/add_customer';
// $route['master/edit_customer/(:any)'] = 'master/customer/edit_customer/$1';
$route['master/change_password/(:any)'] = 'master/customer/change_password/$1';
$route['master/get_state'] = 'master/customer/get_state';
$route['master/get_city'] = 'master/customer/get_city';
$route['master/ad_enquiries'] = 'master/enquires/enquiries_listing';
$route['master/career_enquiries_delete/(:any)'] = 'master/enquires/career_enquiries_delete/$1';
$route['master/career_enquiries'] = 'master/enquires/career_enquiries';
$route['master/contact_us_enquiries_delete/(:any)'] = 'master/enquires/contact_us_enquiries_delete/$1';
// $route['master/ad_testimonials_listing'] = 'master/testimonials/testimonials_listing';
// $route['master/testimonials_add'] = 'master/testimonials/testimonials_add';
// $route['master/testimonials_edit/(:any)'] = 'master/testimonials/testimonials_edit/$1';
$route['master/testimonials_status/(:any)/(:any)'] = 'master/testimonials/testimonials_status/$1/$2';
// $route['master/testimonials_delete/(:any)'] = 'master/testimonials/testimonials_delete/$1';
// $route['master/cms_pages'] = 'master/cms_management/cms_pages_listing';
$route['master/contact_us_details'] = 'master/cms_management/contact_us_details';
$route['master/contact_us_submit'] = 'master/cms_management/contact_us_submit';
// $route['master/add_category'] = 'master/master/add_category';
// $route['master/category_list'] = 'master/master/category_list';
// $route['master/categories_edit/(:any)'] = 'master/master/categories_edit/$1';
// $route['master/change_cms_delete/(:any)'] = 'master/cms_management/change_cms_delete/$1';
// $route['master/categories_status/(:any)/(:any)'] = 'master/master/categories_status/$1/$2';
// $route['master/sub_category_list'] = 'master/master/sub_category_list';
// $route['master/add_subcategory'] = 'master/master/add_subcategory';
// $route['master/brand_listing'] = 'master/master/brand_listing';
// $route['master/add_brand'] = 'master/master/add_brand';
// $route['master/add_cms_page'] = 'master/cms_management/add_cms_page';
// $route['master/cms_pages_edit/(:any)'] = 'master/cms_management/cms_pages_edit/$1';
$route['master/faqs'] = 'master/cms_management/faqs_listing';
$route['master/add_faq'] = 'master/cms_management/add_faq';
$route['master/edit_faq/(:any)'] = 'master/cms_management/edit_faq/$1';
// $route['master/ad_banners'] = 'master/cms_management/ad_banners';
// $route['master/banners_delete/(:any)'] = 'master/cms_management/banners_delete/$1';
// $route['master/add_banner'] = 'master/cms_management/add_banner';
// $route['master/edit_banner/(:any)'] = 'master/cms_management/edit_banner/$1';
$route['master/ad_blog'] = 'master/cms_management/ad_blog';
$route['master/add_blog'] = 'master/cms_management/add_blog';
$route['master/edit_blog/(:any)'] = 'master/cms_management/edit_blog/$1';
$route['master/faqs_delete/(:any)'] = 'master/cms_management/faqs_delete/$1';
// ;
// $route['master/sub_categories_edit/(:any)'] = 'master/master/sub_categories_edit/$1';
// $route['master/categories_delete/(:any)'] = 'master/master/categories_delete/$1';
// $route['master/sub_categories_delete/(:any)'] = 'master/master/sub_categories_delete/$1';
// $route['master/logout'] = 'master/login/logout';
// $route['master/brand_name_edit/(:any)'] = 'master/master/brand_name_edit/$1';
// $route['master/brand_name_delete/(:any)'] = 'master/master/brand_name_delete/$1';
// $route['master/sub_categories_status/(:any)/(:any)'] = 'master/master/sub_categories_status/$1/$2';
// $route['master/brand_name_status/(:any)/(:any)'] = 'master/master/brand_name_status/$1/$2';
// $route['master/banners_status/(:any)/(:any)'] = 'master/cms_management/banners_status/$1/$2';
// $route['master/blog_status/(:any)/(:any)'] = 'master/cms_management/blog_status/$1/$2';
// $route['master/change_customer_status/(:any)/(:any)'] = 'master/customer/change_customer_status/$1/$2';
// $route['master/change_customer_delete/(:any)'] = 'master/customer/change_customer_delete/$1';
$route['master/blog_delete/(:any)'] = 'master/cms_management/blog_delete/$1';
// $route['master/cod_listing/(:any)'] = 'master/order/cod_listing/$1';
// $route['master/order_listing/(:any)'] = 'master/order/order_listing/$1';
// $route['master/order_delete/(:any)/(:any)'] = 'master/order/order_delete/$1/$2';
// $route['master/change_cod_status'] = 'master/order/change_cod_status';
// $route['master/order_cod_delete/(:any)/(:any)'] = 'master/order/order_cod_delete/$1/$2';
// $route['master/orders_invoice/(:any)/(:any)'] = 'master/order/orders_invoice/$1/$2';
// $route['master/order_invoice/(:any)'] = 'master/order/order_invoice/$1';
// $route['master/download_order/(:any)'] = 'master/order/download_order/$1';




// $route['products/(:any)'] = 'Products/all_products/$1';
// $route['category/(:any)'] = 'Products/category/$1';
// $route['favourite_product'] = 'Products/favourite_product';
// $route['search_pro'] = 'Products/search_pro';
// $route['product/(:any)'] = 'product/index/index/$1';



//Frontend

$route['social-media-marketing'] = 'Home/social_media_marketing';
$route['seo'] = 'Home/seo';
$route['requirement'] = 'Home/requirement';
$route['about'] = 'Home/about';
$route['subscribe_submit'] = 'Home/subscribe_submit';
$route['contact'] = 'Home/contact';
$route['career'] = 'Home/career';
$route['blog'] = 'Home/blog';
$route['blog-details/(:any)'] = 'Home/blog_details/$1';
$route['blog-category/(:any)'] = 'Home/blog_category/$1';
$route['portfolio'] = 'Home/portfolio';
$route['Ecommerce-development'] = 'Home/ecommerce_development';
$route['connect-now'] = 'Home/connect_now';
$route['mobileapp-development'] = 'Home/mobileapp_development';
$route['visual-branding'] = 'Home/visual_branding';
$route['hire-web-developer'] = 'Home/hire_web_developer';
$route['web-development'] = 'Home/web_development';
$route['shedule-call'] = 'Home/shedule_call';
$route['website-design'] = 'Home/website_design';
$route['lead-generation'] = 'Home/lead_generation';
$route['content-marketing'] = 'Home/content_marketing';
$route['influancer-marketing'] = 'Home/influancer_marketing';

