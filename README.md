# codeigniter-bootstrap-jquery
A great startup framework based on CodeIgniter, Bootstrap, jQuery and Lighbox. I am currently using CodeIgniter 3.0.6, Bootstrap 3.3.6, jQuery 1.10.2 and ekko-lightbox. All the credit goes the authors of the mentioned piece of code. What I have done is simply joined them together so that others can easily pick it up and get going for their projects.

Here a few steps to get started:
1) Edit application/views/common/header.php, go to line 
><title><?php echo $pageTitle; ?> | Website's Name</title>
and change Website's Name to your site's name

2) To use MySQL with your application, please set necessary credentials in you database config,  application/config/database.php as follows:
-If using PDO(highly recommended), please set 
>$db['default'] = array(
>	'dsn'	=> '',
  
-Otherwise, please set at least
>	'username' => '',
>	'password' => '',
>	'database' => '',
  
By default, the application requires authentication. To disable this feature, edit application/config/config.php and set
>$config['enable_hooks'] = FALSE;
