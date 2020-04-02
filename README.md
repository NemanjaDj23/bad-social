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

    When we run composer, it checks the composer.json file which is submitted to the github repo and lists all of the composer (PHP) packages that your repo requires. Because these packages are constantly changing, the source code is generally not submitted to github, but instead we let composer handle these updates. So to install all this source code we run composer with the following command.
</p>
<pre>
    composer install
</pre>


