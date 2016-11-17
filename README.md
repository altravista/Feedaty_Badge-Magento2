<h1>FEEDATY BADGE</h1>
---------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------
Feedaty is a social commerce site dedicated to online stores for the professional management of customer feedback. 
The service is provided through a platform Saas (Software as a Service) and may be activated quickly and easily through a short integration process.

<h3>REQUIRED MAGENTO MODULES</h3>

- magento/framework: 					100.0.* 

- magento/module-store: 				100.0.* 

- magento/module-catalog: 				100.0.* 

- magento/module-customer: 				100.0.* 

- magento/module-rewrite: 				100.0.* 

- magento/module-bundle					100.0.* 

- magento/module-cache-invalidate		100.0.* 

- magento/module-catalog-url-rewrite	100.0.* 

- magento/module-url-rewrite 			100.0.* 

- magento/module-cron					100.0.* 

- magento/module-sales					100.0.* 

- magento/module-translation			100.0.* 

- magento/module-widget					100.0.* 

<h3>SUGGEST</h3>

We suggest to set all Magento default module enabled

<h3>REQUIRED SERVER CONFIGURATIONS</h3>

- php >=5.5.38 | php ~5.6.0 | php ~7.0.0

- php-curl 


---------------------------------------------------------------------------------------------------------------------
<h2>INSTALL FEEDATY MODULE</h2>
---------------------------------------------------------------------------------------------------------------------

<h3>DOWNLOAD AND INSTALL WITH COMPOSER</h3>

Login with the owner of the magento installation, after you must enter below commands:
<ol>
<li> Add https://packagist.org in your project repositories</li>

<li> type </li>
```bash
 # cd /var/www/path/to/your/magento-root-dir
```

<li> now type</li>
 ```bash
 # composer require feedaty/module-badge2
```

<h3>DOWNLOAD AND INSTALL FROM MAGENTO MARKETPLACE</h3>	
</ol>
we'll provide as soon as possible


---------------------------------------------------------------------------------------------------------------------
<h2>ENABLE FEEDATY MODULE</h2>
---------------------------------------------------------------------------------------------------------------------

<h3>ENABLE FEEDATY MODULE FROM COMPONENT MANAGER</h3>

<ol>
<li> Clink on "System Config" in the left sidebar menu.</li>

<li> Click on "Web Setup Config".</li>

<li> Click on "Component Manager".</li>

<li> Enable "feedaty/module-badge".</li>
</ol>

If a blank page returned, maybe you haven't a right configuration in your
Magento installation.

If the apache error log report a permission denied on var 
directory, run command:

```bash
 # chown -R apache:apache 
 ```
For Centos users.


```bash
 # chown -R www-data:www-data on "path/to/your/magento-root-dir/var"
```
For Debian/Ubuntu users.


<h3>ENABLE MODULE FROM MAGENTO CONSOLLE</h3>


Login with the owner of the magento installation, after you must enter below commands:

```bash
 # cd /var/www/path/to/your/magento-root-dir

 # bin/magento module:enable Feedaty_Badge
```
 consolle ask to run setup:di:compile command, you can avoid enter this command
 if you enter "setup:di:compile" command.
 Don't forget to check permissions to 
 "path/to/your/magento-root-dir/var" directory, otherwise a zend exeption rise
 because magento can't write cache in var directory.

----------------------------------------------------------------------------------------------------------------------
<h2>SETUP/CONFIG FEEDATY WIDGETS</h2>
----------------------------------------------------------------------------------------------------------------------

To setup Feedaty Widgets follow these steps;

<ol>
<li> Click on "Stores" in the left-side bar menu. </li>

<li> Click on "Configurations". </li>

<li> Select the default scope, and insert Feedaty Merchant Code provided. </li>

<li> Select preferences aboute module design, and set on enable widgets and/or product reviews. </li>

<li> check in other scopes, the configurations must works on the store scope. </li>
</ol>

-----------------------------------------------------------------------------------------------------------------------
<h2>DISABLE FEEDATY MODULE</h2>
-----------------------------------------------------------------------------------------------------------------------

<h3>Disable feedaty module from backend</h3>

same procedure like enabling, when you arrive in "component manager", select "Disable" and save your configuration.

<h3>Disable feedaty module from Magento Consolle.</h3>

Login with the owner of the magento installation, after you must enter below commands:

```bash
 # cd /var/www/path/to/your/magento-root-dir

 # bin/magento module:disable Feedaty_Badge
```
to clear static contents you can append "--clear-static-contents" in module:disable command
If you append "--clear-static-contents" don't forget to run

 # bin/magento setup:di:compile
 # bin/magento setup:static-content:deploy

------------------------------------------------------------------------------------------------------------------------
<h2>INFOS AND CONTACTS </h2>
------------------------------------------------------------------------------------------------------------------------

Websites:
www.zoorate.com
www.feedaty.com

E-Mail:
info@feedaty.com

------------------------------------------------------------------------------------------------------------------------
<h2>LICENSE</h2>
------------------------------------------------------------------------------------------------------------------------


