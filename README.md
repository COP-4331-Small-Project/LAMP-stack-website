# MyHogwarts - Contact Manager
This web application is for the COP4331 class's small project. This is group 15.

## Setup
Note: `<project directory` is the PhpStorm project directory. This is located in `<user dir>/PhpStorm Projects/<project name>`.
1. Install [PhpStorm](https://www.jetbrains.com/phpstorm/) for your operating system. You can apply for an education license to get it for free.
    1. Once installed, open it an import the project from GitHub.
2. Install PHP and MySQL. This varies based on your OS.
    + For Windows users:
        1. Install [Chocolatey](https://chocolatey.org/install), a Windows packaging manager.
        2. Install PHP (run in admin PowerShell): `choco install php`
        3. Install MySQL: `choco install mysql`
    + For Mac users:
        1. Install PHP: `curl -s https://php-osx.liip.ch/install.sh | bash -s 7.3`
        2. Install [MySQL](http://dev.mysql.com/downloads/mysql/).
        3. Connect PHP and MySQL together:
            ```shell script
               sudo su -
               cd /var
               mkdir mysql
               cd mysql
               ln -s /tmp/mysql.sock mysql.sock
            ```
    + For Ubuntu users:
        1. Run the following commands:
            ```shell script
            sudo apt update
            sudo apt install mysql-server php php-mysql
            ```
           
3. All OS's: PhpStorm needs to know what PHP interpreter to use. Make sure it knows which to use:
    1. In PhpStorm, go to File > Settings (Ctrl+Alt+S)
    2. Go to Languages & Frameworks > PHP
    3. Click the ellipses on the right
    4. Click the + icon
    5. Select which binary to use
    6. Restart PhpStorm
        
4. Create a new database in PhpStorm.
	1. Open PhpStorm.
	2. Go-to
	```
	 View -> Tool Windows -> Database
	```
	3. Go to the new tab opened on the right and click on the plus on the top left. Hover over Data Source and click on MySQL.
	4. We need to change a couple of options in the window that popped up.
	In the **Host**,**User**,**Password** field place your database credentials for smallproject.
	At the bottom of the window, click **Download missing driver files link.**
    5. Click okay.

        
All done! You may now access the application from http://localhost:3000

If you cannot see the application, launch PhpStorm and click the browser icon in the editor.
