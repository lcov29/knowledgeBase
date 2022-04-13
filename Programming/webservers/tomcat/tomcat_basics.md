Source: [JournalDev](https://www.journaldev.com/39819/install-tomcat-on-linux)

<br>
<br>

## Installation
<br>

1. Install Java Development Kit
<br>

2. Create Tomcat Directory /opt/tomcat
<br>

3. Download Tomcat to /opt/tomcat
<br>

4. Extract Tomcat
    
    ```bash
    sudo tar -xzf <tomcat_download>.tar.gz 
    ```
<br>

5. Create symbolic link for installation directory
   ```bash
   sudo ln -s /opt/tomcat/<installation_directory> /opt/tomcat/updated
   ```
<br>

6. Create tomcat user

    ```bash
    sudo useradd -r -m -U -d /opt/tomcat -s /bin/false tomcat
    ```
    - -r: create a system account (no aging information etc.)
    - -m: create user´s home directory if it does not exist
    - -U: create group with the same user name and add user to this group
    - -d: specifies the home directory
    - -s: specifies the login shell of the user (/bin/false prevents ability to log in as the created user)
  
<br>

7. Grant tomcat user ownership of tomcat installation directory and all its content
   ```bash
   sudo chown -R tomcat: /opt/tomcat
   ```
<br>

8. Grant execution permissions to all scripts in /opt/tomcat/updated/bin
   ```bash
   sudo sh -c 'chmod +x /opt/tomcat/updated/bin/*.sh'
   ```
<br>
<br>
<br>

## Configuration
<br>
<br>

1. Create systemd unit
   ```bash
   sudo vim /etc/systemd/system/tomcat.service
   ```
   <br>

   Copy to file and update environment variable JAVA_HOME:
   ```
    [Unit]
    Description=Apache Tomcat Web Application Container
    After=network.target
    
    [Service]
    Type=forking
    
    Environment="JAVA_HOME=/usr/lib/jvm/java-1.11.0-openjdk-amd64"
    Environment="CATALINA_PID=/opt/tomcat/updated/temp/tomcat.pid"
    Environment="CATALINA_HOME=/opt/tomcat/updated/"
    Environment="CATALINA_BASE=/opt/tomcat/updated/"
    Environment="CATALINA_OPTS=-Xms512M -Xmx1024M -server -XX:+UseParallelGC"
    Environment="JAVA_OPTS=-Djava.awt.headless=true -Djava.security.egd=file:/dev/./urandom"
    
    ExecStart=/opt/tomcat/updated/bin/startup.sh
    ExecStop=/opt/tomcat/updated/bin/shutdown.sh
    
    User=tomcat
    Group=tomcat
    UMask=0007
    RestartSec=10
    Restart=always
    
    [Install]
    WantedBy=multi-user.target
   ```
   <br>

2. Reload the daemon to use new file

    ```bash
    sudo systemctl daemon-reload  
    ```
    <br>

3. Start Tomcat service
   ```bash
   sudo systemctl start tomcat
   ```
   <br>

4. \[OPTIONAL\] Start Tomcat upon system start
   ```bash
   sudo systemctl enable tomcat
   ```