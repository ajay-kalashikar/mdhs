<h1>mdhs</h1>
Child care search service by Mississippi Department of Human Services
<h2>Configuration</h2>
<h3>Requirements</h3>
- GIT
- travis CLI
- heroku CLI

<h3>Process</h3>
GIT installation: https://www.atlassian.com/git/tutorials/install-git/

travic-ci cli installation: https://github.com/travis-ci/travis.rb#installation

travic-ci cli usage: https://github.com/travis-ci/travis.rb#the-travis-client-

heroku cli installation: https://devcenter.heroku.com/articles/heroku-command-line#download-and-install

heroku cli usage: https://devcenter.heroku.com/articles/heroku-command-line#getting-started

Once you have GIT configured. Clone the repository:

<code>git clone https://github.com/ajay-kalashikar/mdhs.git <b>&lt;your-directory&gt;</b></code>

When cloning is complete go to <b>&lt;your-directory&gt;</b>

We need to generate a secret key to deploy the application with heroku.

For this we will run: <code>travis encrypt $(heroku auth:token) --add deploy.api_key</code>

```
deploy:<br>
  api_key:<br>
    secure: <b>generated-key</b>
```
Now open the <b>.travis.yml</b> file in your favourite editor and check the deploy section. If you find the provider: heroku line then we are good to go, else add <b>provider: heroku</b> under deploy. Section should look something like this:
```
deploy:<br>
  provider: heroku
  api_key:<br>
    secure: <b>generated-key</b>
```
Now, we could just commit, and push our code to Github, then Travis CI will compile it, test it and deploy it to Heroku. 
