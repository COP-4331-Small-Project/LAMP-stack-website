# MyHogwarts - Contact Manager
This web application is for the COP4331 class's small project. This is group 15.

## Setup
Note: `<project directory` is the PhpStorm project directory. This is located in `<user dir>/PhpStorm Projects/<project name>`.
1. Install [PhpStorm](https://www.jetbrains.com/phpstorm/) for your operating system. You can apply for an education license to get it for free.
    1. Once installed, open it an import the project from GitHub.
2. Install Apache2, PHP, and MySQL. This varies based on your OS.
    + For Windows users:
        1. Set up [Windows Subsystem for Linux](https://docs.microsoft.com/en-us/windows/wsl/install-win10) (WSL).
        2. Install Ubuntu as your Linux distro on the Windows Store.
        3. Open the Ubuntu app.
        4. Follow the Ubuntu installation instructions.
    + For Mac users (Mojave):
        1. Start the Apache service: `sudo apachectl start`
        2. Edit the httpd.conf file with `open -a TextEdit filename`. Uncomment `LoadModule php5_module libexec/apache2/libphp5.so`.
           Also change `DocumentRoot "/Library/WebServer/Documents"` to `DocumentRoot "<project directory>"`
        3. Install [MySQL](http://dev.mysql.com/downloads/mysql/).
        4. Connect PHP and MySQL together:
            ```shell script
               cd /var
               mkdir mysql
               cd mysql
               ln -s /tmp/mysql.sock mysql.sock
            ```
         5. Restart Apache: `apachectl restart`
    + For Ubuntu users:
        1. Run the following commands:
            ```shell script
            sudo apt update
            sudo apt install apache2 mysql-server php libapache2-mod-php php-mysql
            ```
        2. Edit `/etc/apache2/sites-available/000-default.conf`. Change Line 12 to
            `DocumentRoot <project directory>`. *Do not include the angle braces.*
            + **FOR WINDOWS USERS**: Instead of your path saying `C:/...`, make it `/mnt/c/...`
        3. Edit `/etc/apache2/apache2.conf`. Change Line 159-163 to the following:
            ```text
               <Directory />
                       Options Indexes FollowSymLinks Includes ExecCGI
                       AllowOverride All
                       Require all granted
               </Directory>
            ```
        4. Restart the Apache service: `sudo systemctl apache2 restart`
        
All done! You may now access the application from http://localhost

If you cannot see the application, launch PhpStorm and click the browser icon in the editor.

## VIM Help
*Maybe try Nano first. It looks simpler, but I don't use it personally.*

Unfortunately, WSL does not allow file editing from Windows to Linux, so unless you're willing to give
this [random article](https://www.lambrospetrou.com/articles/windows-linux-subsystem-editor-setup/) a try that
I found on getting VSCode/Sublime Text to work with WSL, you'll have to use VIM. The basic pointers are:
+ Open VIM with the command: `sudo vim <file path>`
    + The `sudo` part is so you can edit file with permissions
+ Press `i` to enter INSERT mode. This is what lets you type into the file.
+ Press `esc` to exit a mode.
+ While not in a mode, type `:q` to quit, `:wq` to save and quit,
`:q!` to exit without saving changes.
+ Press `Ctrl+Shift+V` to paste, `Ctrl+Shift+C` to copy selection.
+ Press the arrow keys to move the blinking cursor.

This is all you should need to make the required edits. If you get lost, spamming `esc` a bunch of times
helps to get out of any weird mode. From there, you can do everything described above.
