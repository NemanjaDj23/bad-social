<h1>BadSocial</h1>
<p>
    BadSocial represents a primitive social network that was created in Laravel as a task for practic.
</p>

<h2>Installation</h2>

<h3>Linux</h3>



<h4>Step 1. Clone GitHub repo for this project locally</h4>
<p>
    Find a location on your computer where you want to store the project and run the following command. 
</p>
<pre>git clone linktogithubrepo.com/ projectName</pre>
<p>
    <em>
        <strong>Note:</strong> Make sure you have git installed locally on your computer first.
    </em>
</p>
<p>
    To get the link to the repo, just visit the github page and click on the green “clone or download” button on the right hand side. This will reveal a url that you will replace in the linktogithub.com part of the snippet above.
</p>
<p>    
    You can change the name of this folder it creates, by changing the last part of the code snippet above to match the name you want your folder to be called.
</p>



<h4>Step 2. cd into your project</h4>
<p>
    You will need to be inside that project file to enter all of the rest of the commands. So remember to type cd projectName to move your terminal working location to the project file we just barely created. (Of course substitute “projectName” in the command above, with the name of the folder you created in the previous step).
</p>



<h4>Step 3. Install Composer Dependencies</h4>
<p>
    Whenever you clone a new Laravel project you must now install all of the project dependencies. This is what actually installs Laravel itself, among other necessary packages to get started.
</p>
<p>
    When we run composer, it checks the composer.json file which is submitted to the github repo and lists all of the composer (PHP) packages that your repo requires. Because these packages are constantly changing, the source code is generally not submitted to github, but instead we let composer handle these updates. So to install all this source code we run composer with the following command.
</p>
<pre>
    composer install
</pre>



<h4>Step 4. Install NPM Dependencies</h4>
<p>
    Just like how we must install composer packages to move forward, we must also install necessary NPM packages to move forward. This will install Vue.js, Bootstrap.css, Lodash, and Laravel Mix.
</p>
<p>
    This is just like step 4, where we installed the composer PHP packages, but this is installing the Javascript (or Node) packages required. The list of packages that a repo requires is listed in the packages.json file which is submitted to the github repo. Just like in step 4, we do not commit the source code for these packages to version control (github) and instead we let NPM handle it.
</p>
<pre>
    npm install
</pre>



<h4>Step 5. Create a copy of your .env file<h4>
<p>
    .env files are not generally committed to source control for security reasons. But there is a .env.example which is a template of the .env file that the project expects us to have. So we will make a copy of the .env.example file and create a .env file that we can start to fill out to do things like database configuration in the next few steps.
</p>
<pre>
    cp .env.example .env
</pre>
<p>
    This will create a copy of the .env.example file in your project and name the copy simply .env.
</p>



<h4>Step 7. Generate an app encryption key</h4>
<p>
    Laravel requires you to have an app encryption key which is generally randomly generated and stored in your .env file. The app will use this encryption key to encode various elements of your application from cookies to password hashes and more.
</p>
<p>
    Laravel’s command line tools thankfully make it super easy to generate this. In the terminal we can run this command to generate that key. (Make sure that you have already installed Laravel via composer and created an .env file before doing this, of which we have done both).
</p>
<pre>
    php artisan key:generate
</pre>
<p>
    If you check the .env file again, you will see that it now has a long random string of characters in the APP_KEY field. We now have a valid app encryption key.
</p>