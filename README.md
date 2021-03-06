<h1>BadSocial</h1>
<p>
    BadSocial represents a primitive social network that was created in Laravel as a task for practice.
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
    You will need to be inside that project file to enter all of the rest of the commands. So remember to type <code>cd projectName</code> to move your terminal working location to the project file we just barely created. (Of course substitute “projectName” in the command above, with the name of the folder you created in the previous step).
</p>



<h4>Step 3. Install Composer Dependencies</h4>
<p>
    Whenever you clone a new Laravel project you must now install all of the project dependencies. This is what actually installs Laravel itself, among other necessary packages to get started.
</p>
<p>
    When we run composer, it checks the <code>composer.json</code> file which is submitted to the github repo and lists all of the composer (PHP) packages that your repo requires. Because these packages are constantly changing, the source code is generally not submitted to github, but instead we let composer handle these updates. So to install all this source code we run composer with the following command.
</p>
<pre>
    composer install
</pre>



<h4>Step 4. Install NPM Dependencies</h4>
<p>
    Just like how we must install composer packages to move forward, we must also install necessary NPM packages to move forward. This will install Vue.js, Bootstrap.css, Lodash, and Laravel Mix.
</p>
<p>
    This is just like step 4, where we installed the composer PHP packages, but this is installing the Javascript (or Node) packages required. The list of packages that a repo requires is listed in the <code>packages.json</code> file which is submitted to the github repo. Just like in step 4, we do not commit the source code for these packages to version control (github) and instead we let NPM handle it.
</p>
<pre>
    npm install
</pre>



<h4>Step 5. Create a copy of your .env file</h4>
<p>
    <code>.env</code> files are not generally committed to source control for security reasons. But there is a <code>.env.example</code> which is a template of the <code>.env</code> file that the project expects us to have. So we will make a copy of the <code>.env.example</code> file and create a <code>.env</code> file that we can start to fill out to do things like database configuration in the next few steps.
</p>
<pre>
    cp .env.example .env
</pre>
<p>
    This will create a copy of the .env.example file in your project and name the copy simply .env.
</p>



<h4>Step 6. Generate an app encryption key</h4>
<p>
    Laravel requires you to have an app encryption key which is generally randomly generated and stored in your <code>.env</code> file. The app will use this encryption key to encode various elements of your application from cookies to password hashes and more.
</p>
<p>
    Laravel’s command line tools thankfully make it super easy to generate this. In the terminal we can run this command to generate that key. (Make sure that you have already installed Laravel via composer and created an <code>.env</code> file before doing this, of which we have done both).
</p>
<pre>
    php artisan key:generate
</pre>
<p>
    If you check the <code>.env</code> file again, you will see that it now has a long random string of characters in the <code>APP_KEY</code> field. We now have a valid app encryption key.
</p>



<h4>Step 7. Create an empty database for our application</h4>
<p>
    Create an empty database for your project using the database tools you prefer.
</p>



<h4>Step 8. In the .env file, add database information to allow Laravel to connect to the database</h4>
<p>
    We will want to allow Laravel to connect to the database that you just created in the previous step. To do this, we must add the connection credentials in the <code>.env</code> file and Laravel will handle the connection from there.
</p>
<p>
    In the .env file fill in the <code>DB_HOST</code>, <code>DB_PORT</code>, <code>DB_DATABASE</code>, <code>DB_USERNAME</code>, and <code>DB_PASSWORD</code> options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.
</p>



<h4>Step 9. Migrate the database</h4>
<p>
    Once your credentials are in the <code>.env</code> file, now you can migrate your database.
</p>
<pre>
    php artisan migrate
</pre>
<p>
    It’s not a bad idea to check your database to make sure everything migrated the way you expected.
</p>



<h4>Step 10. [Optional]: Seed the database</h4>
<p>
    After the migrations are complete and you have the database structure required, then you can seed the database (which means add dummy data to it).
</p>
<pre>
    php artisan db:seed
</pre>
<p>
    This will create 20 randomly generated users, 50 randomly generated posts and 11 categories in your database. Also, this command will fill the pivot category_post table. 
</p>
<p>
    If you want to log in as a user, grab an email address from the database and use “12345678” as the password to log in as that user. That is the default password I generally use.
</p>
<p>
    <em>
        <strong>Note:</strong> Also, you can register a new user and login with that credentials.
    </em>
</p>